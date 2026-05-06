<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pertanyaan Tes</title>

    <link rel="icon" href="{{ asset('images/tab.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@0.396.0/dist/umd/lucide.js"></script>

    <style>
        /* === Custom Style Tom Select Sesuai Tema Kamu === */

        .ts-wrapper {
            width: 50%;
            border-radius: 0.75rem !important;
            transition: all 0.2s ease-in-out !important;
            display: block;
        }



        .ts-wrapper.focus .ts-control {
            border-color: #308deb;
            !important;
            box-shadow: 0 0 0 2px rgba(124, 58, 237, 0.2) !important;
        }
    </style>
</head>

<body class="text-gray-900 bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col justify-between w-64 text-white shadow-xl bg-[#0f3150]">
            <div class="p-6">
                <h2 class="mb-10 text-2xl font-extrabold tracking-wide">Admin Panel</h2>
                <nav class="space-y-3">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-2 space-x-3 transition-colors duration-200 rounded-lg hover:bg-[#173f67]">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('users.index') }}"
                        class="flex items-center px-4 py-2 space-x-3 transition-colors duration-200 rounded-lg hover:bg-[#173f67]">
                        <i data-lucide="users" class="w-5 h-5"></i>
                        <span>Kelola User</span>
                    </a>
                    <a href="{{ route('pertanyaan.index') }}"
                        class="flex items-center px-4 py-2 space-x-3 bg-[#173f67] rounded-lg">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                        <span>Kelola Tes</span>
                    </a>
                </nav>
            </div>
            <div class="p-6 border-t border-blue-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-2 space-x-2 font-semibold transition-colors duration-200 bg-red-600 rounded-lg hover:bg-red-700">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <h1 class="mb-6 text-3xl font-bold text-gray-800">Edit Pertanyaan Tes</h1>

            @if (session('success'))
                <div class="p-4 mb-6 text-white bg-blue-700 border border-blue-800 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 mb-6 text-white bg-red-600 border border-red-700 rounded-lg shadow-md">
                    {{ session('error') }}
                </div>
            @endif

            <div class="max-w-xl p-6 bg-white shadow-md rounded-2xl">
                <form action="{{ route('pertanyaan.update', $pertanyaan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="bakat_id" class="block text-sm font-medium text-gray-700">Pilih Bakat</label>
                        <select name="bakat_id" id="bakat_id">
                            <option value="">-- Pilih Bakat --</option>
                            @foreach ($bakats as $bakat)
                                <option value="{{ $bakat->id }}" @selected($bakat->id == $pertanyaan->bakat_id)>
                                    {{ $bakat->nama_bakat }}
                                </option>
                            @endforeach
                        </select>
                        @error('bakat_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                        <textarea name="pertanyaan" id="pertanyaan" rows="3"
                            class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600">{{ old('pertanyaan', $pertanyaan->pertanyaan) }}</textarea>
                        @error('pertanyaan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tipe Pertanyaan</label>
                        <select name="is_reverse" class="w-full p-2 mt-1 border rounded-lg">
                            <option value="0"
                                {{ old('is_reverse', $pertanyaan->is_reverse) == 0 ? 'selected' : '' }}>Positif
                            </option>
                            <option value="1"
                                {{ old('is_reverse', $pertanyaan->is_reverse) == 1 ? 'selected' : '' }}>Negatif
                            </option>
                        </select>
                        @error('is_reverse')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="flex items-center">
                        <button type="submit"
                            class="px-6 py-2 font-semibold text-white transition duration-200 bg-[#0f3150] rounded-lg hover:bg-[#173f67]">
                            <i data-lucide="save" class="inline-block w-5 h-5 mr-2"></i>
                            Update Pertanyaan
                        </button>
                        <a href="{{ route('pertanyaan.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        lucide.createIcons();

        // Init Tom Select
        new TomSelect("#bakat_id", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "Cari dan pilih bakat..."
        });
    </script>
</body>

</html>
