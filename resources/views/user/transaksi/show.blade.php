<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi transisi memunculkan form */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-[#eef5fb] via-[#f7f9fc] to-[#dce8f3] flex items-center justify-center p-5">

    <div class="w-full max-w-lg bg-white/90 backdrop-blur-xl rounded-3xl shadow-[0_20px_80px_rgba(15,49,80,0.18)] overflow-hidden border border-white">

        <div class="bg-[#0f3150] px-8 py-8 text-center">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white rounded-2xl bg-white/10">
                💳
            </div>
            <h1 class="text-3xl font-bold text-white">
                Detail Transaksi
            </h1>
            <p class="mt-2 text-sm text-blue-100">
                ID #{{ $transaksi->id }}
            </p>
        </div>

        <div class="p-8">

            <div class="rounded-2xl bg-[#f8fbff] border border-[#d8e3ec] p-5 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500">Produk</span>
                    <span class="font-semibold text-[#0f3150]">
                        {{ $transaksi->produk->nama_produk ?? 'Paket Asesmen' }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Total Tagihan</span>
                    <span class="font-bold text-2xl text-[#0f3150]">
                        Rp {{ number_format($transaksi->amount, 0, ',', '.') }}
                    </span>
                </div>

                <hr>

                <div class="flex items-center justify-between">
                    <span class="text-gray-500">Pembayaran</span>
                    @if ($transaksi->status === 'PAID')
                        <span class="px-4 py-2 text-xs font-bold text-green-700 bg-green-100 rounded-full">
                            ✓ LUNAS
                        </span>
                    @else
                        <span class="px-4 py-2 text-xs font-bold text-yellow-700 bg-yellow-100 rounded-full">
                            MENUNGGU
                        </span>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-gray-500">Verifikasi</span>
                    @if ($transaksi->is_verified)
                        <span class="px-4 py-2 rounded-full text-xs font-bold bg-[#d7e6f3] text-[#0f3150]">
                            DISETUJUI
                        </span>
                    @else
                        <span class="px-4 py-2 text-xs font-bold text-red-700 bg-red-100 rounded-full">
                            BELUM
                        </span>
                    @endif
                </div>
            </div>

            @if (session('success'))
                <div class="p-4 mt-5 text-sm text-green-700 border border-green-200 rounded-2xl bg-green-50">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 mt-5 text-sm text-red-700 border border-red-200 rounded-2xl bg-red-50">
                    {{ session('error') }}
                </div>
            @endif


            @if ($transaksi->is_verified == 0)

                @if (empty($transaksi->bukti_pembayaran))

                    <div class="mt-8 space-y-5">

                        <div class="bg-[#eef5fb] border border-[#d8e3ec] rounded-2xl p-5 text-[#0f3150]">
                            <strong class="block mb-2 text-lg">Instruksi Pembayaran</strong>
                            <p class="text-sm mb-4 text-gray-600">Silakan lakukan transfer tepat sebesar <strong class="text-[#0f3150]">Rp {{ number_format($transaksi->amount, 0, ',', '.') }}</strong> ke rekening berikut:</p>

                            <div class="bg-white p-4 rounded-xl border border-blue-100 shadow-sm flex flex-col items-center justify-center text-center">
                                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Bank BPD DIY</span>
                                <span class="font-mono text-2xl font-bold text-[#0f3150] tracking-widest">001211049296</span>
                                <span class="text-sm text-gray-500 mt-2">a.n Chayadi Oktomy Noto Susanto</span>
                            </div>
                        </div>

                        <button id="btn-next" type="button" class="w-full py-4 rounded-2xl bg-gray-400 text-white font-semibold transition shadow-lg cursor-not-allowed" disabled>
                            Selanjutnya (Tunggu 5 Detik)
                        </button>

                        <div id="upload-section" style="display: none;" class="fade-in">
                            <form action="{{ route('transaksi.upload_bukti', $transaksi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf

                                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 text-sm text-[#0f3150]">
                                    Upload Struk / Bukti Bayar untuk proses verifikasi.
                                </div>

                                <input type="file" name="bukti_pembayaran" required accept="image/*"
                                    class="w-full border rounded-2xl p-4 file:bg-[#0f3150] file:text-white file:border-0 file:px-4 file:py-2 file:rounded-xl file:cursor-pointer cursor-pointer">

                                <button type="submit" class="w-full py-4 rounded-2xl bg-[#0f3150] hover:bg-[#17446d] text-white font-semibold transition shadow-lg">
                                    Kirim Bukti Pembayaran
                                </button>
                            </form>
                        </div>

                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let waktu = 5;
                            const btnNext = document.getElementById("btn-next");
                            const uploadSection = document.getElementById("upload-section");

                            const hitungMundur = setInterval(function() {
                                waktu--;
                                btnNext.innerText = "Selanjutnya (Tunggu " + waktu + " Detik)";

                                if (waktu <= 0) {
                                    clearInterval(hitungMundur);
                                    btnNext.innerText = "Upload Bukti Pembayaran";
                                    btnNext.removeAttribute("disabled");
                                    btnNext.classList.remove("bg-gray-400", "cursor-not-allowed");
                                    btnNext.classList.add("bg-[#0f3150]", "hover:bg-[#17446d]");
                                }
                            }, 1000);

                            btnNext.addEventListener("click", function() {
                                btnNext.style.display = "none";
                                uploadSection.style.display = "block";
                            });
                        });
                    </script>

                @else
                    <div class="mt-8 text-center border border-yellow-200 rounded-3xl bg-gradient-to-b from-yellow-50 to-white p-7">
                        <div class="mb-3 text-5xl animate-bounce">
                            🕒
                        </div>
                        <h3 class="font-bold text-lg text-[#0f3150]">
                            Sedang Ditinjau
                        </h3>
                        <p class="mt-2 text-sm text-gray-600">
                            Terima kasih, bukti transfer berhasil dikirim. Admin kami sedang melakukan pengecekan data.
                            Mohon muat ulang (refresh) halaman ini secara berkala untuk mengetahui status terbaru.
                        </p>

                        <div class="p-3 mt-4 text-left border border-red-200 bg-red-50 rounded-xl">
                            <div class="flex items-start space-x-2">
                                <span class="text-lg leading-none text-red-600">⚠️</span>
                                <div>
                                    <h4 class="text-xs font-bold tracking-wide text-red-800 uppercase">Penting: Jangan Tutup Halaman Ini</h4>
                                    <p class="text-[11px] mt-1 text-red-700 leading-snug">
                                        Mohon tetap berada di halaman ini hingga proses verifikasi selesai. Menutup halaman sebelum verifikasi disetujui dapat mengakibatkan hangusnya hak akses tes, dan Anda mungkin diharuskan melakukan pembayaran ulang.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <button onclick="window.location.reload()"
                            class="mt-6 w-full py-3 rounded-2xl border border-[#0f3150] text-[#0f3150] hover:bg-[#0f3150] hover:text-white transition">
                            Refresh Halaman
                        </button>
                    </div>
                @endif

            @else
                <div class="p-8 mt-8 text-center border border-green-200 rounded-3xl bg-gradient-to-b from-green-50 to-white">
                    <div class="text-5xl">
                        🎉
                    </div>
                    <h3 class="mt-4 text-2xl font-bold text-green-700">
                        Verifikasi Berhasil
                    </h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Pembayaran sudah tervalidasi. Anda dapat melanjutkan tes.
                    </p>
                    <a href="{{ route('transaksi.sukses') }}"
                        class="block mt-6 py-4 rounded-2xl bg-[#0f3150] hover:bg-[#17446d] text-white font-semibold transition shadow-lg">
                        Mulai Tes
                    </a>
                </div>
            @endif

        </div>
    </div>

</body>
</html>
