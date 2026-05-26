<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@0.396.0/dist/umd/lucide.js"></script>

    <style>
        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeOutDown {
            from {
                transform: translateY(0) scale(1);
                opacity: 1;
            }

            to {
                transform: translateY(20px) scale(0.95);
                opacity: 0;
            }
        }

        .notification-enter {
            animation: fadeInUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .notification-exit {
            animation: fadeOutDown 0.3s cubic-bezier(0.6, 0, 0.8, 0.15) forwards;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }
    </style>
</head>

<body class="text-gray-900 bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col justify-between w-64 text-white shadow-xl bg-[#0f3150]">
            <div class="p-6">
                <h2 class="mb-10 text-2xl font-extrabold tracking-wide text-yellow-400">Admin Panel</h2>

                <nav class="space-y-3">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ Request::routeIs('admin.dashboard') ? 'bg-[#173f67]' : 'hover:bg-[#173f67]' }}">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('users.index') }}"
                        class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ Request::routeIs('users.*') ? 'bg-[#173f67]' : 'hover:bg-[#173f67]' }}">
                        <i data-lucide="users" class="w-5 h-5"></i>
                        <span>Kelola User</span>
                    </a>

                    <a href="{{ route('pertanyaan.index') }}"
                        class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ Request::routeIs('pertanyaan.*') ? 'bg-[#173f67]' : 'hover:bg-[#173f67]' }}">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                        <span>Kelola Pertanyaan</span>
                    </a>

                    <a href="{{ route('admin.produk.index') }}"
                        class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ Request::routeIs('admin.produk.index*') ? 'bg-[#173f67]' : 'hover:bg-[#173f67]' }}">
                        <i data-lucide="clipboard-pen" class="w-5 h-5"></i>
                        <span>Produk</span>
                    </a>

                    <a href="{{ route('admin.transaksi.index') }}"
                        class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ Request::routeIs('admin.transaksi.*') ? 'bg-[#173f67]' : 'hover:bg-[#173f67]' }}">
                        <i data-lucide="receipt" class="w-5 h-5"></i>
                        <span>Kelola Transaksi</span>
                    </a>

                    <a href="{{ route('riwayat.index') }}"
                        class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ Request::routeIs('riwayat.index*') ? 'bg-[#173f67]' : 'hover:bg-[#173f67]' }}">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        <span>Riwayat Hasil Tes</span>
                    </a>

                </nav>
                <div class="p-6 border-t border-[#173f67]">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-center w-full px-4 py-2 space-x-2 font-semibold transition-colors duration-200 bg-red-600 rounded-lg hover:bg-red-700">
                            <i data-lucide="log-out" class="w-5 h-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>


        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>



    <div id="notification-container" class="fixed top-5 right-5 z-50 space-y-4 w-80 max-w-[90vw]"></div>

    <script>
        // 🔔 FUNGSI NOTIFIKASI GLOBAL
        function showNotification(message, type = 'success') {
            const container = document.getElementById('notification-container');
            const configs = {
                success: {
                    gradient: 'from-emerald-500 to-teal-600',
                    icon: 'check-circle-2',
                    title: 'Berhasil'
                },
                error: {
                    gradient: 'from-rose-500 to-red-600',
                    icon: 'alert-circle',
                    title: 'Error'
                },
                warning: {
                    gradient: 'from-amber-500 to-orange-600',
                    icon: 'alert-triangle',
                    title: 'Perhatian'
                },
                info: {
                    gradient: 'from-sky-500 to-blue-600',
                    icon: 'info',
                    title: 'Informasi'
                }
            };
            const config = configs[type] || configs.success;

            const notification = document.createElement('div');
            notification.className =
                'notification-enter glass-effect rounded-2xl shadow-2xl border border-gray-200 overflow-hidden';
            notification.innerHTML = `
                <div class="h-1 bg-gradient-to-r ${config.gradient}"></div>
                <div class="flex items-start p-5 space-x-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br ${config.gradient} flex items-center justify-center shadow-lg">
                        <i data-lucide="${config.icon}" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-900">${config.title}</h4>
                        <p class="text-sm text-gray-600">${message}</p>
                    </div>
                    <button onclick="this.closest('.notification-enter').remove()" class="text-gray-400 hover:text-gray-600">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>`;
            container.appendChild(notification);
            lucide.createIcons();

            setTimeout(() => notification.remove(), 4000);
        }

        // 🔁 Laravel session flash messages
        @if (session('success'))
            showNotification("{{ session('success') }}", 'success');
        @endif
        @if (session('error'))
            showNotification("{{ session('error') }}", 'error');
        @endif
        @if (session('warning'))
            showNotification("{{ session('warning') }}", 'warning');
        @endif
        @if (session('info'))
            showNotification("{{ session('info') }}", 'info');
        @endif

        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();

            // Jalankan ulang lucide setiap kali konten AJAX diperbarui
            document.addEventListener('ajaxComplete', function() {
                lucide.createIcons();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>

</html>
