@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-3xl p-6 mx-auto bg-white rounded-lg shadow">

    <h1 class="mb-6 text-2xl font-semibold">Edit Produk</h1>

    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama Produk --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Nama Produk</label>
            <input type="text" name="nama_produk"
                value="{{ old('nama_produk', $produk->nama_produk) }}"
                class="w-full px-3 py-2 border rounded-lg">
        </div>

        {{-- Harga --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="harga"
                value="{{ old('harga', $produk->harga) }}"
                class="w-full px-3 py-2 border rounded-lg">
        </div>

        {{-- Deskripsi --}}
        <div class="mb-6">
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full px-3 py-2 border rounded-lg">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.produk.index') }}"
                class="px-4 py-2 border rounded-lg">
                Kembali
            </a>
            <button type="submit"
                class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                Update
            </button>
        </div>

    </form>
</div>
@endsection
