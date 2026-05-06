<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CliftonStrengths Assessment - Mulai Tes</title>

    <link rel="icon" href="{{ asset('images/tab.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .gallup-primary { background-color: #0f3150; }
        .gallup-primary-hover:hover { background-color: #173d63; }
        .gallup-accent { color: #0f3150; }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">

    <div class="max-w-4xl px-6 py-12 mx-auto">

        <!-- Hero Section -->
        <div class="mb-12 text-center">
            <div class="inline-block p-3 mb-6 bg-blue-100 rounded-2xl">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="mb-4 text-4xl font-bold leading-tight md:text-5xl gallup-accent">
                Bakat Assessment
            </h1>
            <p class="max-w-2xl mx-auto text-xl text-gray-600">
                Temukan bakat alami Anda dan pelajari cara mengembangkannya menjadi kekuatan
            </p>
        </div>

        <!-- Main Card -->
        <div class="overflow-hidden bg-white border border-gray-100 shadow-xl rounded-2xl">

            <!-- Header Image/Pattern -->
            <div class="h-3 gallup-primary"></div>

            <div class="p-8 md:p-12">

                <!-- Assessment Overview -->
                <div class="mb-10">
                    <h2 class="mb-4 text-2xl font-bold gallup-accent">Tentang Assessment Ini</h2>
                    <p class="mb-4 leading-relaxed text-gray-700">
                        Bakat assessment mengidentifikasi bakat alami Anda dari yang terdominant hingga paling rendah.
                        Dengan memahami bakat Anda, Anda dapat memaksimalkan potensi dan mencapai kesuksesan yang lebih besar.
                    </p>
                    <div class="grid gap-4 mt-6 md:grid-cols-3">
                        <div class="p-4 text-center bg-gray-50 rounded-xl">
                            <div class="text-3xl font-bold gallup-accent">114</div>
                            <div class="mt-1 text-sm text-gray-600">Pertanyaan</div>
                        </div>
                        <div class="p-4 text-center bg-gray-50 rounded-xl">
                            <div class="text-3xl font-bold gallup-accent">34</div>
                            <div class="mt-1 text-sm text-gray-600">Tema Bakat</div>
                        </div>
                        <div class="p-4 text-center bg-gray-50 rounded-xl">
                            <div class="text-3xl font-bold gallup-accent">90 Menit</div>
                            <div class="mt-1 text-sm text-gray-600">Waktu Pengerjaan</div>
                        </div>
                    </div>
                </div>

                <!-- Instructions -->
                <div class="p-6 mb-8 border-l-4 border-blue-600 bg-blue-50 rounded-r-xl">
                    <h3 class="flex items-center mb-4 text-lg font-bold gallup-accent">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Petunjuk Pengerjaan
                    </h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 gallup-primary rounded-full flex items-center justify-center text-white text-xs font-bold mr-3 mt-0.5">1</span>
                            <span>Jawab setiap pertanyaan berdasarkan respons spontan pertama Anda - jangan terlalu lama berpikir</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 gallup-primary rounded-full flex items-center justify-center text-white text-xs font-bold mr-3 mt-0.5">2</span>
                            <span>Pilih jawaban dari skala <strong>1 (Sangat Tidak Setuju)</strong> hingga <strong>6 (Sangat Setuju)</strong></span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 gallup-primary rounded-full flex items-center justify-center text-white text-xs font-bold mr-3 mt-0.5">3</span>
                            <span>Waktu Tes akan terus berjalan saat anda memulai tesnya</span>
                        </li>
                    </ul>
                </div>

                <!-- What You'll Get -->
                <div class="mb-8">
                    <h3 class="mb-4 text-xl font-bold gallup-accent">Anda Akan Mendapatkan:</h3>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="flex items-start space-x-3">
                            <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Potensi Bakat</div>
                                <div class="text-sm text-gray-600">Area kekuatan Beserta Penjelasan</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">34 Tema Lengkap</div>
                                <div class="text-sm text-gray-600">Urutan Bakat Anda Dari Yang Paling Dominan Hingga Paling Rendah</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Style Komunikasi</div>
                                <div class="text-sm text-gray-600">Penjelasan Cara Komunikasi Sesuai Bakat</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Rekomendasi Karir</div>
                                <div class="text-sm text-gray-600">Saran Pekerjaan Sesuai Bakat</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Important Notice -->
                <div class="p-5 mb-8 border border-yellow-200 bg-yellow-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="flex-shrink-0 w-6 h-6 mr-3 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <div>
                            <div class="mb-1 font-semibold text-yellow-900">Penting:</div>
                            <div class="text-sm text-yellow-800">
                                Pastikan Anda memiliki waktu luang tanpa gangguan. Progress akan tersimpan otomatis saat Anda berpindah halaman.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="text-center">
                    <a href="{{ route('user.tes.mulai') }}"
                       class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white transition-all duration-300 shadow-lg gallup-primary gallup-primary-hover rounded-xl hover:shadow-xl hover:scale-105">
                        <span>Mulai Assessment</span>

                    </a>
                    <p class="mt-4 text-sm text-gray-500">
                        Dengan melanjutkan, Anda menyetujui bahwa data akan digunakan untuk analisis hasil tes
                    </p>
                </div>

            </div>

            <!-- Footer Accent -->
            <div class="h-2 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>
        </div>

        <!-- Footer Info -->
        <div class="mt-8 text-sm text-center text-gray-500">
            <p>© 2024 CliftonStrengths Assessment. Dikembangkan oleh R.</p>
        </div>

    </div>

</body>

</html>
