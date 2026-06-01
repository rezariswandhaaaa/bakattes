<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


    <style>
        .shadow-lg-hover-effect {
            transition: all 0.3s ease-in-out;

        }

        .shadow-lg-hover-effect:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

</head>

<body class="bg-gray-100">
    <nav class="fixed z-10 flex items-center justify-between w-full shadow-lg md:p-4" style="background-color: #0f3150;">
        <a href="#" class="flex items-center pl-24">
            <img src="images/lg.png" alt="Logo" class="w-40 h-auto">
        </a>
        <div class="flex items-center space-x-6 md:space-x-10">
            <a href="/" class="text-white hover:text-purple-500">Beranda</a>
            <a href="{{ url('/produk') }}"
                class="{{ request()->is('produk') ? 'text-purple-500 font-semibold' : 'text-white hover:text-purple-500' }} text-white hover:text-purple-500">Produk</a>
            <a href="{{ url('/tentang') }}" class="text-white hover:text-purple-500">Tentang</a>
            <a href="#kontak" class="text-white hover:text-purple-500">Kontak</a>
        </div>

        <div class="flex items-center pr-24 space-x-6 md:space-x-10">
            <a href="{{ url('/login') }}"
                class="inline-block px-6 py-3 font-bold text-gray-800 bg-white rounded-full hover:text-purple-500">Login</a>
        </div>
    </nav>

    <section class="pt-20">
        <div class="flex items-center justify-center w-full min-h-screen bg-center bg-cover"
            style="background-image: url('{{ asset('images/background.png') }}');">

            <div id="heroText" class="px-4 text-center transition-opacity duration-500" data-aos="zoom-in">
                <h1 class="mb-4 font-extrabold text-white text-8xl drop-shadow-lg">Produk</h1>
                <p class="text-xl text-white drop-shadow-md">Lihat produk yang sesuai dengan kebutuhan kamu</p>
            </div>
        </div>
    </section>

    <section id="produk" class="py-16 mt-12">
        <div class="container px-4 mx-auto">
            <div class="flex items-center justify-center mb-10">
                <h2 class="text-3xl font-bold text-center text-navy">Temukan Potensi Sejati Anda bersama Kami</h2>
            </div>

            {{-- Loop produk --}}
            <div class="flex flex-wrap justify-center -mx-4">
                @foreach ($produks as $produk)
                    <div class="flex w-full px-4 mb-8 md:w-1/2 lg:w-1/4"> {{-- Tambahkan 'flex' di sini --}}
                        <div class="flex flex-col w-full h-full overflow-hidden bg-white rounded-lg shadow-lg shadow-lg-hover-effect">

                            {{-- Gambar produk --}}
                            <img src="{{ asset('images/first.png') }}" alt="o"
                                class="flex-shrink-0 object-cover w-full h-48">

                            {{-- Info produk --}}
                            <div class="flex flex-col flex-grow p-4"> {{-- Tambahkan 'flex flex-col flex-grow' --}}
                                <h3 class="mb-2 text-xl font-bold text-navy">{{ $produk->nama_produk }}</h3>

                                {{-- Bagian Harga dan Tombol --}}
                                <div class="flex flex-row items-center justify-between gap-2 pt-4 mt-auto">
                                    {{-- mt-auto memastikan ini selalu di bawah --}}
                                    <p class="flex-shrink-0 text-base font-bold text-navy whitespace-nowrap">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </p>

                                    <a href="{{ url('/login') }}"
                                        class="inline-flex items-center justify-center px-3 py-2 text-xs font-bold text-white rounded-lg shadow-md transition-all duration-300 transform hover:shadow-xl hover:-translate-y-0.5 active:scale-95 whitespace-nowrap flex-shrink-0"
                                        style="background-color: #808bf3;">
                                        Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Jika tidak ada produk --}}
            @if ($produks->isEmpty())
                <p class="mt-8 text-center text-gray-500">Belum ada produk yang tersedia.</p>
            @endif
        </div>
    </section>

    <section id="kontak" class="py-32 pt-42" style="background-color: white; color: #0f3150; text-align: center;">
        <div class="container px-4 mx-auto">
            <h2 class="mb-4 text-3xl font-bold">Hubungi Kami</h2>
            <p class="mx-auto mb-12 text-lg leading-relaxed" style="max-width: 600px;">
                Hubungi kami untuk informasi lebih lanjut, pertanyaan, atau permintaan khusus. Gunakan
                kontak kami untuk menghubungi kami secara langsung. Terima kasih atas minat dan
                kunjungan Anda!
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#"
                    style="background-color: #0f3150; color: white; padding: 14px 30px; border-radius: 9999px; font-weight: bold; text-decoration: none; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 32 32" fill="white">
                        <path
                            d="M16.04 2.01c-7.7 0-13.97 6.27-13.97 13.97 0 2.46.64 4.87 1.86 6.99L2 30l7.2-2.04c2.02 1.11 4.28 1.7 6.84 1.7 7.7 0 13.97-6.27 13.97-13.97s-6.27-13.97-13.97-13.97zm0 25.4c-2.16 0-4.29-.58-6.13-1.67l-.44-.26-4.27 1.2 1.14-4.2-.27-.43c-1.14-1.8-1.74-3.87-1.74-6.01 0-6.3 5.12-11.43 11.43-11.43 3.06 0 5.94 1.19 8.1 3.35s3.35 5.04 3.35 8.1c0 6.3-5.12 11.44-11.44 11.44zm6.1-8.43c-.33-.17-1.96-.96-2.26-1.07-.3-.1-.52-.17-.74.17s-.85 1.07-1.04 1.3c-.2.22-.38.25-.7.08-.33-.17-1.4-.52-2.66-1.66-1-.9-1.67-2.01-1.87-2.35-.2-.33-.02-.5.15-.66.16-.15.38-.4.57-.6.19-.22.25-.37.37-.6.12-.22.06-.5-.03-.66-.08-.17-.74-1.78-1.01-2.43-.27-.65-.55-.55-.74-.56h-.63c-.22 0-.57.08-.87.37s-1.15 1.12-1.15 2.73c0 1.61 1.17 3.17 1.34 3.39.17.22 2.3 3.52 5.58 4.94.78.34 1.38.55 1.85.7.78.25 1.5.22 2.06.13.63-.1 1.96-.8 2.24-1.57.27-.76.27-1.41.19-1.54-.08-.13-.3-.21-.63-.37z" />
                    </svg>
                    Whatsapp
                </a>

                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=bakattes75@gmail.com" target="_blank"
                    style="background-color: #0f3150; color: white; padding: 14px 30px; border-radius: 9999px; font-weight: bold; text-decoration: none; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="mr-2 feather feather-mail">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Email
                </a>
            </div>
        </div>
    </section>

    <footer class="py-6" style="background-color: #0f3150;">
        <div class="container px-4 mx-auto text-center">
            <p class="text-sm text-white">&copy; {{ date('Y') }} Designed By Reza</p>
        </div>
    </footer>

    <script>
        const heroText = document.getElementById('heroText');

        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            const fadeStart = 100;
            const fadeEnd = 200; // Berapa pixel mulai hilang
            const opacity = 1 - Math.min(Math.max((scrollY - fadeStart) / (fadeEnd - fadeStart), 0), 1);
            heroText.style.opacity = opacity;
        });
    </script>
</body>

</html>
