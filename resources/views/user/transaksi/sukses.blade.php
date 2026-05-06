<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Berhasil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Kalau pakai Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-md w-full text-center">
        <h1 class="text-2xl font-bold text-green-600 mb-4">
            🎉 Pembayaran Berhasil
        </h1>

        <p class="text-gray-600 mb-6">
            Terima kasih! Pembayaran Anda telah berhasil diproses.
            Sekarang Anda bisa langsung mengerjakan tes bakat.
        </p>

        <a href="{{ route('user.tes.index') }}"
           class="inline-block w-full bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition">
            Lanjut Halaman Tes
        </a>
    </div>

</body>
</html>
