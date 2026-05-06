<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);

        Configuration::setXenditKey(config('services.xendit.secret_key'));
        $invoiceApi = new InvoiceApi();

        // Buat transaksi dulu dengan status PENDING
        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'amount' => $produk->harga,
            'status' => 'PENDING'
        ]);

        $invoiceRequest = new CreateInvoiceRequest([
            'external_id' => 'transaksi_' . $transaksi->id,
            'amount' => $produk->harga,
            'description' => $produk->nama_produk,
            'payer_email' => Auth::user()->email,
            'currency' => 'IDR',
            'success_redirect_url' => route('transaksi.sukses'),
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

            return redirect()->away($invoice->getInvoiceUrl());
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
