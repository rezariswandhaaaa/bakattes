<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Gagal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-50 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-md w-full text-center">
        <h1 class="text-2xl font-bold text-red-600 mb-4">
            ❌ Pembayaran Gagal
        </h1>

        <p class="text-gray-600 mb-6">
            Pembayaran belum berhasil atau dibatalkan.
            Silakan coba kembali.
        </p>

        <a href="{{ url()->previous() }}"
           class="inline-block w-full bg-red-600 text-white py-3 rounded-xl font-semibold hover:bg-red-700 transition">
            Coba Bayar Lagi
        </a>
    </div>

</body>
</html>
