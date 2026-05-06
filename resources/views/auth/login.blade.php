<x-guest-layout>
    <div class="max-w-md p-6 mx-auto bg-white rounded-3xl">
        <h2 class="mb-6 text-2xl font-bold text-center">Masuk</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email -->
            <div class="relative mb-4">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email"
                    class="w-full px-3 pt-6 pb-2 placeholder-transparent border rounded-lg peer focus:ring focus:ring-indigo-200 focus:border-indigo-500" />

                <label for="email"
                    class="absolute px-1 text-sm text-gray-500 transition-all duration-200 bg-white pointer-events-none left-3 top-2 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:translate-y-0 peer-focus:text-sm peer-focus:text-indigo-600">
                    Email
                </label>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            <!-- password -->
            <div class="relative mb-4">
                <input id="password" type="password" name="password" required placeholder="Password"
                    class="w-full px-3 pt-6 pb-2 pr-10 placeholder-transparent border rounded-lg peer focus:ring focus:ring-purple-300 focus:border-purple-600" />

                <label for="password"
                    class="absolute px-1 text-sm text-gray-500 transition-all duration-200 bg-white pointer-events-none left-3 top-2 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:translate-y-0 peer-focus:text-sm peer-focus:text-purple-600">
                    Password
                </label>

                <!-- Eye icon -->
                <button type="button" onclick="togglePassword()"
                    class="absolute text-gray-500 -translate-y-1/2 right-3 top-1/2 hover:text-indigo-600">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                c4.478 0 8.268 2.943 9.542 7
                -1.274 4.057-5.064 7-9.542 7
                -4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>

                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>



            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">

                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Lupa
                    password?</a>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white transition rounded-lg bg-gradient-to-r from-indigo-700 via-purple-600 to-indigo-800 hover:opacity-90">
                Masuk
            </button>

            <p class="mt-4 text-sm text-center text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Daftar</a>
            </p>
        </form>
    </div>
</x-guest-layout>
