<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="min-h-screen bg-gradient-to-br from-[#eef5fb] via-[#f7f9fc] to-[#dce8f3] flex items-center justify-center p-5">

    <div
        class="w-full max-w-lg bg-white/90 backdrop-blur-xl rounded-3xl shadow-[0_20px_80px_rgba(15,49,80,0.18)] overflow-hidden border border-white">

        <!-- HEADER -->
        <div class="bg-[#0f3150] px-8 py-8 text-center">

            <div
                class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white rounded-2xl bg-white/10">
                💳
            </div>

            <h1 class="text-3xl font-bold text-white">
                Detail Transaksi
            </h1>

            <p class="mt-2 text-sm text-blue-100">
                ID #{{ $transaksi->id }}
            </p>

        </div>

        <div class="p-8">

            <!-- DETAIL -->
            <div class="rounded-2xl bg-[#f8fbff] border border-[#d8e3ec] p-5 space-y-4">

                <div class="flex justify-between">
                    <span class="text-gray-500">
                        Produk
                    </span>

                    <span class="font-semibold text-[#0f3150]">
                        {{ $transaksi->produk->nama_produk ?? 'Paket Asesmen' }}
                    </span>
                </div>

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Total Tagihan
                    </span>

                    <span class="font-bold text-2xl text-[#0f3150]">
                        Rp {{ number_format($transaksi->amount, 0, ',', '.') }}
                    </span>

                </div>

                <hr>

                <div class="flex items-center justify-between">

                    <span class="text-gray-500">
                        Pembayaran
                    </span>

                    @if ($transaksi->status === 'PAID')
                        <span class="px-4 py-2 text-xs font-bold text-green-700 bg-green-100 rounded-full">
                            ✓ LUNAS
                        </span>
                    @else
                        <span class="px-4 py-2 text-xs font-bold text-yellow-700 bg-yellow-100 rounded-full">
                            MENUNGGU
                        </span>
                    @endif

                </div>

                <div class="flex items-center justify-between">

                    <span class="text-gray-500">
                        Verifikasi
                    </span>

                    @if ($transaksi->is_verified)
                        <span class="px-4 py-2 rounded-full text-xs font-bold bg-[#d7e6f3] text-[#0f3150]">
                            DISETUJUI
                        </span>
                    @else
                        <span class="px-4 py-2 text-xs font-bold text-red-700 bg-red-100 rounded-full">
                            BELUM
                        </span>
                    @endif

                </div>

            </div>


            @if (session('success'))
                <div class="p-4 mt-5 text-sm text-green-700 border border-green-200 rounded-2xl bg-green-50">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 mt-5 text-sm text-red-700 border border-red-200 rounded-2xl bg-red-50">
                    {{ session('error') }}
                </div>
            @endif


            @if ($transaksi->is_verified == 0)

                @if (empty($transaksi->bukti_pembayaran))

                    <div class="mt-8 space-y-5">

                        @if ($transaksi->status !== 'PAID')
                            <div class="bg-[#eef5fb] border border-[#d8e3ec] rounded-2xl p-4 text-sm text-[#0f3150]">

                                <strong>Langkah 1</strong><br>
                                Selesaikan pembayaran terlebih dahulu.

                            </div>

                            <a href="{{ $transaksi->invoice_url }}" target="_blank"
                                class="block text-center py-4 rounded-2xl bg-[#0f3150] hover:bg-[#17446d] text-white font-semibold transition shadow-lg">

                                Bayar Sekarang

                            </a>
                        @endif


                        <form action="{{ route('transaksi.upload_bukti', $transaksi->id) }}" method="POST"
                            enctype="multipart/form-data" class="space-y-4">

                            @csrf

                            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 text-sm text-[#0f3150]">
                                Upload Struk /Bukti Bayar untuk proses verifikasi.
                            </div>

                            <input type="file" name="bukti_pembayaran" required accept="image/*"
                                class="w-full border rounded-2xl p-4 file:bg-[#0f3150] file:text-white file:border-0 file:px-4 file:py-2 file:rounded-xl">

                            <button
                                class="w-full py-4 rounded-2xl bg-[#0f3150] hover:bg-[#17446d] text-white font-semibold transition shadow-lg">
                                Kirim Bukti Pembayaran
                            </button>

                        </form>

                    </div>
                @else
                    <div
                        class="mt-8 text-center border border-yellow-200 rounded-3xl bg-gradient-to-b from-yellow-50 to-white p-7">

                        <div class="mb-3 text-5xl">
                            🕒
                        </div>

                        <h3 class="font-bold text-lg text-[#0f3150]">

                            Sedang Ditinjau

                        </h3>

                        <p class="mt-2 text-sm text-gray-600">

                            Terima kasih, bukti transfer berhasil dikirim. Admin kami sedang melakukan pengecekan data.
                            Mohon muat ulang (refresh) halaman ini secara berkala untuk mengetahui status terbaru.

                        </p>

                        <div class="p-3 mt-4 text-left border border-red-200 bg-red-50 rounded-xl">
                            <div class="flex items-start space-x-2">
                                <span class="text-lg leading-none text-red-600">⚠️</span>
                                <div>
                                    <h4 class="text-xs font-bold tracking-wide text-red-800 uppercase">Penting: Jangan
                                        Tutup Halaman Ini</h4>
                                    <p class="text-[11px] mt-1 text-red-700 leading-snug">
                                        Mohon tetap berada di halaman ini hingga proses verifikasi selesai. Menutup
                                        halaman sebelum verifikasi disetujui dapat mengakibatkan hangusnya hak akses
                                        tes, dan Anda mungkin diharuskan melakukan pembayaran ulang.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <button onclick="window.location.reload()"
                            class="mt-6 w-full py-3 rounded-2xl border border-[#0f3150] text-[#0f3150] hover:bg-[#0f3150] hover:text-white transition">

                            Refresh Halaman

                        </button>

                    </div>

                @endif
            @else
                <div
                    class="p-8 mt-8 text-center border border-green-200 rounded-3xl bg-gradient-to-b from-green-50 to-white">

                    <div class="text-5xl">
                        🎉
                    </div>

                    <h3 class="mt-4 text-2xl font-bold text-green-700">

                        Verifikasi Berhasil

                    </h3>

                    <p class="mt-2 text-sm text-gray-600">

                        Pembayaran sudah tervalidasi. Anda dapat melanjutkan tes.

                    </p>

                    <a href="{{ route('transaksi.sukses') }}"
                        class="block mt-6 py-4 rounded-2xl bg-[#0f3150] hover:bg-[#17446d] text-white font-semibold">

                        Mulai Tes

                    </a>

                </div>

            @endif

        </div>

    </div>

</body>

</html>
