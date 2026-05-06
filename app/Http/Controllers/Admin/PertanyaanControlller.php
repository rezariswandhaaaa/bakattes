<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PertanyaanTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\PertanyaanImport;
use App\Models\Bakat;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class PertanyaanControlller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pertanyaans = Pertanyaan::with('bakat')
            ->when($search, function ($query, $search) {
                $query->where('pertanyaan', 'like', "%{$search}%")
                    ->orWhereHas('bakat', function ($q) use ($search) {
                        $q->where('nama_bakat', 'like', "%{$search}%");
                    });
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->onEachSide(1)
            ->withQueryString();

        if ($request->ajax()) {
            return view('admin.pertanyaan.partials.table', compact('pertanyaans'))->render();
        }

        // Kalau bukan AJAX, kirim halaman penuh
        return view('admin.pertanyaan.index', compact('pertanyaans'));
    }


    public function create()
    {
        $bakats = Bakat::all();
        return view('admin.pertanyaan.create', compact('bakats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bakat_id' => 'required|exists:bakats,id',
            'pertanyaan' => 'required|string|max:255',
            'is_reverse' => 'required|in:0,1',
        ]);

        Pertanyaan::create($validated);

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id); // ambil pertanyaan berdasarkan id
        $bakats = Bakat::all();                    // ambil semua bakat untuk dropdown

        return view('admin.pertanyaan.edit', compact('pertanyaan', 'bakats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bakat_id' => 'required|exists:bakats,id',
            'pertanyaan' => 'required|string|max:255',
            'is_reverse' => 'required|boolean',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($request->all());

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus');
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul kolom
        $sheet->setCellValue('A1', 'Bakat');
        $sheet->setCellValue('B1', 'Pertanyaan');
        $sheet->setCellValue('C1', 'Tipe Pertanyaan');

        // Contoh isi agar admin tahu formatnya
        $sheet->setCellValue('A2', 'Command');
        $sheet->setCellValue('B2', 'Saya senang memimpin orang lain menuju tujuan bersama.');
        $sheet->setCellValue('C2', 'Positif');

        $sheet->setCellValue('A3', 'Responsibility');
        $sheet->setCellValue('B3', 'Saya merasa bertanggung jawab atas hasil pekerjaan saya.');
        $sheet->setCellValue('C3', 'Positif');

        // Styling agar lebih rapi
        $sheet->getStyle('A1:B1:C1')->getFont()->setBold(true);
        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(80);
        $sheet->getColumnDimension('C')->setWidth(15);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'template_pertanyaan.xlsx';

        // Simpan dan download
        $tempPath = storage_path("app/public/{$filename}");
        $writer->save($tempPath);

        return response()->download($tempPath)->deleteFileAfterSend(true);
    }


    // 🔹 Import file Excel
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        // Lewati baris pertama (judul kolom)
        foreach ($rows as $index => $row) {
            if ($index == 1) continue;

            $namaBakat = trim($row['A']);
            $pertanyaan = trim($row['B']);
            $tipePertanyaan = trim($row['C']);

            if (empty($namaBakat) || empty($pertanyaan)  || empty($tipePertanyaan)) continue;

            // Cari id bakat berdasarkan nama
            $bakat = Bakat::where('nama_bakat', 'like', $namaBakat)->first();

            if ($bakat) {
                Pertanyaan::create([
                    'bakat_id' => $bakat->id,
                    'pertanyaan' => $pertanyaan,
                    'is_reverse' => strtolower($tipePertanyaan) === 'negatif' ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('pertanyaan.index')->with('success', 'Data pertanyaan berhasil diimport!');
    }
}
