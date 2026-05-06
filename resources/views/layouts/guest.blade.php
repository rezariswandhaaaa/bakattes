<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-800 sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <img src="{{ asset('images/lg.png') }}" alt="Logo" class="w-56 h-auto mx-24">
            </a>
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-2xl">
            {{ $slot }}
        </div>
    </div>
    

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (password.type === 'password') {
                // 👉 AKSI: tampilkan password
                password.type = 'text';

                // Ikon: mata dicoret (klik untuk sembunyikan)
                eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13.875 18.825A10.05 10.05 0 0112 19
            c-4.478 0-8.268-2.943-9.543-7
            a9.97 9.97 0 012.33-3.568M9.88 9.88
            a3 3 0 104.24 4.24" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3l18 18" />
        `;
            } else {
                // 👉 AKSI: sembunyikan password
                password.type = 'password';

                // Ikon: mata terbuka (klik untuk lihat)
                eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5
            c4.478 0 8.268 2.943 9.542 7
            -1.274 4.057-5.064 7-9.542 7
            -4.477 0-8.268-2.943-9.542-7z" />
        `;
            }
        }
    </script>

</body>

</html>
