<div class="overflow-hidden bg-white shadow rounded-2xl">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="text-white uppercase bg-[#0f3150]">
            <tr>
                <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">No</th>
                <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Nama</th>
                <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Email</th>
                <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Nomor Telepon
                </th>
                <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Role</th>
                <th class="px-6 py-3 text-sm font-semibold tracking-wider text-center uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($users as $index => $user)
                <tr class="transition duration-150 hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-medium">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->phone ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span
                            class="px-3 py-1 text-xs font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="flex justify-center px-6 py-4 space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-400 hover:text-yellow-600">
                            <i data-lucide="edit" class="w-5 h-5"></i>
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
                    <td colspan="6" class="py-6 text-center text-gray-500">Belum ada data user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


