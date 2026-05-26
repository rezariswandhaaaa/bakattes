@extends('layouts.admin')

@section('content')
    <div class="px-6 py-8">

        <div class="mb-8">
            <h1 class="text-4xl font-bold text-[#0f3150] mb-2">Kelola Transaksi</h1>
        </div>

        @if (session('success'))
            <div class="p-4 mb-6 text-green-700 border border-green-200 rounded-2xl bg-green-50">

                {{ session('success') }}

            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-2xl">

            <table class="w-full text-sm text-left">

                <thead class="text-white uppercase  bg-[#0f3150]">

                    <tr>

                        <th class="px-4 py-3">
                            TRANSAKSI
                        </th>

                        <th class="px-4 py-3">
                            USER
                        </th>

                        <th class="px-4 py-3">
                            PRODUK
                        </th>

                        <th class="px-4 py-3">
                            STATUS
                        </th>

                        <th class="px-4 py-3">
                            BUKTI
                        </th>

                        <th class="px-4 py-3">
                            AKSI
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($transaksis as $trx)
                        <tr class="border-b hover:bg-[#fafcff] transition">

                            <!-- TRANSAKSI -->
                            <td class="px-8 py-6">

                                <div class="font-bold text-[#0f3150]">

                                    #{{ $trx->id }}

                                </div>

                                <div class="mt-1 text-xs text-gray-400">

                                    {{ $trx->created_at->format('d M Y • H:i') }}

                                </div>

                            </td>


                            <!-- USER -->
                            <td class="px-6 py-6">

                                <div class="font-medium text-gray-700">

                                    {{ $trx->user->name ?? '-' }}

                                </div>

                            </td>


                            <!-- PRODUK -->
                            <td class="px-6 py-6 max-w-[280px]">

                                <div class="text-sm font-semibold text-gray-800 truncate">

                                    {{ $trx->produk->nama_produk ?? '-' }}

                                </div>

                                <div class="mt-2 font-bold text-[#0f3150]">

                                    Rp {{ number_format($trx->amount, 0, ',', '.') }}

                                </div>

                            </td>


                            <!-- STATUS -->
                            <td class="px-6 py-6 text-center">

                                @if ($trx->status === 'PAID')
                                    <span class="px-4 py-2 text-xs font-semibold text-green-700 bg-green-100 rounded-full">

                                        PAID

                                    </span>
                                @elseif($trx->status === 'PENDING')
                                    <span
                                        class="px-4 py-2 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">

                                        PENDING

                                    </span>
                                @else
                                    <span class="px-4 py-2 text-xs font-semibold text-red-700 bg-red-100 rounded-full">

                                        {{ $trx->status }}

                                    </span>
                                @endif

                            </td>


                            <!-- BUKTI -->
                            <td class="px-6 py-6 text-center">

                                @if ($trx->bukti_pembayaran)
                                    <a href="{{ route('lihat.bukti', $trx->bukti_pembayaran) }}" target="_blank"
                                        class="rounded-xl border px-4 py-2 text-xs font-medium text-[#0f3150] hover:bg-[#eef5fb]">

                                        Lihat

                                    </a>
                                @else
                                    <span class="text-xs text-gray-400">

                                        Belum Upload

                                    </span>
                                @endif

                            </td>


                            <!-- AKSI -->
                            <td class="px-8 py-6 text-center">

                                @if ($trx->is_verified)
                                    <span class="rounded-xl bg-[#eef5fb] px-4 py-2 text-xs font-semibold text-[#0f3150]">

                                        Terverifikasi

                                    </span>
                                @elseif($trx->status === 'PAID' && $trx->bukti_pembayaran)
                                    <form action="{{ route('admin.transaksi.setuju', $trx->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button onclick="return confirm('Setujui transaksi?')"
                                            class="rounded-2xl bg-[#0f3150] px-5 py-3 text-xs font-semibold text-white hover:scale-[1.02] transition">

                                            Setujui

                                        </button>

                                    </form>
                                @else
                                    <span class="text-xs text-gray-400">

                                        Menunggu User

                                    </span>
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="py-20 text-center">

                                <div class="text-[#0f3150] text-xl font-bold">

                                    Belum Ada Transaksi

                                </div>

                                <div class="mt-2 text-gray-400">

                                    Data transaksi akan muncul di sini

                                </div>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>



    </div>
@endsection
