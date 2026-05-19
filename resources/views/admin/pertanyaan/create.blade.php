@extends('layouts.admin')

@section('title', 'Tambah Pertanyaan')

@section('content')

    <h1 class="mb-6 text-3xl font-bold text-gray-800">
        Tambah Pertanyaan Tes
    </h1>

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
        <form action="{{ route('pertanyaan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="bakat_id" class="block text-sm font-medium text-gray-700">
                    Pilih Bakat
                </label>

                <select name="bakat_id" id="bakat_id">
                    <option value="">-- Pilih Bakat --</option>

                    @foreach ($bakats as $bakat)
                        <option value="{{ $bakat->id }}">
                            {{ $bakat->nama_bakat }}
                        </option>
                    @endforeach
                </select>

                @error('bakat_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pertanyaan" class="block text-sm font-medium text-gray-700">
                    Pertanyaan
                </label>

                <textarea
                    name="pertanyaan"
                    id="pertanyaan"
                    rows="3"
                    class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600"
                >{{ old('pertanyaan') }}</textarea>

                @error('pertanyaan')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="is_reverse" class="block text-sm font-medium text-gray-700">
                    Tipe Pertanyaan
                </label>

                <select
                    name="is_reverse"
                    id="is_reverse"
                    class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600"
                >
                    <option value="0">Positif</option>
                    <option value="1">Negatif</option>
                </select>

                @error('is_reverse')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <button
                    type="submit"
                    class="px-6 py-2 font-semibold text-white transition duration-200 bg-[#0f3150] rounded-lg hover:bg-[#173f67]"
                >
                    Simpan Pertanyaan
                </button>

                <a href="{{ route('pertanyaan.index') }}"
                    class="ml-3 text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    <style>
        .tom-select {
            width: 100% !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script>
        new TomSelect("#bakat_id", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "Cari dan pilih bakat..."
        });
    </script>
@endpush
