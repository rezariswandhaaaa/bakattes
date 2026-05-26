<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);

        $finalAmount = $produk->harga;
        $potongan = 0;
        $voucherId = null;

        Configuration::setXenditKey(config('services.xendit.secret_key'));
        $invoiceApi = new InvoiceApi();


        if ($request->filled('kode_voucher')) {
            $voucher = Voucher::where('kode_voucher', $request->kode_voucher)
                ->where('kuota', '>', 0)
                ->where(function ($query) {
                    $query->whereNull('expired_at')->orWhere('expired_at', '>', now());
                })->first();

            if ($voucher) {
                $voucherId = $voucher->id;

                // Hitung potongan (Nominal langsung atau Persen)
                if ($voucher->tipe === 'NOMINAL') {
                    $potongan = $voucher->potongan;
                } else {
                    $potongan = ($produk->harga * $voucher->potongan) / 100;
                }

                // Cegah harga minus jika diskon terlalu besar
                $finalAmount = max(0, $produk->harga - $potongan);
            } else {
                return back()->with('error', 'Kode voucher tidak valid, kuota habis, atau sudah kedaluwarsa.');
            }
        }

        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'voucher_id' => $voucherId,
            'potongan' => $potongan,
            'amount' => $produk->$finalAmount,
            'status' => 'PENDING'
        ]);

        if ($finalAmount <= 0) {
            $transaksi->update([
                'status' => 'PAID',
                'paid_at' => now(),
                'is_verified' => 1
            ]);

            if ($voucherId) {
                Voucher::where('id', $voucherId)->decrement('kuota');
            }

            return redirect()->route('transaksi.sukses')->with('success', 'Akses gratis berhasil diaktifkan dengan voucher!');
        }

        $invoiceRequest = new CreateInvoiceRequest([
            'external_id' => 'transaksi_' . $transaksi->id,
            'amount' => $finalAmount,
            'description' => $produk->nama_produk . ($voucherId ? ' (Diskon)' : ''),
            'payer_email' => Auth::user()->email,
            'currency' => 'IDR',
            'success_redirect_url' => route('transaksi.show', $transaksi->id),
            'failure_redirect_url' => route('transaksi.gagal'),
        ]);

        try {
            $invoice = $invoiceApi->createInvoice($invoiceRequest);

            // Update transaksi dengan Xendit ID dan URL
            $transaksi->update([
                'xendit_invoice_id' => $invoice->getId(),
                'invoice_url' => $invoice->getInvoiceUrl(),
                'status' => $invoice->getStatus()
            ]);

            if ($voucherId) {
                Voucher::where('id', $voucherId)->decrement('kuota');
            }

            return redirect()->away($invoice->getInvoiceUrl());
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Keamanan: Pastikan user hanya bisa melihat transaksinya sendiri
        if ($transaksi->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke transaksi ini.');
        }

        return view('user.transaksi.show', compact('transaksi'));
    }

    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_pembayaran', $filename);

            $transaksi->update([
                'bukti_pembayaran' => $filename,
            ]);

            return back()->with('success', 'Bukti berhasil diunggah. Menunggu verifikasi akhir dari Admin.');
        }

        return back()->with('error', 'Gagal mengunggah bukti.');
    }

    public function sukses()
    {
        // Ambil transaksi terakhir milik user yang sedang login
        $transaksi = Transaksi::where('user_id', Auth::id())->latest()->first();

        // CEK KUNCI: Jika belum PAID (dari Xendit) ATAU belum diverifikasi (is_verified = 0)
        if (!$transaksi || $transaksi->status !== 'PAID' || $transaksi->is_verified == 0) {
            // Lempar kembali ke halaman show
            return redirect()->route('transaksi.show', $transaksi->id ?? 1)
                ->with('error', 'Anda harus menyelesaikan pembayaran dan menunggu verifikasi Admin terlebih dahulu.');
        }

        // Jika aman (Sudah PAID & is_verified = 1), tampilkan halaman sukses
        return view('user.transaksi.sukses', compact('transaksi'));
    }
}
