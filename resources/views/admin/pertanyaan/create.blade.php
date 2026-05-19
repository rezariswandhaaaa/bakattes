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

            {{-- PILIH BAKAT --}}
            <div class="mb-4">
                <label for="bakat_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Pilih Bakat
                </label>

                <select name="bakat_id" id="bakat_id" class="w-full">
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

            {{-- PERTANYAAN --}}
            <div class="mb-4">
                <label for="pertanyaan" class="block text-sm font-medium text-gray-700">
                    Pertanyaan
                </label>

                <textarea name="pertanyaan" id="pertanyaan" rows="3"
                    class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600">{{ old('pertanyaan') }}</textarea>

                @error('pertanyaan')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- TIPE PERTANYAAN --}}
            <div class="mb-4">
                <label for="is_reverse" class="block text-sm font-medium text-gray-700">
                    Tipe Pertanyaan
                </label>

                <select name="is_reverse" id="is_reverse"
                    class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600">
                    <option value="0">Positif</option>
                    <option value="1">Negatif</option>
                </select>

                @error('is_reverse')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- BUTTON --}}
            <div class="flex items-center">
                <button type="submit"
                    class="px-6 py-2 font-semibold text-white transition duration-200 bg-[#0f3150] rounded-lg hover:bg-[#173f67]">
                    Simpan Pertanyaan
                </button>

                <a href="{{ route('pertanyaan.index') }}" class="ml-3 text-gray-600 hover:underline">
                    Batal
                </a>
            </div>

        </form>
    </div>

@endsection


{{-- ===================== STYLES ===================== --}}
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    <style>
        /* biar full width */
        .ts-wrapper {
            width: 100% !important;
        }

        /* styling input tom select */
        .ts-control {
            padding: 8px !important;
            border-radius: 8px !important;
            border: 1px solid #d1d5db !important;
        }

        /* dropdown lebih rapi */
        .ts-dropdown {
            border-radius: 8px !important;
            overflow: hidden;
        }
    </style>
@endpush


{{-- ===================== SCRIPTS ===================== --}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new TomSelect("#bakat_id", {
                create: false,
                placeholder: "Cari dan pilih bakat...",
                allowEmptyOption: true,
                maxOptions: 1000,
                highlight: true
            });
        });
    </script>
@endpush
