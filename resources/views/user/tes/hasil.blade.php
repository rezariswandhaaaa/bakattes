<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes Bakat CliftonStrengths</title>

    <link rel="icon" href="{{ asset('images/tab.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .pdf-container {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">

    <div class="container px-4 py-8 mx-auto max-w-7xl">

        <!-- Header dengan Tombol Aksi -->
        <div class="p-6 mb-6 bg-white shadow-lg rounded-2xl">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <!-- Title -->
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-[#0f3150] mb-1">
                        Hasil Tes
                    </h1>
                    <p class="text-sm text-gray-600">Laporan lengkap analisis bakat Anda</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center gap-3">

                    <a href="{{ route('user.tes.reset') }}"
                       onclick="return confirm('⚠️ Yakin ingin mengulang tes? Semua jawaban dan hasil akan dihapus!')"
                       class="inline-flex items-center px-5 py-2.5 bg-[#0f3150] hover:[#173f67] text-white rounded-xl font-semibold transition-all duration-200 shadow-md hover:shadow-lg">
                        <i data-lucide="refresh-cw" class="w-5 h-5 mr-2"></i>
                        <span>Ulangi Tes</span>
                    </a>

                    <a href="{{ route('user.tes.home') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl font-semibold transition-all duration-200">
                        <i data-lucide="home" class="w-5 h-5 mr-2"></i>
                        <span>Keluar</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="p-5 mt-6 mb-6 border border-blue-200 bg-blue-50 rounded-xl">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <i data-lucide="alert-circle" class="w-6 h-6 text-blue-600"></i>
                </div>
                <div class="flex-1">
                    <h3 class="mb-1 text-sm font-semibold text-blue-900">Peringatan Sebelum Keluar Halaman Ini</h3>
                    <p class="text-sm leading-relaxed text-blue-700">
                        Laporan ini menampilkan hasil dari tes bakat Anda. jangan lupa untuk download hasilnya sebelum keluar dari halaman ini. Jika ada hasil yang belum muncul mohon di refresh kembali halaman webnya.
                    </p>

                </div>
            </div>
        </div>

        <!-- PDF Viewer -->
        @if (isset($pdfPath))
            <div class="overflow-hidden bg-white shadow-xl rounded-2xl pdf-container">
                <!-- PDF Header Info -->
                <div class="bg-gradient-to-r from-[#0f3150] to-[#173f67] px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3 text-white">
                        <div class="p-2 rounded-lg bg-white/20 backdrop-blur-sm">
                            <i data-lucide="file-text" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold">Laporan Hasil Tes</h2>
                            <p class="text-sm text-blue-100">Format: PDF Document</p>
                        </div>
                    </div>
                    <div class="items-center hidden space-x-4 text-sm text-white md:flex">
                        <div class="flex items-center space-x-2">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                            <span>{{ date('d M Y') }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i data-lucide="user" class="w-4 h-4"></i>
                            <span>{{ Auth::user()->name ?? 'User' }}</span>
                        </div>
                    </div>
                </div>

                <!-- PDF Viewer Frame -->
                <div class="relative p-4 bg-gray-100">
                    <iframe src="{{ asset('storage/app/public/' . $pdfPath) }}"
                        class="w-full bg-white border border-gray-200 rounded-lg shadow-inner"
                        style="height: calc(100vh - 280px); min-height: 600px;" title="Hasil Tes CliftonStrengths PDF">
                    </iframe>
                </div>

                <!-- PDF Footer Actions -->
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <i data-lucide="info" class="w-4 h-4"></i>
                            <span>Scroll untuk melihat seluruh isi laporan</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ asset('storage/app/public/' . $pdfPath) }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                <i data-lucide="external-link" class="w-4 h-4 mr-2"></i>
                                Buka di Tab Baru
                            </a>
                            <a href="{{ Storage::url($pdfPath) }}" download
                                class="inline-flex items-center px-4 py-2 text-sm bg-[#d4af37] hover:bg-[#b38e2a] text-white rounded-lg font-medium transition-colors shadow-sm">
                                <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                                Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- No PDF Available -->
            <div class="p-12 text-center bg-white shadow-lg rounded-2xl">
                <div class="inline-flex items-center justify-center w-20 h-20 mb-6 bg-red-100 rounded-full">
                    <i data-lucide="alert-circle" class="w-10 h-10 text-red-600"></i>
                </div>
                <h2 class="mb-2 text-2xl font-bold text-gray-900">Laporan Tidak Tersedia</h2>
                <p class="mb-6 text-gray-600">Maaf, laporan PDF hasil tes Anda belum tersedia atau terjadi kesalahan.
                </p>
                <div class="flex justify-center gap-3">
                    <a href="{{ route('user.tes.index') }}"
                        class="inline-flex items-center px-6 py-3 bg-[#0f3150] hover:bg-[#173f67] text-white rounded-lg font-semibold transition-colors">
                        <i data-lucide="refresh-cw" class="w-5 h-5 mr-2"></i>
                        Ulangi Tes
                    </a>
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-6 py-3 font-semibold text-gray-700 transition-colors bg-gray-200 rounded-lg hover:bg-gray-300">
                        <i data-lucide="home" class="w-5 h-5 mr-2"></i>
                        Keluar
                    </a>
                </div>
            </div>
        @endif



    </div>

    <script>
        lucide.createIcons();

        // Check if PDF is loaded successfully
        const iframe = document.querySelector('iframe');
        if (iframe) {
            iframe.addEventListener('load', function() {
                console.log('PDF loaded successfully');
            });

            iframe.addEventListener('error', function() {
                console.error('Error loading PDF');
                alert('Gagal memuat PDF. Silakan coba download langsung.');
            });
        }
    </script>

</body>

</html>
