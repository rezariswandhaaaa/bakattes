@extends('layouts.admin')

@section('title', 'Produk')

@section('content')

    <div class="container px-4 py-6 mx-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Manajemen Produk
            </h1>

            <a href="{{ route('admin.produk.create') }}"
                class="flex items-center px-4 py-2 space-x-2 font-semibold text-white transition duration-200 bg-[#0f3150] rounded-lg hover:bg-[#173f67] shadow-md hover:shadow-lg">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                <span>Tambah produk</span>
            </a>
        </div>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Produk --}}
        <div class="overflow-x-auto bg-white shadow rounded-2xl">
            <table class="w-full text-sm text-left">
                <thead class="text-white bg-[#0f3150]">
                    <tr>
                        <th class="px-4 py-3 ">No</th>
                        <th class="px-4 py-3 ">Nama Produk</th>
                        <th class="px-4 py-3 ">Harga</th>
                        <th class="px-4 py-3 text-center ">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($produks as $index => $produk)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 ">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $produk->nama_produk }}
                            </td>

                            <td class="px-4 py-3">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </td>

                            <td class="flex justify-center px-6 py-4 space-x-2">
                                <a href="{{ route('admin.produk.edit', $produk->id) }}"
                                    class="text-yellow-400 hover:text-yellow-600">
                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                </a>

                                <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                Belum ada produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection
