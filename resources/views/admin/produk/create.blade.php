@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="max-w-3xl p-6 mx-auto bg-white rounded-lg shadow">

        <h1 class="mb-6 text-2xl font-semibold">Tambah Produk</h1>

        <form action="{{ route('admin.produk.store') }}" method="POST">
            @csrf

            {{-- Nama Produk --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"
                    placeholder="Masukin Nama Produk..." class="w-full px-3 py-2 border rounded-lg">
                @error('nama_produk')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Harga --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Harga</label>

                <input type="text" id="harga" name="harga" value="{{ old('harga') }}"
                    placeholder="Masukin Nominal..." class="w-full px-3 py-2 border rounded-lg" onkeyup="formatRupiah(this)">
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" rows="4" placeholder="Masukin Deskripsi..." class="w-full px-3 py-2 border rounded-lg">{{ old('deskripsi') }}</textarea>
            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.produk.index') }}" class="px-4 py-2 border rounded-lg">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    Simpan
                </button>
            </div>

        </form>
    </div>
@endsection
