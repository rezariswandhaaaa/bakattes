<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} - Detail Produk</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .gradient-text {
            background: linear-gradient(135deg, #15097e, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }



        .btn-gradient {
            background: linear-gradient(to right, #15097e, #4649e9, #3b82f6);
        }
    </style>
</head>

<body class="min-h-screen text-gray-800 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50">

    {{-- Background Ornaments --}}
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute bg-purple-300 rounded-full w-96 h-96 opacity-30 blur-3xl -top-10 -left-20"></div>
        <div class="absolute bg-blue-300 rounded-full w-96 h-96 opacity-30 blur-3xl top-20 right-10"></div>
    </div>

    <div class="container relative z-10 max-w-6xl px-4 py-10 mx-auto">

        {{-- Tombol Kembali --}}
        <a href="{{ route('user.produk') }}"
            class="inline-flex items-center space-x-2 px-5 py-2.5 mb-8 rounded-xl shadow-md glass hover:shadow-xl transition-all hover:scale-105 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5 transition group-hover:-translate-x-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Kembali ke Produk</span>
        </a>

        {{-- Kartu Produk --}}
        <div
            class="grid grid-cols-1 gap-10 p-6 overflow-hidden shadow-2xl lg:grid-cols-2 glass rounded-3xl lg:p-10 animate-fade-in">

            {{-- Gambar Produk --}}
            <div
                class="relative flex items-center justify-center p-6 bg-gradient-to-br from-purple-100 via-indigo-100 to-pink-100 rounded-2xl">
                <div
                    class="absolute inset-0 opacity-40 bg-gradient-to-br from-purple-400 via-indigo-300 to-pink-300 blur-2xl">
                </div>
                <img src="{{ asset('images/first.png') }}" alt="{{ $produk->nama_produk }}"
                    class="relative z-10 max-w-sm transition-transform duration-700 shadow-xl rounded-2xl float hover:scale-105 hover:rotate-1">
            </div>

            {{-- Detail Produk --}}
            <div class="flex flex-col justify-center space-y-6">
                {{-- Nama Produk --}}
                <h1 class="text-4xl font-bold lg:text-5xl gradient-text">
                    {{ $produk->nama_produk }}
                </h1>

                {{-- Deskripsi --}}
                <p class="text-lg leading-relaxed text-gray-600">
                    {{ $produk->deskripsi ?? 'Deskripsi belum tersedia.' }}
                </p>

                {{-- Fitur --}}
                <div class="space-y-3">
                    @foreach (['34 Tema Bakat CliftonStrengths', 'Hasil Analisis Komprehensif', 'Rekomendasi Karir Personalized'] as $fitur)
                        <div class="flex items-start space-x-3">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full">
                                {{-- Icon Check --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4 text-blue-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-700">{{ $fitur }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Harga --}}
                <div>
                    @if ($produk->harga > 0)
                        <span class="text-3xl font-bold text-gray-900">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </span>
                    @else
                        <div
                            class="inline-flex items-center gap-2 px-6 py-3 text-lg font-semibold text-white shadow-lg rounded-2xl btn-gradient">
                            {{-- Icon Gift --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20 12v8a1 1 0 01-1 1h-3v-9h4zM8 21H5a1 1 0 01-1-1v-8h4v9zm9-13a3 3 0 00-6 0v1h6V8zM8 8a3 3 0 016 0v1H8V8zM4 12h16" />
                            </svg>
                            Gratis
                        </div>
                    @endif
                </div>

                {{-- Tombol Pembayaran --}}
                <form action="{{ route('user.transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    <button type="submit" class="relative inline-flex items-center justify-center w-full px-8 py-4 text-lg font-bold text-white rounded-2xl btn-gradient">
                        Beli Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
