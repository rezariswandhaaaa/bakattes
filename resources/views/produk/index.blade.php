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
            animation: fadeIn 1s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stagger-in>* {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .stagger-in>*:nth-child(1) {
            animation-delay: 0.2s;
        }

        .stagger-in>*:nth-child(2) {
            animation-delay: 0.4s;
        }

        .stagger-in>*:nth-child(3) {
            animation-delay: 0.6s;
        }

        .stagger-in>*:nth-child(4) {
            animation-delay: 0.8s;
        }

        /* Hover efek gambar */
        .product-image-wrapper:hover img {
            transform: scale(1.08) translateY(-4px);
            filter: brightness(1.05);
        }

        /* Scroll custom untuk deskripsi panjang */
        .description-scrollbar {
            max-height: 160px;
            overflow-y: auto;
        }

        .description-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .description-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .description-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .description-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Latar belakang dekoratif lembut */
        .bg-ornament-1 {
            background: radial-gradient(circle at 30% 30%, rgba(79, 70, 229, 0.15) 0%, transparent 50%);
            top: -10%;
            left: -10%;
        }

        .bg-ornament-2 {
            background: radial-gradient(circle at 70% 70%, rgba(148, 163, 184, 0.1) 0%, transparent 50%);
            bottom: -15%;
            right: -10%;
        }
    </style>
</head>

<body
    class="min-h-screen font-sans antialiased text-slate-800 bg-slate-50 selection:bg-indigo-100 selection:text-indigo-900">

    <!-- Background Ornaments -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute rounded-full w-96 h-96 bg-ornament-1 blur-3xl opacity-70"></div>
        <div class="absolute w-[30rem] h-[30rem] bg-ornament-2 rounded-full blur-3xl opacity-60"></div>
    </div>

    <div class="container relative z-10 max-w-6xl px-4 py-10 mx-auto lg:py-16">

        <!-- Tombol Kembali -->
        <a href="{{ route('user.produk') }}"
            class="inline-flex items-center mb-8 text-sm font-medium transition-all duration-200 text-slate-500 hover:text-slate-900 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="ml-1">Kembali ke Katalog</span>
        </a>

        <!-- Kartu Produk Utama -->
        <div
            class="grid grid-cols-1 gap-12 p-8 bg-white border shadow-xl border-slate-100 shadow-slate-200/40 lg:grid-cols-12 rounded-3xl lg:p-10 fade-in">

            <!-- Gambar Produk -->
            <div
                class="overflow-hidden border rounded-3xl bg-slate-50 border-slate-100 lg:col-span-5 product-image-wrapper">
                <img src="{{ asset('images/first.png') }}" alt="{{ $produk->nama_produk }}"
                    class="object-contain w-full transition-transform duration-700 ease-in-out h-80 lg:h-96">
            </div>

            <!-- Detail Produk -->
            <div class="flex flex-col justify-between space-y-6 lg:col-span-7">

                <!-- Konten Atas -->
                <div class="space-y-5">
                    <!-- Badge Kategori -->
                    <span
                        class="inline-block px-4 py-1.5 text-xs font-semibold tracking-wider uppercase text-slate-600 bg-slate-100 rounded-full">
                        Premium Assessment
                    </span>

                    <!-- Judul Produk -->
                    <h1 class="text-3xl font-extrabold leading-tight text-slate-900 lg:text-4xl">
                        {{ $produk->nama_produk }}
                    </h1>

                    <!-- Deskripsi Produk -->
                    <div class="description-scrollbar">
                        <p class="text-base leading-relaxed text-slate-600 lg:text-lg">
                            {{ $produk->deskripsi ?? 'Deskripsi produk belum tersedia.' }}
                        </p>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Fitur Produk -->
                    <div>
                        <h3 class="mb-4 text-sm font-bold tracking-wide uppercase text-slate-900">Yang Akan Anda
                            Dapatkan:</h3>
                        <div class="space-y-3">
                            @foreach (['34 Tema Bakat CliftonStrengths', 'Hasil Analisis Komprehensif', 'Rekomendasi Karir Terpersonalisasi'] as $fitur)
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 w-6 h-6 rounded-full bg-slate-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="3" stroke="currentColor" class="w-3 h-3 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-slate-700">{{ $fitur }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Area Harga & Checkout -->
                <div class="p-6 border shadow-inner bg-slate-50 border-slate-100 rounded-2xl">
                    <div class="flex flex-col justify-between gap-4 mb-5 sm:flex-row sm:items-end">
                        <div>
                            <p class="mb-1 text-sm font-semibold text-slate-500">Total Pembayaran</p>
                            @if ($produk->harga > 0)
                                <span class="text-3xl font-black text-slate-900">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </span>
                            @else
                                <span class="text-3xl font-black text-emerald-600">Gratis</span>
                            @endif
                        </div>
                    </div>

                    <!-- Form Voucher -->
                    <form action="{{ route('user.transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                        <div class="mb-5">
                            <label for="kode_voucher" class="block mb-2 text-sm font-semibold text-slate-700">
                                Kode Promo / Voucher <span class="font-normal text-slate-400">(Opsional)</span>
                            </label>
                            <input type="text" id="kode_voucher" name="kode_voucher"
                                placeholder="MASUKKAN KODE DI SINI"
                                class="w-full px-4 py-3 text-sm font-medium tracking-wide uppercase transition-all bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent placeholder-slate-400 placeholder:tracking-wider">
                        </div>

                        <!-- Tombol Beli -->
                        <button type="submit"
                            class="flex items-center justify-center w-full px-8 py-4 text-base font-bold text-white transition-all duration-200 border border-transparent bg-slate-900 rounded-xl hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-300 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 group">
                            <span>Lanjutkan ke Pembayaran</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
