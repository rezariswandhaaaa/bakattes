@extends('layouts.admin')

@section('content')
    <div class="container px-4 py-6 mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Voucher Diskon</h1>
            <button onclick="openModal()"
                class="flex items-center justify-center px-4 py-2 space-x-2 font-semibold text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-sm">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Tambah Voucher</span>
            </button>
        </div>

        <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-2xl">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="text-white uppercase  bg-[#0f3150]">
                        <tr>
                            <th class="px-6 py-3 text-left">Kode Voucher</th>
                            <th class="px-6 py-3 text-center">Tipe Diskon</th>
                            <th class="px-6 py-3 text-center">Nominal / %</th>
                            <th class="px-6 py-3 text-center">Sisa Kuota</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600 bg-white divide-y divide-gray-100">
                        @forelse($vouchers as $v)
                            <tr class="transition hover:bg-gray-50">
                                <td class="px-6 py-3 font-bold text-gray-900">{{ $v->kode_voucher }}</td>
                                <td class="px-6 py-3 text-center">
                                    <span
                                        class="px-2 py-1 text-xs font-bold text-blue-700 bg-blue-100 rounded">{{ $v->tipe }}</span>
                                </td>
                                <td class="px-6 py-3 font-bold text-center text-green-600">
                                    {{ $v->tipe === 'NOMINAL' ? 'Rp ' . number_format($v->potongan, 0, ',', '.') : $v->potongan . '%' }}
                                </td>
                                <td
                                    class="px-6 py-3 font-medium text-center {{ $v->kuota <= 0 ? 'text-red-500' : 'text-gray-800' }}">
                                    {{ $v->kuota }} x
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <form action="{{ route('admin.voucher.destroy', $v->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus voucher ini?')"
                                            class="p-1.5 text-red-500 transition bg-red-50 rounded-lg hover:text-red-700 hover:bg-red-100">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-10 italic text-center text-gray-400">Belum ada voucher yang
                                    dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div id="voucherModal"
            class="fixed inset-0 z-50 flex items-center justify-center {{ $errors->any() ? '' : 'hidden' }} bg-black/50 backdrop-blur-sm transition-opacity">
            <div class="relative w-full max-w-2xl p-8 mx-4 bg-white shadow-2xl rounded-2xl">

                <button onclick="closeModal()" class="absolute text-gray-400 top-4 right-4 hover:text-gray-600">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>

                <h2 class="mb-6 text-2xl font-bold text-gray-800 justify-center">Buat Voucher Baru</h2>

                @if ($errors->any())
                    <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded-lg">
                        <ul class="pl-4 list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.voucher.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block mb-1 text-sm font-semibold text-gray-700">Kode Voucher <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="kode_voucher" required placeholder="Cth: DISKONMERDEKA"
                            class="w-full px-4 py-2 uppercase border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('kode_voucher') }}">
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Tipe Diskon <span
                                    class="text-red-500">*</span></label>
                            <select name="tipe"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="NOMINAL" {{ old('tipe') == 'NOMINAL' ? 'selected' : '' }}>Potongan Harga
                                    (Rp)</option>
                                <option value="PERSEN" {{ old('tipe') == 'PERSEN' ? 'selected' : '' }}>Persentase (%)
                                </option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Besar Potongan <span
                                    class="text-red-500">*</span></label>
                            <input type="number" name="potongan" required placeholder="Cth: 50000 atau 50"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('potongan') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Batas Kuota Pemakaian <span
                                    class="text-red-500">*</span></label>
                            <input type="number" name="kuota" required placeholder="Cth: 100"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('kuota', 10) }}">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Tanggal Berakhir
                                (Opsional)</label>
                            <input type="datetime-local" name="expired_at"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('expired_at') }}">
                        </div>
                    </div>

                    <div class="pt-4 mt-6 border-t border-gray-100 flex justify-end space-x-3">
                        <button type="button" onclick="closeModal()"
                            class="px-5 py-2.5 text-gray-700 bg-gray-100 rounded-xl font-semibold hover:bg-gray-200 transition">Batal</button>
                        <button type="submit"
                            class="px-5 py-2.5 text-white bg-indigo-600 rounded-xl font-bold hover:bg-indigo-700 transition">Simpan
                            Voucher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('voucherModal').classList.remove('hidden');
            // Refresh icon silang lucide
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }

        function closeModal() {
            document.getElementById('voucherModal').classList.add('hidden');
        }
    </script>
@endsection
