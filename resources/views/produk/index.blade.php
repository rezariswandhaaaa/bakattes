<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} - Detail Produk</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Animasi masuk yang elegan */
        .fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Kostumisasi scrollbar jika teks deskripsi panjang */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body
    class="min-h-screen font-sans antialiased text-slate-800 bg-slate-50 selection:bg-indigo-100 selection:text-indigo-900">

    {{-- Background Ornaments (Subtle) --}}
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div
            class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-indigo-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60">
        </div>
        <div
            class="absolute bottom-[-10%] right-[-5%] w-[30rem] h-[30rem] bg-slate-200/50 rounded-full mix-blend-multiply filter blur-3xl opacity-60">
        </div>
    </div>

    <div class="container relative z-10 max-w-6xl px-4 py-10 mx-auto lg:py-16">

        {{-- Tombol Kembali yang Minimalis --}}
        <a href="{{ route('user.produk') }}"
            class="inline-flex items-center mb-8 space-x-2 text-sm font-medium transition-colors text-slate-500 hover:text-slate-900 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-4 h-4 transition-transform group-hover:-translate-x-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Kembali ke Katalog</span>
        </a>

        {{-- Kartu Utama Produk --}}
        <div
            class="grid grid-cols-1 gap-12 p-6 bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 lg:grid-cols-12 rounded-[2rem] lg:p-10 fade-in-up">

            {{-- Area Gambar Produk (Kiri) --}}
            <div
                class="relative flex items-center justify-center p-8 border bg-slate-50 border-slate-100 rounded-3xl lg:col-span-5 group">
                <img src="{{ asset('images/first.png') }}" alt="{{ $produk->nama_produk }}"
                    class="relative z-10 w-full max-w-xs transition-transform duration-700 drop-shadow-2xl group-hover:scale-105 group-hover:-translate-y-2">
            </div>

            {{-- Area Detail Produk (Kanan) --}}
            <div class="flex flex-col justify-between lg:col-span-7">

                <div>
                    {{-- Badge Kategori --}}
                    <div class="mb-4">
                        <span
                            class="px-3 py-1 text-xs font-semibold tracking-wider uppercase rounded-full text-slate-600 bg-slate-100">
                            Premium Assessment
                        </span>
                    </div>

                    {{-- Nama Produk --}}
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 lg:text-4xl">
                        {{ $produk->nama_produk }}
                    </h1>

                    {{-- Deskripsi --}}
                    <p class="mt-4 text-base leading-relaxed text-slate-600 lg:text-lg">
                        {{ $produk->deskripsi ?? 'Deskripsi produk belum tersedia.' }}
                    </p>

                    <hr class="my-6 border-slate-100">

                    {{-- Fitur Utama --}}
                    <h3 class="mb-4 text-sm font-bold tracking-wide uppercase text-slate-900">Yang Akan Anda Dapatkan:
                    </h3>
                    <div class="mb-8 space-y-3">
                        @foreach (['34 Tema Bakat CliftonStrengths', 'Hasil Analisis Komprehensif', 'Rekomendasi Karir Terpersonalisasi'] as $fitur)
                            <div class="flex items-center space-x-3 text-slate-700">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-6 h-6 text-white rounded-full bg-slate-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="3" stroke="currentColor" class="w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">{{ $fitur }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Area Checkout (Harga & Form Voucher) --}}
                <div class="p-6 border bg-slate-50 border-slate-100 rounded-2xl">
                    <div class="flex flex-col justify-between gap-4 mb-6 sm:flex-row sm:items-end">
                        <div>
                            <p class="mb-1 text-sm font-semibold text-slate-500">Total Tagihan</p>
                            @if ($produk->harga > 0)
                                <span class="text-3xl font-black text-slate-900">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </span>
                            @else
                                <span class="text-3xl font-black text-emerald-600">
                                    Gratis
                                </span>
                            @endif
                        </div>
                    </div>

                    <form action="{{ route('user.transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                        {{-- Input Voucher --}}
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-semibold text-slate-700">Kode Promo / Voucher <span
                                    class="font-normal text-slate-400">(Opsional)</span></label>
                            <input type="text" name="kode_voucher" placeholder="Masukkan kode di sini..."
                                class="w-full px-4 py-3 text-sm font-medium uppercase transition-colors bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent placeholder-slate-400">
                        </div>

                        {{-- Tombol Beli --}}
                        <button type="submit"
                            class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold text-white transition-all duration-200 border border-transparent bg-slate-900 rounded-xl hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-300 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                            <span>Lanjutkan ke Pembayaran</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5 ml-2">
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
