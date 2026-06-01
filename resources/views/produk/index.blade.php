<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} - Detail Produk</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Animasi halus untuk munculnya elemen */
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom Color Theme based on image */
        .text-brand-blue {
            color: #00a8e8;
        }

        .bg-brand-blue {
            background-color: #00a8e8;
        }

        .hover-bg-brand-blue:hover {
            background-color: #008ec4;
        }
    </style>
</head>

<body class="min-h-screen font-sans antialiased text-gray-800 bg-gray-50 selection:bg-blue-100 selection:text-blue-900">

    <div class="container relative z-10 max-w-6xl px-4 py-10 mx-auto lg:py-16">

        <!-- Tombol Kembali -->
        <a href="{{ route('user.produk') }}"
            class="inline-flex items-center mb-6 text-sm font-medium text-gray-500 transition-all duration-200 hover:text-gray-900 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="ml-1">Kembali ke Katalog</span>
        </a>

        <!-- Kartu Produk Utama -->
        <div
            class="grid grid-cols-1 gap-10 p-6 bg-white border border-gray-100 shadow-sm lg:grid-cols-2 rounded-2xl lg:p-10 fade-in">

            <!-- Kiri: Gambar Produk -->
            <div class="flex items-center justify-center overflow-hidden rounded-xl bg-gray-50">
                <img src="{{ asset('images/first.png') }}" alt="{{ $produk->nama_produk }}"
                    class="object-cover w-full h-auto rounded-xl">
            </div>

            <!-- Kanan: Detail Produk -->
            <div class="flex flex-col pt-2">

                <!-- Judul Produk -->
                <h1 class="text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl">
                    {{ $produk->nama_produk }}
                </h1>

                <!-- Rating & Ulasan (Statis mengikuti gambar) -->
                <div class="flex items-center mt-3 mb-6 space-x-1">
                    <div class="flex text-yellow-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-500">5.0 (15 Ulasan)</span>
                </div>

                <!-- Box Harga -->
                <div class="px-6 py-5 mb-6 border border-gray-200 rounded-xl bg-gray-50/50">
                    @if ($produk->harga > 0)
                        <h2 class="text-4xl font-extrabold tracking-tight text-brand-blue">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </h2>
                    @else
                        <h2 class="text-4xl font-extrabold tracking-tight text-brand-blue">
                            Gratis
                        </h2>
                    @endif
                </div>

                <!-- Deskripsi Produk -->
                <div class="mb-8">
                    <p class="text-[15px] leading-relaxed text-gray-600">
                        {{ $produk->deskripsi ?? 'Layanan Asesmen dan Konsultasi Master akan membantu Anda memahami secara mendalam karakter unik, bakat dan potensi diri Anda dalam konteks urusan atau permasalahan spesifik yang menjadi tujuan Anda melakukan asesmen. Dalam durasi 75 menit Anda dapat berdiskusi bersama Praktisi Talents Mapping untuk memahami hasil asesmen secara mendalam, memperjelas bagaimana Anda sebagai pribadi yang unik sebaiknya menyikapi suatu permasalahan yang kompleks, serta untuk menyusun rencana dan membuat keputusan tentang hidup Anda.' }}
                    </p>
                </div>

                <!-- Form Pembelian & Spacer untuk mendorong ke bawah jika deskripsi pendek -->
                <div class="mt-auto">
                    <form action="{{ route('user.transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                        <!-- Input Voucher (Minimalist) -->
                        <div class="mb-4">
                            <input type="text" name="kode_voucher" placeholder="Masukkan kode voucher jika ada..."
                                class="w-full px-4 py-3 text-sm bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00a8e8] focus:border-transparent placeholder-gray-400">
                        </div>

                        <!-- Tombol Beli Sekarang -->
                        <button type="submit"
                            class="w-full py-3.5 text-base font-bold text-white transition-colors duration-200 rounded-md bg-brand-blue hover-bg-brand-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00a8e8]">
                            Beli Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
