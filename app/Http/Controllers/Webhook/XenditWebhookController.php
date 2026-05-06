<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Transaksi;

class XenditWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Verifikasi Callback Token (Opsional tapi sangat disarankan demi keamanan)
        // Ambil token ini dari Dashboard Xendit > Pengaturan > Webhooks
        $xenditCallbackToken = 'El1BeIkmMxQbOGsURBVBvwz4rDBEH1i5soiCs8ZxkIiNInCP';
        $incomingToken = $request->header('x-callback-token');

        if ($xenditCallbackToken !== $incomingToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // 2. Log payload masuk (sangat membantu untuk debugging)
        Log::info('XENDIT WEBHOOK MASUK', $request->all());

        $data = $request->all();

        // 3. Pastikan statusnya adalah PAID
        if (($data['status'] ?? '') === 'PAID') {

            // Cari transaksi berdasarkan xendit_invoice_id (ID dari Xendit)
            $transaksi = Transaksi::where('xendit_invoice_id', $data['id'])->first();

            if ($transaksi) {
                // Update status dan waktu pembayaran jika ditemukan
                $transaksi->update([
                    'status' => 'PAID',
                    'paid_at' => $data['paid_at'] ?? now()
                ]);

                Log::info('TRANSAKSI BERHASIL DIUPDATE', [
                    'xendit_invoice_id' => $data['id']
                ]);
            } else {
                // Log jika ID tidak ada di DB, tapi tetap balas 200 agar Xendit tidak mencoba mengirim ulang
                Log::warning('TRANSAKSI TIDAK DITEMUKAN DI DB', [
                    'xendit_invoice_id' => $data['id']
                ]);

                return response()->json(['message' => 'Invoice received but not found in database'], 200);
            }
        }

        // 4. Selalu balikkan response sukses 200 OK ke Xendit
        return response()->json(['message' => 'Webhook received successfully']);
    }
}
