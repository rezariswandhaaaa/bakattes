@extends('layouts.admin')

@section('content')
    <div class="px-6 py-8">

        <div class="flex items-center justify-between mb-8 ">
            <h1 class="text-4xl font-bold text-[#0f3150] mb-2">Kelola Transaksi</h1>

            <button onclick="openDeleteModal()" class="flex items-center px-4 py-2.5 text-sm font-semibold text-white transition bg-red-600 rounded-xl hover:bg-red-700 shadow-sm hover:shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Hapus Data Bulanan
            </button>
        </div>

        @if (session('success'))
            <div class="p-4 mb-6 text-green-700 border border-green-200 rounded-2xl bg-green-50">

                {{ session('success') }}

            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-6 text-red-700 border border-red-200 rounded-2xl bg-red-50">
                {{ session('error') }}
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

                                    #{{ $loop->iteration }}

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
                                @elseif($trx->bukti_pembayaran)
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

        <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center hidden transition-opacity bg-black/50 backdrop-blur-sm">
            <div class="w-full max-w-md p-8 bg-white shadow-xl rounded-2xl">
                <h2 class="mb-2 text-2xl font-bold text-gray-800">Hapus Transaksi</h2>
                <p class="mb-6 text-sm text-gray-500">Pilih bulan dan tahun transaksi yang ingin dihapus secara permanen dari sistem.</p>

                <form action="{{ route('admin.transaksi.deleteBulanan') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Pilih Bulan & Tahun <span class="text-red-500">*</span></label>
                        <!-- Input type="month" akan menghasilkan format YYYY-MM -->
                        <input type="month" name="bulan_tahun" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#0f3150] focus:border-[#0f3150] outline-none">
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" onclick="closeDeleteModal()" class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition">Batal</button>
                        <button type="submit" onclick="return confirm('Tindakan ini tidak bisa dibatalkan! Yakin ingin menghapus semua data pada bulan ini?')" class="px-5 py-2.5 text-sm font-bold text-white bg-red-600 rounded-xl hover:bg-red-700 transition">Ya, Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');

        }
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');

        }
    </script>
@endsection
