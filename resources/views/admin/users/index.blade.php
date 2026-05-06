@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold text-[#0f3150]">Kelola User</h1>
        <a href="{{ route('users.create') }}"
            class="flex items-center px-4 py-2 space-x-2 font-semibold text-white transition duration-200 bg-[#0f3150] rounded-lg hover:bg-[#173f67] shadow-md hover:shadow-lg">
            <i data-lucide="plus-circle" class="w-5 h-5"></i>
            <span>Tambah User</span>
        </a>
    </div>

    <!-- Pencarian -->
    <div class="relative w-full max-w-md mb-6">
        <i data-lucide="search" class="absolute w-5 h-5 text-gray-400 left-3 top-3"></i>
        <input type="text" id="searchInput" placeholder="Cari nama atau email..."
            class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0f3150] focus:border-[#0f3150] transition-all">
    </div>

    <!-- Tabel User -->
    <div id="userTable">
        @include('admin.users.partials.table', ['users' => $users])
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $users->links('pagination::tailwind') }}
    </div>

    <script>
        // Fungsi Pencarian
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const userTable = document.getElementById("userTable");
            let searchTimeout = null;

            searchInput.addEventListener("input", function() {
                const query = this.value.trim();
                clearTimeout(searchTimeout);

                searchTimeout = setTimeout(() => {
                    fetch(`{{ route('users.index') }}?search=${encodeURIComponent(query)}`, {
                            headers: {
                                "X-Requested-With": "XMLHttpRequest"
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            userTable.innerHTML = html;
                            if (window.lucide) lucide.createIcons();
                        })
                        .catch(() => showNotification('Gagal memuat data user', 'error'));
                }, 400);
            });
        });
    </script>
@endsection
