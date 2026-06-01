<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .shadow-lg-hover-effect {
            transition: all 0.3s ease-in-out;

        }

        .shadow-lg-hover-effect:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .button-animated {
            background-color: transparent;
            /* Awalnya transparan */
            color: #173f67;
            /* Warna teks biru */
            padding: 12px 24px;
            border: 2px solid grey;
            /* Garis tepi biru */
            border-radius: 50px;
            /* Membuat tombol lebih bulat */
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transisi untuk semua properti yang berubah */
            text-decoration: none;
            /* Menghilangkan garis bawah pada tautan */
            display: inline-block;
            /* Agar padding bekerja dengan baik */
        }

        /* Gaya saat kursor di atas tombol (hover) */
        .button-animated:hover {
            background-color: #173f67;
            /* Berubah menjadi biru saat di-hover */
            color: white;
            /* Warna teks menjadi putih saat di-hover */
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.4);
            /* Efek bayangan saat di-hover */
        }
    </style>

</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">

        {{-- Navbar --}}
        <nav class="fixed z-10 flex items-center justify-between w-full shadow-lg md:p-4"
            style="background-color: #0f3150;">

            {{-- Logo --}}
            <a href="#" class="flex items-center pl-24">
                <img src="images/lg.png" alt="Logo" class="w-40 h-auto">
            </a>

            {{-- Menu --}}
            <div class="flex items-center space-x-6 md:space-x-10">
                <a href="{{ route('dashboard') }}"
                    class="relative text-white font-medium {{ Request::routeIs('dashboard') ? 'text-purple-300' : 'hover:text-purple-600' }}">
                    Beranda
                </a>

                <a href="{{ route('user.produk') }}"
                    class="relative text-white font-medium {{ Request::routeIs('user.produk') || Request::routeIs('produk.show') ? 'text-purple-300' : 'hover:text-purple-600' }}">
                    Produk
                </a>

                <a href="{{ route('user.kontak') }}"
                    class="relative text-white font-medium {{ Request::routeIs('user.kontak') ? 'text-purple-300' : 'hover:text-purple-600' }}">
                    Kontak
                </a>

                <a href="{{ route('user.tentang') }}"
                    class="relative text-white font-medium {{ Request::routeIs('user.tentang') ? 'text-purple-300' : 'hover:text-purple-600' }}">
                    Tentang
                </a>
            </div>

            {{-- User Menu --}}
            <div class="relative flex items-center pr-24 space-x-6 md:space-x-10">
                <button id="userMenuButton"
                    class="flex items-center px-4 py-2 space-x-2 transition bg-white rounded-full shadow focus:outline-none hover:shadow-md">
                    <span class="font-semibold text-blue-950 hover:text-purple-500">
                        {{ Auth::user()->name }}
                    </span>
                    <svg class="w-4 h-4 text-gray-600 transition-transform duration-200" id="userMenuIcon"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div id="userMenu"
                    class="absolute right-0 z-50 hidden w-48 mt-2 overflow-hidden bg-white border border-gray-200 rounded-lg shadow-lg top-full">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center px-4 py-2 text-gray-700 transition hover:bg-gray-100">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1119 12v1m-2 4h-4m0 0h-4m4 0v4m0-4v-4" />
                        </svg>
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-4 py-2 text-red-500 transition hover:bg-gray-100">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-13v1m0 0H6a2 2 0 00-2 2v10a2 2 0 002 2h7" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        {{-- Konten Halaman --}}
        <main>
            {{ $slot }}
        </main>
    </div>

    <script>
        // Dropdown toggle
        document.getElementById('userMenuButton').addEventListener('click', () => {
            document.getElementById('userMenu').classList.toggle('hidden');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
