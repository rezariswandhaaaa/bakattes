@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-[#0f3150] mb-2">Selamat Datang, Admin 👋</h1>
        <p class="text-gray-600">Berikut adalah ringkasan sistem tes bakat CliftonStrengths</p>
    </div>

    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-5">

        <div class="p-6 transition-all duration-300 bg-white border-t-4 border-blue-500 shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 transition-colors bg-blue-100 rounded-xl group-hover:bg-blue-200">
                    <i data-lucide="users" class="w-6 h-6 text-blue-600"></i>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Users</span>
            </div>
            <h2 class="mb-1 text-sm font-medium text-gray-600">Total User</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
            <p class="mt-2 text-xs text-gray-500">User terdaftar</p>
        </div>

        <div class="p-6 transition-all duration-300 bg-white border-t-4 border-purple-500 shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 transition-colors bg-purple-100 rounded-xl group-hover:bg-purple-200">
                    <i data-lucide="file-text" class="w-6 h-6 text-purple-600"></i>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-purple-700 bg-purple-100 rounded-full">Questions</span>
            </div>
            <h2 class="mb-1 text-sm font-medium text-gray-600">Total Pertanyaan</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $totalPertanyaan }}</p>
            <p class="mt-2 text-xs text-gray-500">Pertanyaan tersedia</p>
        </div>

        <div class="p-6 transition-all duration-300 bg-white border-t-4 border-green-500 shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 transition-colors bg-green-100 rounded-xl group-hover:bg-green-200">
                    <i data-lucide="award" class="w-6 h-6 text-green-600"></i>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Talents</span>
            </div>
            <h2 class="mb-1 text-sm font-medium text-gray-600">Total Bakat</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $totalBakat }}</p>
            <p class="mt-2 text-xs text-gray-500">Tema bakat CliftonStrengths</p>
        </div>

        <div class="p-6 transition-all duration-300 bg-white border-t-4 border-orange-500 shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 transition-colors bg-orange-100 rounded-xl group-hover:bg-orange-200">
                    <i data-lucide="check-circle" class="w-6 h-6 text-orange-600"></i>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-orange-700 bg-orange-100 rounded-full">Completed</span>
            </div>
            <h2 class="mb-1 text-sm font-medium text-gray-600">Tes Selesai</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $totalTesSelesai }}</p>
            <p class="mt-2 text-xs text-gray-500">User yang sudah tes</p>
        </div>

        <div class="p-6 transition-all duration-300 bg-white border-t-4 border-teal-500 shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 transition-colors bg-teal-100 rounded-xl group-hover:bg-teal-200">
                    <i data-lucide="receipt" class="w-6 h-6 text-teal-600"></i>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-teal-700 bg-teal-100 rounded-full">Finance</span>
            </div>
            <h2 class="mb-1 text-sm font-medium text-gray-600">Total Transaksi</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $totalTransaksi }}</p>
            <p class="mt-2 text-xs font-semibold">
                @if($transaksiMenunggu > 0)
                    <span class="flex items-center text-red-600 animate-pulse">
                        <span class="w-2 h-2 mr-1 bg-red-600 rounded-full"></span>
                        {{ $transaksiMenunggu }} Menunggu Verifikasi
                    </span>
                @else
                    <span class="text-gray-500">Semua Terverifikasi</span>
                @endif
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2">
        <div class="p-6 bg-white shadow-md rounded-2xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-gray-900">Informasi Sistem</h3>
                <i data-lucide="info" class="w-5 h-5 text-gray-400"></i>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                    <span class="text-sm text-gray-600">Rata-rata Pertanyaan per Bakat</span>
                    <span class="font-bold text-gray-900">{{ $totalBakat > 0 ? number_format($totalPertanyaan / $totalBakat, 1) : 0 }}</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg bg-green-50">
                    <span class="text-sm font-medium text-green-700">Status Sistem</span>
                    <span class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="font-bold text-green-700">Online</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="p-6 transition-all duration-300 bg-white border-t-4 border-teal-500 shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 transition-colors bg-teal-100 rounded-xl group-hover:bg-teal-200">
                    <i data-lucide="receipt" class="w-6 h-6 text-teal-600"></i>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-teal-700 bg-teal-100 rounded-full">Finance</span>
            </div>
            <h2 class="mb-1 text-sm font-medium text-gray-600">Total Transaksi</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $totalTransaksi }}</p>
            <p class="mt-2 text-xs font-semibold">
                @if($transaksiMenunggu > 0)
                    <span class="flex items-center text-red-600 animate-pulse">
                        <span class="w-2 h-2 mr-1 bg-red-600 rounded-full"></span>
                        {{ $transaksiMenunggu }} Menunggu Verifikasi
                    </span>
                @else
                    <span class="text-gray-500">Semua Terverifikasi</span>
                @endif
            </p>
        </div>
    </div>

    <div class="bg-gradient-to-r from-[#0f3150] to-[#173f67] rounded-2xl p-6 text-white shadow-lg">
        <div class="flex items-start justify-between">
            <div>
                <h3 class="mb-2 text-xl font-bold">📊 Tes Bakat</h3>
                <p class="mb-4 text-blue-100">Sistem tes bakat berbasis 34 tema CliftonStrengths untuk membantu user menemukan potensi terbaik mereka.</p>
                <div class="flex items-center space-x-4 text-sm">
                    <div class="flex items-center space-x-2">
                        <i data-lucide="check-circle" class="w-4 h-4"></i>
                        <span>114 Pertanyaan</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i data-lucide="target" class="w-4 h-4"></i>
                        <span>34 Tema Bakat</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                    <i data-lucide="book" class="w-12 h-12 text-yellow-400"></i>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Simpan jumlah transaksi menunggu sebelumnya untuk mendeteksi perubahan
            let lastPendingCount = {{ $transaksiMenunggu }};

            // Lakukan pengecekan ke server setiap 10 detik (10000 ms)
            setInterval(function() {
                fetch('{{ route('admin.api.notif') }}')
                    .then(response => response.json())
                    .then(data => {
                        let currentPendingCount = data.menunggu;

                        // Jika ada penambahan jumlah transaksi yang menunggu verifikasi
                        if (currentPendingCount > lastPendingCount) {
                            // Hitung selisih transaksi baru
                            let newTransactions = currentPendingCount - lastPendingCount;

                            // Munculkan notifikasi pakai fungsi bawaan di layout.blade.php kamu!
                            if (typeof showNotification === "function") {
                                showNotification(`Ada ${newTransactions} bukti pembayaran baru yang menunggu diverifikasi!`, 'warning');
                            }

                            // Update angka di kartu dashboard secara live tanpa reload
                            lastPendingCount = currentPendingCount;

                            // Mainkan suara notifikasi kecil (opsional)
                            let audio = new Audio('https://actions.google.com/sounds/v1/alarms/beep_short.ogg');
                            audio.play().catch(e => console.log('Autoplay dicegah oleh browser'));
                        }
                        // Jika admin baru saja memverifikasi (jumlah berkurang), sesuaikan angka patokan
                        else if (currentPendingCount < lastPendingCount) {
                            lastPendingCount = currentPendingCount;
                        }
                    })
                    .catch(error => console.error('Error fetching notifications:', error));
            }, 10000);
        });
    </script>
@endsection
