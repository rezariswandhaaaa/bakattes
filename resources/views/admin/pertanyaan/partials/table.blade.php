<div class="overflow-x-auto bg-white shadow-md rounded-2xl">
    <table class="min-w-full text-left border-collapse">
        <thead class="text-white uppercase bg-[#0f3150]">
            <tr>
                <th class="px-4 py-3 font-semibold border-b border-[#173f67]">No</th>
                <th class="px-4 py-3 font-semibold border-b border-[#173f67]">Pertanyaan</th>
                <th class="px-4 py-3 font-semibold border-b border-[#173f67]">Bakat</th>
                <th class="px-4 py-3 font-semibold text-center border-b border-[#173f67]">Aksi</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @forelse ($pertanyaans as $index => $pertanyaan)
                <tr class="transition-colors duration-200 hover:bg-gray-100">
                    <td class="px-4 py-2 border-b border-gray-200">{{ $pertanyaans->firstItem() + $index }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-200">{{ $pertanyaan->pertanyaan }}</td>
                    <td class="px-4 py-2 border-b border-gray-200">
                        {{ $pertanyaan->bakat->nama_bakat ?? '-' }}</td>
                    <td class="px-6 py-4 text-center border-b border-gray-200">
                        <div class="flex items-center justify-center space-x-3">
                            <a href="{{ route('pertanyaan.edit', $pertanyaan->id) }}"
                                class="p-2 text-yellow-500 transition-colors duration-200 rounded hover:bg-yellow-100">
                                <i data-lucide="pencil" class="w-5 h-5"></i>
                            </a>
                            <form action="{{ route('pertanyaan.destroy', $pertanyaan->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 text-red-600 transition-colors duration-200 rounded hover:bg-red-100">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-500">Belum ada pertanyaan tes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
