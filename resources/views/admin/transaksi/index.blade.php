@extends('layouts.admin')

@section('content')
    <div class="container px-4 py-6 mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold tracking-tight text-gray-800">Kelola Transaksi Manajemen</h1>
        </div>

        @if (session('success'))
            <div class="px-4 py-3 mb-4 text-sm font-medium text-green-700 border border-green-200 bg-green-50 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-2xl">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="text-xs font-semibold tracking-wider text-gray-500 uppercase bg-gray-50">
                        <tr>
                            <th class="py-3.5 px-6 text-left">ID / Tanggal</th>
                            <th class="py-3.5 px-6 text-left">Nama User</th>
                            <th class="py-3.5 px-6 text-left">Produk / Nominal</th>
                            <th class="py-3.5 px-6 text-center">Status Xendit</th>
                            <th class="py-3.5 px-6 text-center">Bukti Transfer</th>
                            <th class="py-3.5 px-6 text-center">Aksi Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600 bg-white divide-y divide-gray-100">
                        @forelse($transaksis as $trx)
                            <tr class="transition hover:bg-gray-50/70">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-bold text-gray-900">#{{ $trx->id }}</span>
                                    <div class="text-xs text-gray-400 mt-0.5">{{ $trx->created_at->format('d M Y, H:i') }}
                                        WIB</div>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $trx->user->name ?? 'User Tidak Ditemukan' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ $trx->produk->nama_produk ?? '-' }}</div>
                                    <div class="text-xs font-bold text-indigo-600 mt-0.5">Rp
                                        {{ number_format($trx->amount, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if ($trx->status === 'PAID')
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700 border border-green-200">PAID</span>
                                    @elseif($trx->status === 'PENDING')
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-50 text-yellow-700 border border-yellow-200">PENDING</span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-700 border border-red-200">{{ $trx->status }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if ($trx->bukti_pembayaran)
                                        <a href="{{ asset('storage/bukti_pembayaran/' . $trx->bukti_pembayaran) }}"
                                            target="_blank"
                                            class="inline-flex items-center px-3 py-1 text-xs font-bold text-blue-600 transition border border-blue-100 rounded-lg hover:text-blue-800 bg-blue-50 hover:bg-blue-100">
                                            👁️ Lihat Bukti
                                        </a>
                                    @else
                                        <span class="text-xs italic text-gray-400">Belum Diunggah</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if ($trx->is_verified == 1)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                            ✓ Terverifikasi
                                        </span>
                                    @else
                                        @if ($trx->status === 'PAID' && $trx->bukti_pembayaran)
                                            <form action="{{ route('admin.transaksi.setuju', $trx->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin data bukti transfer ini valid dan ingin menyetujui transaksi ini?')"
                                                    class="bg-indigo-600 text-white py-1.5 px-4 rounded-xl text-xs font-bold hover:bg-indigo-700 transition shadow-sm">
                                                    Setujui Akses
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs italic text-gray-400 border border-gray-200 rounded-md bg-gray-50">Menunggu
                                                Aksi User</span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-10 text-sm italic text-center text-gray-400">
                                    Belum ada riwayat rekaman transaksi data masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
