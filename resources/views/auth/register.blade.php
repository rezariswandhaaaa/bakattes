<x-guest-layout>
    <div class="max-w-md p-6 mx-auto bg-white rounded-3xl">
        <h2 class="mb-6 text-2xl font-bold text-center ">Daftar</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div class="relative mb-4">
                <input id="name" type="text" name="name" required placeholder="Nama Lengkap"
                    class="w-full px-3 pt-6 pb-2 placeholder-transparent border rounded-lg peer focus:ring focus:ring-indigo-300 focus:border-indigo-600" />

                <label for="name"
                    class="absolute px-1 text-sm text-gray-500 transition-all duration-200 bg-white pointer-events-none left-3 top-2 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:translate-y-0 peer-focus:text-sm peer-focus:text-indigo-600">
                    Nama Lengkap
                </label>
            </div>

            <!-- Email -->
            <div class="relative mb-4">
                <input id="email" type="email" name="email" required placeholder="Email"
                    class="w-full px-3 pt-6 pb-2 placeholder-transparent border rounded-lg peer focus:ring focus:ring-indigo-300 focus:border-indigo-600" />

                <label for="email"
                    class="absolute px-1 text-sm text-gray-500 transition-all duration-200 bg-white pointer-events-none left-3 top-2 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-indigo-600">
                    Email
                </label>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div class="relative mb-4">
                <input id="phone" type="text" name="phone" required placeholder="Nomor Telepon"
                    class="w-full px-3 pt-6 pb-2 placeholder-transparent border rounded-lg peer focus:ring focus:ring-indigo-300 focus:border-indigo-600" />

                <label for="phone"
                    class="absolute px-1 text-sm text-gray-500 transition-all duration-200 bg-white pointer-events-none left-3 top-2 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-indigo-600">
                    Nomor Telepon
                </label>
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative mb-4">
                <input id="password" type="password" name="password" required placeholder="Password"
                    class="w-full px-3 pt-6 pb-2 placeholder-transparent border rounded-lg peer focus:ring focus:ring-purple-300 focus:border-purple-600" />

                <label for="password"
                    class="absolute px-1 text-sm text-gray-500 transition-all duration-200 bg-white pointer-events-none left-3 top-2 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-purple-600">
                    Password
                </label>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Confirm Password -->
            <div class="relative mb-4">
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    placeholder="Konfirmasi Password"
                    class="w-full px-3 pt-6 pb-2 placeholder-transparent border rounded-lg peer focus:ring focus:ring-purple-300 focus:border-purple-600" />

                <label for="password_confirmation"
                    class="absolute px-1 text-sm text-gray-500 transition-all duration-200 bg-white pointer-events-none left-3 top-2 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-purple-600">
                    Konfirmasi Password
                </label>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white transition rounded-lg bg-gradient-to-r from-indigo-700 via-purple-600 to-indigo-800 hover:opacity-90">
                Daftar
            </button>

            <p class="mt-4 text-sm text-center text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-700 hover:underline">Masuk</a>
            </p>
        </form>
    </div>
</x-guest-layout>
