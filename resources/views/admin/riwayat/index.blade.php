@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-[#0f3150] mb-2">Riwayat Tes User</h1>
    </div>

    @if (session('error'))
        <div
            class="flex items-center p-4 mb-6 text-sm text-red-700 bg-red-100 border border-red-200 rounded-xl animate-pulse">
            <i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <div class="overflow-hidden bg-white border border-gray-100 shadow-md rounded-2xl">
        <div class="flex items-center justify-between p-6 border-b border-gray-50 bg-[#173f67]">
            <div class="flex items-center space-x-3">

                <h3 class="text-lg font-bold text-white">Database Hasil Tes</h3>
            </div>

        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase w-[50px]">No</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Nama Pengguna</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Nomor Telepon</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase"> Produk</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Waktu Selesai</th>
                        <th class="px-6 py-4 text-xs font-semibold text-center text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($riwayats as $index => $riwayat)
                        <tr class="transition-colors hover:bg-gray-50/50 group">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ ($riwayats->currentPage() - 1) * $riwayats->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-bold text-gray-900 transition-colors group-hover:text-blue-600">
                                    {{ $riwayat->user->name ?? 'User Tidak Ditemukan' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-lucide="phone" class="w-4 h-4 mr-2 text-green-500"></i>
                                    {{ $riwayat->user->phone ?? ($riwayat->user->nomor_telepon ?? '-') }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold text-indigo-600">
                                    {{ $riwayat->transaksi->produk->nama_produk ?? 'Produk Tidak Diketahui' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-lucide="calendar-check" class="w-4 h-4 mr-2 text-blue-400"></i>
                                    {{ $riwayat->created_at->format('d M Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('riwayat.download', $riwayat->id) }}"
                                    class="inline-flex items-center px-6 py-2 text-xs font-bold text-white transition-all bg-blue-600 rounded-xl hover:bg-blue-700 hover:shadow-lg active:scale-95">
                                    <i data-lucide="file-down" class="w-4 h-4 mr-2"></i>
                                    Download PDF
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i data-lucide="folder-open" class="w-12 h-12 mb-3 text-gray-200"></i>
                                    <p class="italic font-medium text-gray-400">Belum ada riwayat tes yang masuk.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-6 mt-4">
                {{ $riwayats->links() }}
            </div>
        </div>
    </div>
@endsection
