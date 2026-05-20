<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Transaksi;
use App\Models\User;
use App\Services\CliftonAiService;
use App\Services\CliftonStrengthService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class TesController extends Controller
{
    public function index()
    {
        $pertanyaans = Pertanyaan::with('bakat')->get();

        return view('user.tes.index', compact('pertanyaans'));
    }

    public function mulai(Request $request)
    {
        if ($request->get('reset') == '1') {
            session()->forget('jawaban');
            return redirect()->route('user.tes.mulai');
        }
        // Ambil data user yang sedang login
        $user = User::find(Auth::id());
        // Jumlah soal per halaman
        $perPage = 5;
        // Ambil nomor halaman (default halaman 1)
        $page = $request->get('page', 1);

        // Jika belum pernah mulai tes → set waktu mulai
        if (!$user->test_started_at) {
            $user->test_started_at = Carbon::now();
            $user->save();
        }
        //Ambil data pertanyaan beserta relasi bakat diurutkan berdasarkan ID ditampilkan menggunakan pagination
        $pertanyaans = Pertanyaan::with('bakat')
            ->orderBy('id')
            ->paginate($perPage, ['*'], 'page', $page);

        //Ambil jawaban user yang sudah tersimpan di database
        $savedAnswers = Jawaban::where('user_id', $user->id)
            ->pluck('nilai', 'pertanyaan_id')
            ->toArray();

        // Hitung progress pengerjaan tes
        $totalPertanyaan = Pertanyaan::count();
        $totalDijawab = count($savedAnswers);
        $progress = $totalPertanyaan > 0 ? round(($totalDijawab / $totalPertanyaan) * 100) : 0;

        // Hitung durasi tes dan sisa waktu
        // Hitung sisa waktu 90 menit (5400 detik)
        $sisaWaktu = 5400 - $user->test_started_at->diffInSeconds(Carbon::now());

        // Pastikan sisa waktu tidak bernilai negatif
        $sisaWaktu = max(0, (int) $sisaWaktu);

        //Status tes user
        $testStatus = $user->test_status; // not_started | in_progress | finished

        return view('user.tes.mulai', compact('pertanyaans', 'savedAnswers', 'progress', 'sisaWaktu'));
    }

    public function simpanAjax(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $pertanyaanId = $request->pertanyaan_id;
        $nilai = (int) $request->nilai;

        // AMBIL PERTANYAAN
        $pertanyaan = Pertanyaan::find($pertanyaanId);

        // BALIK NILAI JIKA PERTANYAAN NEGATIF
        if ($pertanyaan && $pertanyaan->is_reverse == 1) {
            $nilai = 7 - $nilai;
        }

        // Simpan jawaban ke database
        Jawaban::updateOrCreate(
            ['user_id' => $userId, 'pertanyaan_id' => $pertanyaanId],
            ['nilai' => $nilai]
        );

        // Hitung progress
        $totalPertanyaan = Pertanyaan::count();
        $totalDijawab = Jawaban::where('user_id', $userId)->count();
        $progress = $totalPertanyaan > 0 ? round(($totalDijawab / $totalPertanyaan) * 100) : 0;


        return response()->json([
            'success' => true,
            'progress' => $progress,
            'total_dijawab' => $totalDijawab,
            'total_pertanyaan' => $totalPertanyaan
        ]);
    }

    public function simpanSementara(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');

        $pertanyaanIds = $request->pertanyaan_id ?? [];
        $jawabanArray = $request->jawaban ?? [];

        $currentAnswers = session('jawaban', []);
        foreach ($pertanyaanIds as $pertanyaanId) {
            if (isset($jawabanArray[$pertanyaanId])) {
                $nilai = (int) $jawabanArray[$pertanyaanId];

                // AMBIL PERTANYAAN
                $pertanyaan = Pertanyaan::find($pertanyaanId);

                // BALIK JIKA NEGATIF
                if ($pertanyaan && $pertanyaan->is_reverse == 1) {
                    $nilai = 7 - $nilai;
                }

                $currentAnswers[$pertanyaanId] = $nilai;
                Jawaban::updateOrCreate(
                    ['user_id' => $userId, 'pertanyaan_id' => $pertanyaanId],
                    ['nilai' => $nilai]
                );
            }
        }
        session(['jawaban' => $currentAnswers]);

        if ($request->filled('previous_page_url')) return redirect($request->input('previous_page_url'));
        if ($request->filled('next_page_url')) return redirect($request->input('next_page_url'));


        return redirect()->route('user.tes.hasil');
    }

    public function reset()
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 1. Hapus semua jawaban mentah
        Jawaban::where('user_id', $user->id)->delete();

        // 2. Ambil semua riwayat untuk menghapus file PDF fisiknya dari storage
        $riwayats = DB::table('riwayat_tes')->where('user_id', $user->id)->get();
        foreach ($riwayats as $riwayat) {
            if (Storage::disk('public')->exists($riwayat->file_path)) {
                Storage::disk('public')->delete($riwayat->file_path);
            }
        }

        // 3. Hapus data di tabel riwayat_tes
        DB::table('riwayat_tes')->where('user_id', $user->id)->delete();

        // 4. Reset waktu mulai
        $user->test_started_at = null;
        $user->save();

        return redirect()->route('user.tes.index')
            ->with('success', '✅ Tes telah direset. Silakan mulai mengerjakan dari awal.');
    }

    public function home()
    {
        $user = User::find(Auth::id());

        // 1. Hapus jawaban
        Jawaban::where('user_id', $user->id)->delete();

        // 2. Reset status tes
        $user->test_started_at = null;
        $user->save();

        // 3. Hapus session jawaban
        session()->forget('jawaban');

        // 4. Redirect ke dashboard
        return redirect()
            ->route('dashboard')
            ->with('success', 'Anda kembali ke dashboard.');
    }


    public function hasil(Request $request)
    {
        $userId = Auth::id();
        $jawabanSession = session('jawaban', []);

        // Simpan jawaban sementara ke database
        if (!empty($jawabanSession)) {
            foreach ($jawabanSession as $pertanyaan_id => $nilai) {
                Jawaban::updateOrCreate(
                    ['user_id' => $userId, 'pertanyaan_id' => $pertanyaan_id],
                    ['nilai' => $nilai]
                );
            }
            session()->forget('jawaban');
        }

        if (!Jawaban::where('user_id', $userId)->exists()) {
            return redirect()->route('user.tes.mulai')
                ->with('error', 'Anda belum mengerjakan tes. Silakan jawab pertanyaan terlebih dahulu.');
        }

        // Ambil rata-rata nilai per bakat
        $hasil = DB::table('bakats')
            ->leftJoin('pertanyaans', 'pertanyaans.bakat_id', '=', 'bakats.id')
            ->leftJoin('jawabans', function ($join) use ($userId) {
                $join->on('jawabans.pertanyaan_id', '=', 'pertanyaans.id')
                    ->where('jawabans.user_id', '=', $userId);
            })
            ->select(
                'bakats.nama_bakat',
                DB::raw('ROUND(COALESCE(AVG(jawabans.nilai), 0), 2) as rata_nilai')
            )
            ->groupBy('bakats.nama_bakat')
            ->orderByDesc('rata_nilai') // urut dari tertinggi
            ->get();

        // logikan tanda tie
        $rankedBakat = [];

        $rank = 0;
        $prevNilai = null;
        $isFirstInGroup = true;
        $index = 0;

        foreach ($hasil as $row) {

            if ($prevNilai === null || $row->rata_nilai != $prevNilai) {
                $rank++;
                $tie = false;
                $isFirstInGroup = true;
            } else {
                // nilai sama → satu level
                $tie = false;              // default
                if (!$isFirstInGroup && $index <= 8) {
                    $tie = true;           // anggota ke-2,3,... baru bertitik
                }
                $isFirstInGroup = false;
            }

            $rankedBakat[] = [
                'rank' => $rank,
                'position' => $index + 1,
                'nama' => $row->nama_bakat,
                'nilai' => $row->rata_nilai,
                'tie' => $tie
            ];

            $prevNilai = $row->rata_nilai;
            $index++;
        }

        // WARNA BERDASARKAN RANK (1–34)
        $bakatIndex = [];

        foreach ($rankedBakat as $item) {
            $bakatIndex[$item['nama']] = [
                'position'  => $item['position'],
                'color' => CliftonStrengthService::colorByPosition($item['position']),
            ];
        }

        // MATRIX DOMAIN + WARNA
        $matrixBakat = [];

        foreach (CliftonStrengthService::matrix() as $domain => $listBakat) {
            foreach ($listBakat as $namaBakat) {
                $matrixBakat[$domain][] = [
                    'nama'  => $namaBakat,
                    'color' => $bakatIndex[$namaBakat]['color'] ?? 'blue',
                ];
            }
        }

        // Format data
        $dataText = "";
        foreach ($rankedBakat as $item) {
            $dataText .= "{$item['rank']}. {$item['nama']} ({$item['nilai']})\n";
        }

        // ------------------------------------------
        // Bagian: urutan Bakat
        // ------------------------------------------

        // hasil urutan bakat
        $hasilUrutanBakat = [];
        foreach ($rankedBakat as $item) {
            $nama = $item['nama'];
            if ($item['tie']) {
                $nama .= '.';
            }
            $hasilUrutanBakat[] = $nama;
        }

        // Membagi data dua columns (1–17, 18–34)
        $kolomKiri = array_slice($hasilUrutanBakat, 0, 17);
        $kolomKanan = array_slice($hasilUrutanBakat, 17, 17);

        // Ambil 7 bakat teratas
        $top7Bakat = array_filter($rankedBakat, function ($item) {
            return $item['rank'] <= 7;
        });
        //Menyusun teks 7 bakat teratas dengan penanda tie (.)
        $top7Text = "";
        foreach ($top7Bakat as $item) {
            $nama = $item['nama'];
            if ($item['tie']) {
                $nama .= '.';
            }
            $top7Text .= $nama . "\n";
        }
        // ------------------------------------------
        // Bagian: Potensi pekerjaan (AI)
        // ------------------------------------------
        $potensiPekerjaan = CliftonAiService::potensiPekerjaan($top7Text);

        // ------------------------------------------
        // Bagian: Potensi Bakat / Area kekuatan (AI)
        // ------------------------------------------
        $potensiBakat = CliftonAiService::potensiBakat($top7Text);

        // ------------------------------------------
        // Bagian: Public Speaking & Communication Style (AI)
        // ------------------------------------------
        $komunikasiSummary = CliftonAiService::komunikasiSummary($top7Text);

        // Generate PDF hasil tes
        $timestamp = now()->format('Ymd_His');
        $filename = 'Hasil_Tes_Bakat_' . str_replace(' ', '_', Auth::user()->name) . '_' . $timestamp . '.pdf';
        $pdfPath = 'pdf/riwayat_tes/' . $filename;

        $pdf = Pdf::loadView('user.tes.hasil-pdf', compact(
            'hasilUrutanBakat',
            'kolomKiri',
            'kolomKanan',
            'matrixBakat',
            'potensiPekerjaan',
            'potensiBakat',
            'komunikasiSummary'
        ))->setPaper('A4', 'portrait');

        Storage::disk('public')->put($pdfPath, $pdf->output());

        $transaksi = Transaksi::where('user_id', Auth::id())
            ->where('status', 'PAID')
            ->latest('paid_at') // ambil transaksi PAID terakhir
            ->first();

        if (!$transaksi) {
            return back()->with('error', 'Transaksi tidak ditemukan atau belum dibayar.');
        }
        DB::table('riwayat_tes')->insert([
            'user_id'     => $userId,
            'transaksi_id' => $transaksi->id,
            'nama_file'   => $filename,
            'file_path'   => $pdfPath,
            'top_7_bakat' => str_replace("\n", ", ", trim($top7Text)), // Ringkasan singkat
            'hasil_json'  => json_encode($rankedBakat),              // Data lengkap 34 bakat
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return view('user.tes.hasil', compact('hasilUrutanBakat', 'potensiPekerjaan', 'kolomKiri', 'kolomKanan', 'matrixBakat', 'potensiBakat', 'pdfPath', 'komunikasiSummary'));
    }
}
