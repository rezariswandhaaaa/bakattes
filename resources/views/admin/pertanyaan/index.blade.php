@extends('layouts.admin')

@section('title', 'Kelola Pertanyaan')

@section('content')
    <div class="flex items-start justify-between mb-8">
        <h1 class="text-3xl font-bold text-[#0f3150]">Kelola Pertanyaan Tes Bakat</h1>

        <div class="flex flex-col space-y-3">
            <!-- Tombol Tambah Pertanyaan -->
            <a href="{{ route('pertanyaan.create') }}"
                class="inline-flex items-center justify-center px-4 py-2 font-medium text-white transition-all duration-200 bg-[#0f3150] rounded-lg shadow hover:bg-[#173f67]">
                <i data-lucide="plus-circle" class="w-5 h-5 mr-2"></i>
                Tambah Pertanyaan
            </a>

            <!-- Tombol Upload Banyak Pertanyaan -->
            <button id="openModalBtn"
                class="inline-flex items-center px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">
                <i data-lucide="file-up" class="w-5 h-5 mr-2"></i> Upload Banyak Pertanyaan
            </button>

        </div>
    </div>

    <!-- Pencarian -->
    <div class="relative w-full max-w-md mb-6">
        <i data-lucide="search" class="absolute w-5 h-5 text-gray-400 left-3 top-3"></i>
        <input type="text" name="search" id="searchInput" placeholder="Cari pertanyaan atau bakat..."
            class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0f3150] focus:border-[#0f3150]">
    </div>

    <!-- Tabel Pertanyaan -->
    <div id="userTable">
        @include('admin.pertanyaan.partials.table', ['pertanyaans' => $pertanyaans])
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $pertanyaans->links('pagination::tailwind') }}
    </div>

    <!-- Modal Upload Excel -->
    <div id="uploadModal" class="hidden fixed inset-0 items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 relative">
            <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>

            <h2 class="text-xl font-semibold text-[#0f3150] mb-4">Import Pertanyaan</h2>
            <p class="text-sm text-gray-600 mb-6">
                Download template, isi datanya, lalu upload ke sistem.
            </p>

            <div class="flex flex-col space-y-3">
                <a href="{{ route('pertanyaan.download.template') }}"
                    class="inline-flex items-center justify-center px-4 py-2 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    <i data-lucide="download" class="w-5 h-5 mr-2"></i>
                    Download Template
                </a>

                <form action="{{ route('pertanyaan.import.excel') }}" method="POST" enctype="multipart/form-data"
                    class="flex flex-col space-y-3">
                    @csrf
                    <input type="file" name="file" accept=".xlsx,.xls"
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0f3150]" required>

                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                        <i data-lucide="upload" class="w-5 h-5 mr-2"></i>
                        Upload & Import
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.lucide) lucide.createIcons();

            // Fungsi Pencarian
            const searchInput = document.getElementById("searchInput");
            const userTable = document.getElementById("userTable");
            let searchTimeout = null;

            searchInput.addEventListener("input", function() {
                const query = this.value.trim();
                clearTimeout(searchTimeout);

                searchTimeout = setTimeout(() => {
                    fetch(`{{ route('pertanyaan.index') }}?search=${encodeURIComponent(query)}`, {
                            headers: {
                                "X-Requested-With": "XMLHttpRequest"
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            userTable.innerHTML = html;
                            if (window.lucide) lucide.createIcons();
                        })
                        .catch(() => alert('Gagal memuat data pertanyaan'));
                }, 400);
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById("uploadModal");
            const openBtn = document.getElementById("openModalBtn");
            const closeBtn = document.getElementById("closeModalBtn");

            openBtn.addEventListener("click", () => {
                modal.classList.add("flex");
                modal.classList.remove("hidden");
            });

            closeBtn.addEventListener("click", () => {
                modal.classList.add("flex");
                modal.classList.add("hidden");
            });

            // Tutup modal kalau klik di luar konten
            modal.addEventListener("click", (e) => {
                if (e.target === modal) modal.classList.add("hidden");
            });

            if (window.lucide) lucide.createIcons();
        });
    </script>


@endsection
