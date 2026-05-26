@extends('layouts.admin')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-[#eef5fb] via-white to-[#dce8f3] p-6">

        <!-- HEADER -->
        <div class="mb-8 rounded-3xl bg-[#0f3150] shadow-[0_20px_60px_rgba(15,49,80,.25)] overflow-hidden">

            <div class="px-8 py-8">

                <div class="flex flex-col gap-4 md:flex-row md:justify-between">

                    <div>

                        <p class="mb-2 text-sm text-blue-200">
                            Dashboard Admin
                        </p>

                        <h1 class="text-4xl font-bold text-white">
                            Kelola Transaksi
                        </h1>

                        <p class="mt-2 text-blue-100">
                            Verifikasi pembayaran dan aktivasi akses tes pengguna
                        </p>

                    </div>

                    <div class="bg-white/10 backdrop-blur rounded-2xl px-6 py-5 text-center min-w-[180px]">

                        <p class="text-xs text-blue-200 uppercase">
                            Total Data
                        </p>

                        <div class="mt-1 text-3xl font-bold text-white">
                            {{ $transaksis->count() }}
                        </div>

                        <p class="text-xs text-blue-100">
                            Transaksi
                        </p>

                    </div>

                </div>

            </div>

        </div>


        @if (session('success'))
            <div class="p-4 mb-6 text-green-700 border border-green-200 shadow-sm rounded-2xl bg-green-50">

                ✓ {{ session('success') }}

            </div>
        @endif


        <!-- TABLE CARD -->
        <div
            class="overflow-hidden rounded-3xl bg-white/90 backdrop-blur shadow-[0_10px_50px_rgba(15,49,80,.08)] border border-white">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead>

                        <tr class="bg-[#0f3150] text-white text-xs uppercase tracking-wider">

                            <th class="py-5 text-left px-7">
                                Transaksi
                            </th>

                            <th class="py-5 text-left px-7">
                                User
                            </th>

                            <th class="py-5 text-left px-7">
                                Produk
                            </th>

                            <th class="py-5 text-center px-7">
                                Status
                            </th>

                            <th class="py-5 text-center px-7">
                                Bukti
                            </th>

                            <th class="py-5 text-center px-7">
                                Verifikasi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($transaksis as $trx)
                            <tr class="border-b hover:bg-[#f8fbff] transition duration-300">

                                <!-- ID -->
                                <td class="py-6 px-7">

                                    <div class="font-bold text-[#0f3150]">

                                        #{{ $trx->id }}

                                    </div>

                                    <div class="mt-1 text-xs text-gray-400">

                                        {{ $trx->created_at->format('d M Y • H:i') }}

                                    </div>

                                </td>


                                <!-- USER -->
                                <td class="py-6 px-7">

                                    <div class="font-semibold text-gray-800">

                                        {{ $trx->user->name ?? 'User Tidak Ditemukan' }}

                                    </div>

                                </td>


                                <!-- PRODUK -->
                                <td class="py-6 px-7">

                                    <div class="font-semibold text-gray-800">

                                        {{ $trx->produk->nama_produk ?? '-' }}

                                    </div>

                                    <div class="text-lg font-bold text-[#0f3150] mt-1">

                                        Rp {{ number_format($trx->amount, 0, ',', '.') }}

                                    </div>

                                </td>


                                <!-- STATUS -->
                                <td class="py-6 text-center px-7">

                                    @if ($trx->status === 'PAID')
                                        <span
                                            class="inline-flex px-4 py-2 text-xs font-bold text-green-700 bg-green-100 rounded-full">

                                            ✓ PAID

                                        </span>
                                    @elseif($trx->status === 'PENDING')
                                        <span
                                            class="inline-flex px-4 py-2 text-xs font-bold text-yellow-700 bg-yellow-100 rounded-full">

                                            ⏳ PENDING

                                        </span>
                                    @else
                                        <span
                                            class="inline-flex px-4 py-2 text-xs font-bold text-red-700 bg-red-100 rounded-full">

                                            {{ $trx->status }}

                                        </span>
                                    @endif

                                </td>


                                <!-- BUKTI -->
                                <td class="py-6 text-center px-7">

                                    @if ($trx->bukti_pembayaran)
                                        <a href="{{ route('lihat.bukti', $trx->bukti_pembayaran) }}" target="_blank"
                                            class="inline-flex items-center gap-2 rounded-2xl border border-[#0f3150]/20 bg-[#eef5fb] px-4 py-2 text-xs font-semibold text-[#0f3150] hover:bg-[#dce8f3]">

                                            👁️ Lihat

                                        </a>
                                    @else
                                        <span class="text-xs italic text-gray-400">

                                            Belum Upload

                                        </span>
                                    @endif

                                </td>


                                <!-- AKSI -->
                                <td class="py-6 text-center px-7">

                                    @if ($trx->is_verified)
                                        <span
                                            class="inline-flex rounded-2xl bg-[#dbe9f4] px-4 py-2 text-xs font-bold text-[#0f3150]">

                                            ✓ Terverifikasi

                                        </span>
                                    @else
                                        @if ($trx->status === 'PAID' && $trx->bukti_pembayaran)
                                            <form action="{{ route('admin.transaksi.setuju', $trx->id) }}" method="POST">

                                                @csrf
                                                @method('PATCH')

                                                <button onclick="return confirm('Setujui transaksi ini?')"
                                                    class="rounded-2xl bg-[#0f3150] px-5 py-3 text-xs font-bold text-white shadow-lg hover:bg-[#17446d] transition">

                                                    Setujui Akses

                                                </button>

                                            </form>
                                        @else
                                            <span class="px-4 py-2 text-xs text-gray-500 bg-gray-100 rounded-xl">

                                                Menunggu User

                                            </span>
                                        @endif
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6">

                                    <div class="py-24 text-center">

                                        <div class="mb-4 text-6xl">
                                            📭
                                        </div>

                                        <h3 class="text-xl font-bold text-[#0f3150]">

                                            Belum Ada Transaksi

                                        </h3>

                                        <p class="mt-2 text-gray-500">

                                            Data transaksi akan muncul di sini.

                                        </p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
