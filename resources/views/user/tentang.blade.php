<x-app-layout>
    <section class="pt-20">
        <div class="flex items-center justify-center w-full min-h-screen bg-center bg-cover"
            style="background-image: url('{{ asset('images/background.png') }}');">

            <div id="heroText" class="px-4 text-center transition-opacity duration-500" data-aos="zoom-in">
                <h1 class="mb-4 font-extrabold text-white text-8xl drop-shadow-lg">Tentang Kami</h1>
                <p class="text-xl text-white drop-shadow-md">Kami hadir untuk membantu Anda mengenali dan mengembangkan
                    potensi diri melalui asesmen yang terpercaya</p>

            </div>
        </div>
    </section>

    <section class="pt-32 pb-40" style="background-color: #0f3150;">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center md:flex-row">
                <div class="md:w-1/2">
                    <img src="{{ asset('images/lg.png') }}" alt="About Image" class="w-full">
                </div>
                <div class="mt-6 md:w-1/2 md:pl-12 md:mt-0">
                    <h2 class="mb-6 text-3xl font-bold text-white">Tentang</h2>
                    <p class="mb-6 text-lg leading-7 text-justify text-white">
                        Kami adalah platform asesmen digital yang berfokus pada pengembangan dan pemetaan potensi bakat
                        individu berbasis pendekatan CliftonStrengths.
                        Dengan memadukan kerangka psikologi dan teknologi modern, kami menyediakan hasil asesmen yang
                        mudah diakses, akurat, dan relevan untuk mendukung pengembangan diri, akademik, serta
                        perencanaan karier.
                        Sistem ini dirancang agar mudah digunakan, efisien, dan mampu memberikan wawasan potensi bakat
                        secara komprehensif bagi setiap pengguna.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 pt-42" style="background-color: white; color: #0f3150; text-align: center;">
        <div class="container px-4 mx-auto">
            <h2 class="mb-4 text-3xl font-bold">Hubungi Kami</h2>
            <p class="mx-auto mb-12 text-lg leading-relaxed" style="max-width: 600px;">
                Hubungi kami untuk informasi lebih lanjut, pertanyaan, atau permintaan khusus. Gunakan
                kontak kami untuk menghubungi kami secara langsung. Terima kasih atas minat dan
                kunjungan Anda!
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#"
                    style="background-color: #0f3150; color: white; padding: 14px 30px; border-radius: 9999px; font-weight: bold; text-decoration: none; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 32 32" fill="white">
                        <path
                            d="M16.04 2.01c-7.7 0-13.97 6.27-13.97 13.97 0 2.46.64 4.87 1.86 6.99L2 30l7.2-2.04c2.02 1.11 4.28 1.7 6.84 1.7 7.7 0 13.97-6.27 13.97-13.97s-6.27-13.97-13.97-13.97zm0 25.4c-2.16 0-4.29-.58-6.13-1.67l-.44-.26-4.27 1.2 1.14-4.2-.27-.43c-1.14-1.8-1.74-3.87-1.74-6.01 0-6.3 5.12-11.43 11.43-11.43 3.06 0 5.94 1.19 8.1 3.35s3.35 5.04 3.35 8.1c0 6.3-5.12 11.44-11.44 11.44zm6.1-8.43c-.33-.17-1.96-.96-2.26-1.07-.3-.1-.52-.17-.74.17s-.85 1.07-1.04 1.3c-.2.22-.38.25-.7.08-.33-.17-1.4-.52-2.66-1.66-1-.9-1.67-2.01-1.87-2.35-.2-.33-.02-.5.15-.66.16-.15.38-.4.57-.6.19-.22.25-.37.37-.6.12-.22.06-.5-.03-.66-.08-.17-.74-1.78-1.01-2.43-.27-.65-.55-.55-.74-.56h-.63c-.22 0-.57.08-.87.37s-1.15 1.12-1.15 2.73c0 1.61 1.17 3.17 1.34 3.39.17.22 2.3 3.52 5.58 4.94.78.34 1.38.55 1.85.7.78.25 1.5.22 2.06.13.63-.1 1.96-.8 2.24-1.57.27-.76.27-1.41.19-1.54-.08-.13-.3-.21-.63-.37z" />
                    </svg>
                    Whatsapp
                </a>

                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=bakattes75@gmail.com" target="_blank"
                    style="background-color: #0f3150; color: white; padding: 14px 30px; border-radius: 9999px; font-weight: bold; text-decoration: none; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="mr-2 feather feather-mail">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Email
                </a>
            </div>
        </div>
    </section>

    <footer class="py-6" style="background-color: #0f3150;">
        <div class="container px-4 mx-auto text-center">
            <p class="text-sm text-white">&copy; {{ date('Y') }} Designed By Reza</p>
        </div>
    </footer>

    <script>
        const heroText = document.getElementById('heroText');

        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            const fadeStart = 100;
            const fadeEnd = 200; // Berapa pixel mulai hilang
            const opacity = 1 - Math.min(Math.max((scrollY - fadeStart) / (fadeEnd - fadeStart), 0), 1);
            heroText.style.opacity = opacity;
        });
    </script>
</x-app-layout>
