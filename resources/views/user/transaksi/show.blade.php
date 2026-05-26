<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen p-4 bg-gray-50">

    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
        <h1 class="mb-2 text-2xl font-bold text-center text-gray-800">Detail Transaksi</h1>
        <p class="mb-6 text-xs text-center text-gray-400">ID Transaksi: #{{ $transaksi->id }}</p>

        <div class="p-4 mb-6 space-y-3 text-sm text-gray-700 border border-gray-100 bg-gray-50 rounded-xl">
            <div class="flex justify-between">
                <span class="text-gray-500">Produk</span>
                <span
                    class="font-semibold text-gray-900">{{ $transaksi->produk->nama_produk ?? 'Paket Asesmen' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Total Tagihan</span>
                <span class="font-bold text-indigo-600">Rp {{ number_format($transaksi->amount, 0, ',', '.') }}</span>
            </div>
            <hr class="my-2 border-gray-200">
            <div class="flex items-center justify-between">
                <span class="text-gray-500">Status Pembayaran</span>
                @if ($transaksi->status === 'PAID')
                    <span class="bg-green-100 text-green-700 px-2.5 py-1 rounded-full text-xs font-bold">LUNAS
                        (Xendit)</span>
                @else
                    <span class="bg-yellow-100 text-yellow-700 px-2.5 py-1 rounded-full text-xs font-bold">MENUNGGU
                        PEMBAYARAN</span>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-500">Verifikasi Admin</span>
                @if ($transaksi->is_verified == 1)
                    <span class="bg-blue-100 text-blue-700 px-2.5 py-1 rounded-full text-xs font-bold">DISETUJUI</span>
                @else
                    <span class="bg-red-100 text-red-700 px-2.5 py-1 rounded-full text-xs font-bold">BELUM
                        DISETUJUI</span>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="p-3 mb-4 text-sm text-center text-green-700 border border-green-200 bg-green-50 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-3 mb-4 text-sm text-center text-red-700 border border-red-200 bg-red-50 rounded-xl">
                {{ session('error') }}
            </div>
        @endif

        @if ($transaksi->is_verified == 0)

            @if (empty($transaksi->bukti_pembayaran))
                <div class="space-y-4">
                    @if ($transaksi->status !== 'PAID')
                        <div class="p-3 text-xs text-blue-700 border border-blue-100 bg-blue-50 rounded-xl">
                            <strong>Langkah 1:</strong> Silakan lakukan pembayaran terlebih dahulu melalui tombol Xendit
                            di bawah ini.
                        </div>
                        <a href="{{ $transaksi->invoice_url }}" target="_blank"
                            class="block w-full py-3 font-semibold text-center text-white transition bg-blue-600 shadow-sm rounded-xl hover:bg-blue-700">
                            Bayar Sekarang via Xendit
                        </a>
                        <hr class="my-4 border-gray-200">
                    @endif

                    <form action="{{ route('transaksi.upload_bukti', $transaksi->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-3">
                        @csrf
                        <div class="p-3 text-xs text-indigo-700 border border-indigo-100 bg-indigo-50 rounded-xl">
                            <strong>Langkah 2:</strong> Jika sudah menyelesaikan pembayaran di Xendit, wajib mengunggah
                            bukti transfer untuk verifikasi akhir.
                        </div>
                        <label class="block text-xs font-semibold tracking-wider text-gray-500 uppercase">Upload Struk /
                            Bukti Bayar</label>
                        <input type="file" name="bukti_pembayaran" required accept="image/*"
                            class="w-full border border-gray-200 rounded-xl p-2.5 text-sm bg-gray-50 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <button type="submit"
                            class="w-full py-3 font-semibold text-white transition bg-indigo-600 shadow-sm rounded-xl hover:bg-indigo-700">
                            Kirim Bukti Pembayaran
                        </button>
                    </form>
                </div>
            @else
                <div class="p-5 space-y-3 text-center border border-yellow-200 bg-yellow-50 rounded-2xl">
                    <div class="text-2xl">🕒</div>
                    <h3 class="text-sm font-bold text-yellow-800">Bukti Pembayaran Sedang Ditinjau</h3>
                    <p class="text-xs leading-relaxed text-yellow-700">
                        Terima kasih, bukti transfer berhasil dikirim. Admin akan melakukan pengecekan berkala. Silakan
                        refresh halaman secara berkala untuk memperbarui status akses tes.
                    </p>
                    <button onclick="window.location.reload();"
                        class="w-full py-2 text-sm font-semibold text-yellow-700 transition bg-white border border-yellow-300 shadow-sm rounded-xl hover:bg-yellow-100">
                        🔄 Cek Status Lagi
                    </button>
                </div>
            @endif
        @else
            <div class="p-5 space-y-4 text-center border border-green-200 bg-green-50 rounded-2xl">
                <div class="text-3xl">🎉</div>
                <h3 class="font-bold text-green-800">Verifikasi Selesai!</h3>
                <p class="text-xs text-green-700">
                    Pembayaran Anda telah divalidasi penuh oleh sistem dan admin. Pintu akses tes bakat Anda sudah
                    dibuka.
                </p>
                <a href="{{ route('transaksi.sukses') }}"
                    class="block w-full py-3 font-semibold text-white transition bg-green-600 shadow-md rounded-xl hover:bg-green-700">
                    Lanjut ke Halaman Sukses
                </a>
            </div>
        @endif

    </div>
</body>

</html>
