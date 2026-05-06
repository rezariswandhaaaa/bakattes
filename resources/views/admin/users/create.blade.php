@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-[#0f3150]">Tambah User 👤</h1>

    </div>

    <div class="max-w-2xl p-8 bg-white shadow-lg rounded-2xl">
        @if ($errors->any())
            <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-300 rounded-lg">
                <ul class="pl-5 space-y-1 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#173f67] focus:border-[#173f67]"
                    placeholder="Masukkan nama lengkap" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#173f67] focus:border-[#173f67]"
                    placeholder="Masukkan email" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#173f67] focus:border-[#173f67]"
                    placeholder="Masukkan nomor telepon" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Password</label>
                <input type="password" name="password"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#173f67] focus:border-[#173f67]"
                    placeholder="Masukkan password" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#173f67] focus:border-[#173f67]"
                    placeholder="Ulangi password" required>
            </div>

            <div class="flex items-center">
                <button type="submit"
                    class="px-6 py-2 font-semibold text-white transition duration-200 bg-[#0f3150] rounded-lg hover:bg-[#173f67]">
                    <i data-lucide="save" class="inline-block w-5 h-5 mr-2"></i>
                    Simpan User
                </button>
                <a href="{{ route('users.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
    
@endsection
