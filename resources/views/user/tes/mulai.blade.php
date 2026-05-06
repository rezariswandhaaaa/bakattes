<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Bakat CliftonStrengths - Halaman {{ $pertanyaans->currentPage() }}</title>

    <link rel="icon" href="{{ asset('images/tab.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* Sticky header */
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: linear-gradient(to bottom, #f9fafb 0%, #f3f4f6 100%);
            padding-top: 1rem;
            padding-bottom: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        /* Custom styles for radio buttons with size variation */
        .radio-option input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            border: 4px solid #d1d5db;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            background: white;
        }

        .radio-option input[type="radio"]:hover {
            transform: scale(1.08);
        }

        .radio-option input[type="radio"]:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(145, 73, 212, 0.4);
        }

        .radio-option.somewhat-agree input[type="radio"]:focus,
        .radio-option.agree input[type="radio"]:focus,
        .radio-option.strongly-agree input[type="radio"]:focus {
            box-shadow: 0 0 0 3px rgba(22, 187, 132, 0.4);
        }

        .radio-option input[type="radio"]:checked::after {
            content: '';
            position: absolute;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Size variations: large-medium-small-small-medium-large */
        .radio-size-1 input[type="radio"] {
            width: 68px;
            height: 68px;
        }

        .radio-size-2 input[type="radio"] {
            width: 52px;
            height: 52px;
        }

        .radio-size-3 input[type="radio"] {
            width: 44px;
            height: 44px;
        }

        .radio-size-4 input[type="radio"] {
            width: 44px;
            height: 44px;
        }

        .radio-size-5 input[type="radio"] {
            width: 52px;
            height: 52px;
        }

        .radio-size-6 input[type="radio"] {
            width: 68px;
            height: 68px;
        }

        /* Purple colors for disagree (left side - values 1-3) */
        .radio-option.strongly-disagree input[type="radio"] {
            border-color: #a855f7;
        }

        .radio-option.strongly-disagree input[type="radio"]:checked {
            background: linear-gradient(180deg, #c084fc, #a855f7);
            border-color: #a855f7;
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }

        .radio-option.disagree input[type="radio"] {
            border-color: #a855f7;
        }

        .radio-option.disagree input[type="radio"]:checked {
            background: linear-gradient(180deg, #c084fc, #a855f7);
            border-color: #a855f7;
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }

        .radio-option.somewhat-disagree input[type="radio"] {
            border-color: #a855f7;
        }

        .radio-option.somewhat-disagree input[type="radio"]:checked {
            background: linear-gradient(180deg, #c084fc, #a855f7);
            border-color: #a855f7;
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }

        /* Green colors for agree (right side - values 4-6) */
        .radio-option.somewhat-agree input[type="radio"] {
            border-color: #10b981;
        }

        .radio-option.somewhat-agree input[type="radio"]:checked {
            background: linear-gradient(180deg, #34d399, #10b981);
            border-color: #10b981;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .radio-option.agree input[type="radio"] {
            border-color: #10b981;
        }

        .radio-option.agree input[type="radio"]:checked {
            background: linear-gradient(180deg, #34d399, #10b981);
            border-color: #10b981;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .radio-option.strongly-agree input[type="radio"] {
            border-color: #10b981;
        }

        .radio-option.strongly-agree input[type="radio"]:checked {
            background: linear-gradient(180deg, #34d399, #10b981);
            border-color: #10b981;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        /* Label bawah radio button */
        .radio-label {
            margin-top: 10px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #0f3150;
            text-align: center;
            min-height: 2.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            line-height: 1.2;
            padding: 0 4px;
        }

        .radio-option input[type="radio"]:checked~.radio-label {
            color: #0f3150;
        }

        /* Question card styling */
        .question-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .question-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sticky-header {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .radio-size-1 input[type="radio"] {
                width: 56px;
                height: 56px;
            }

            .radio-size-2 input[type="radio"] {
                width: 46px;
                height: 46px;
            }

            .radio-size-3 input[type="radio"] {
                width: 38px;
                height: 38px;
            }

            .radio-size-4 input[type="radio"] {
                width: 38px;
                height: 38px;
            }

            .radio-size-5 input[type="radio"] {
                width: 46px;
                height: 46px;
            }

            .radio-size-6 input[type="radio"] {
                width: 56px;
                height: 56px;
            }

            .radio-option input[type="radio"]:checked::after {
                width: 12px;
                height: 12px;
            }

            .radio-label {
                font-size: 0.65rem;
                min-height: 2.5rem;
                margin-top: 8px;
            }

            .question-card {
                padding: 1.25rem;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200">

    <div class="max-w-5xl px-4 py-2 mx-auto">

        <!-- Sticky Header -->
        <div class="sticky-header">
            <div class="border-b border-white shadow-sm bg-white/95 backdrop-blur-sm">
                <div class="px-6 py-4">
                    <!-- Title Section -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-1">
                            <h1 class="text-xl md:text-2xl font-bold text-[#0f3150] tracking-tight">
                                Tes Bakat<sup class="text-xs ml-0.5">®</sup>
                            </h1>
                            <p class="text-xs text-gray-500 mt-0.5">Assessment Test</p>
                        </div>
                        <div class="text-right">
                            <div id="progressText" class="text-2xl md:text-3xl font-bold text-[#0f3150]">
                                <span id="progressPercentage">{{ $progress }}</span>%
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="relative">
                        <div class="h-2 overflow-hidden bg-gray-100 rounded-full">
                            <div id="progressBar"
                                class="h-full bg-gradient-to-r from-[#0f3150] via-[#1a4d6f] to-[#0f3150] rounded-full transition-all duration-700 ease-out"
                                style="width: {{ $progress }}%">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-sm font-semibold text-right text-red-600 md:text-base">
                        Waktu tersisa: <span id="timer"></span>
                    </div>

                    <!-- Page Info -->
                    <div class="flex items-center justify-between mt-3 text-xs">
                        <span class="font-medium text-gray-500">
                            Halaman {{ $pertanyaans->currentPage() }}/{{ $pertanyaans->lastPage() }}
                        </span>
                        <p class="text-xs text-gray-500">
                            <span id="answeredCount">{{ count($savedAnswers) }}</span>/<span
                                id="totalQuestions">{{ $pertanyaans->total() }}</span> selesai
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error Message -->
        @if (session('error'))
            <div class="p-4 mb-6 border-l-4 border-red-500 rounded-r-lg bg-red-50">
                <div class="flex items-center">
                    <i data-lucide="alert-circle" class="w-5 h-5 mr-2 text-red-500"></i>
                    <span class="text-red-700">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Questions Form -->
        <form action="{{ route('user.tes.simpanSementara') }}" method="POST" id="testForm">
            @csrf

            <div class="mt-4 space-y-4">
                @foreach ($pertanyaans as $pertanyaan)
                    <input type="hidden" name="pertanyaan_id[]" value="{{ $pertanyaan->id }}">
                    <div class="pertanyaan-item question-card">
                        <!-- Question Number & Text -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3 space-x-3">
                                <span
                                    class="flex-shrink-0 w-10 h-10 bg-[#0f3150] text-white rounded-full flex items-center justify-center font-bold text-base shadow-md">
                                    {{ $pertanyaans->firstItem() + $loop->index }}
                                </span>
                                <p class="flex-1 text-base font-semibold leading-relaxed text-gray-800 md:text-lg">
                                    {{ $pertanyaan->pertanyaan }}
                                </p>
                            </div>
                        </div>

                        <!-- Answer Options - Horizontal Layout -->
                        <div class="ml-0 md:ml-13">

                            <!-- Radio Buttons -->
                            <div class="flex items-start justify-between px-1 md:px-4">
                                @php
                                    $options = [
                                        1 => [
                                            'label' => 'Sangat Tidak Setuju',
                                            'class' => 'strongly-disagree',
                                            'size' => 'radio-size-1',
                                        ],
                                        2 => [
                                            'label' => 'Tidak Setuju',
                                            'class' => 'disagree',
                                            'size' => 'radio-size-2',
                                        ],
                                        3 => [
                                            'label' => 'Agak Tidak Setuju',
                                            'class' => 'somewhat-disagree',
                                            'size' => 'radio-size-3',
                                        ],
                                        4 => [
                                            'label' => 'Agak Setuju',
                                            'class' => 'somewhat-agree',
                                            'size' => 'radio-size-4',
                                        ],
                                        5 => ['label' => 'Setuju', 'class' => 'agree', 'size' => 'radio-size-5'],
                                        6 => [
                                            'label' => 'Sangat Setuju',
                                            'class' => 'strongly-agree',
                                            'size' => 'radio-size-6',
                                        ],
                                    ];
                                @endphp

                                @foreach ($options as $nilai => $option)
                                    <label
                                        class="radio-option {{ $option['class'] }} {{ $option['size'] }} flex flex-col items-center cursor-pointer group">
                                        <input type="radio" name="jawaban[{{ $pertanyaan->id }}]"
                                            value="{{ $nilai }}"
                                            {{ isset($savedAnswers[$pertanyaan->id]) && $savedAnswers[$pertanyaan->id] == $nilai ? 'checked' : '' }}>
                                        <span class="radio-label">{{ $option['label'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Hidden fields for navigation -->
            <input type="hidden" name="current_page" value="{{ $pertanyaans->currentPage() }}">

            <!-- Navigation Buttons -->
            <div class="flex items-center justify-between gap-4 mt-6 mb-4">
                <!-- Previous Button -->
                @if (!$pertanyaans->onFirstPage())
                    <button type="submit" name="previous_page_url" value="{{ $pertanyaans->previousPageUrl() }}"
                        class="inline-flex items-center px-5 py-2.5 font-semibold text-gray-700 transition-all duration-200 bg-white border-2 border-gray-300 shadow-sm hover:bg-gray-50 hover:border-gray-400 rounded-xl hover:shadow-md">
                        <i data-lucide="chevron-left" class="w-5 h-5 mr-2"></i>
                        <span>Sebelumnya</span>
                    </button>
                @else
                    <div></div>
                @endif

                <!-- Page Info -->
                <div class="hidden text-center md:block">
                    <span class="px-4 py-2 text-sm font-medium text-gray-600 bg-white rounded-lg shadow-sm">
                        Pertanyaan {{ $pertanyaans->firstItem() }}-{{ $pertanyaans->lastItem() }}
                    </span>
                </div>

                <!-- Next / Submit Button -->
                @if ($pertanyaans->hasMorePages())
                    <button type="submit" name="next_page_url" value="{{ $pertanyaans->nextPageUrl() }}"
                        class="inline-flex items-center px-5 py-2.5 bg-[#0f3150] hover:bg-[#173f67] text-white rounded-xl font-semibold transition-all duration-200 shadow-md hover:shadow-lg">
                        <span>Selanjutnya</span>
                        <i data-lucide="chevron-right" class="w-5 h-5 ml-2"></i>
                    </button>
                @else
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2.5 font-bold text-white transition-all duration-200 shadow-md bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 rounded-xl hover:shadow-lg">
                        <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                        <span>Selesai & Simpan</span>
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay"
        class="fixed inset-0 z-[9999] hidden items-center justify-center bg-white/80 backdrop-blur-sm">
        <div class="flex flex-col items-center space-y-4">
            <svg class="w-12 h-12 animate-spin text-[#0f3150]" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                </path>
            </svg>

            <p class="text-sm font-semibold text-gray-700">
                Sedang memproses jawaban Anda...
            </p>

            <p class="text-xs text-gray-500">
                Mohon jangan menutup halaman ini
            </p>
        </div>
    </div>


    <script>
        lucide.createIcons();

        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const id = this.name.match(/\d+/)[0];
                const nilai = this.value;

                fetch("{{ route('user.tes.simpanAjax') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            pertanyaan_id: id,
                            nilai: nilai
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Update progress bar dengan animasi smooth
                            const progressBar = document.getElementById("progressBar");
                            const progressPercentage = document.getElementById("progressPercentage");
                            const answeredCount = document.getElementById("answeredCount");

                            progressBar.style.width = data.progress + "%";
                            progressPercentage.innerText = data.progress;
                            answeredCount.innerText = data.total_dijawab;

                            // Tambahkan efek visual saat progress update
                            progressBar.classList.add('animate-pulse');
                            setTimeout(() => {
                                progressBar.classList.remove('animate-pulse');
                            }, 500);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });


        // Form validation saat submit Next / Selesai
        document.getElementById('testForm').addEventListener('submit', function(e) {
            const submitter = e.submitter;
            if (submitter && submitter.name === 'previous_page_url') return true;

            const questions = document.querySelectorAll('.pertanyaan-item');
            let allAnswered = true;
            let firstUnanswered = null;

            questions.forEach(function(div) {
                const radios = div.querySelectorAll('input[type="radio"]');
                const answered = Array.from(radios).some(r => r.checked);
                if (!answered) {
                    allAnswered = false;
                    if (!firstUnanswered) firstUnanswered = div;
                    div.classList.add('ring-2', 'ring-red-300', 'rounded-lg', 'p-4', 'bg-red-50');
                } else {
                    div.classList.remove('ring-2', 'ring-red-300', 'rounded-lg', 'p-4', 'bg-red-50');
                }
            });

            if (!allAnswered) {
                e.preventDefault();
                alert('⚠️ Silakan jawab semua pertanyaan di halaman ini sebelum melanjutkan.');
                if (firstUnanswered) firstUnanswered.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });


        // Timer 90 menit
        let remainingSeconds = {{ $sisaWaktu }}; // harus integer

        function formatTime(seconds) {
            const m = Math.floor(seconds / 60);
            const s = seconds % 60;
            return `${String(m).padStart(2,'0')}:${String(s).padStart(2,'0')}`;
        }

        const timerEl = document.getElementById('timer');

        const timerInterval = setInterval(() => {
            if (remainingSeconds <= 0) {
                clearInterval(timerInterval);
                alert('⏰ Waktu tes telah habis. Jawaban akan disimpan otomatis.');
                document.getElementById('testForm').submit();
                return;
            }

            timerEl.innerText = formatTime(remainingSeconds);
            remainingSeconds--;
        }, 1000);

        const form = document.getElementById('testForm');
        const loadingOverlay = document.getElementById('loadingOverlay');

        form.addEventListener('submit', function(e) {
            const submitter = e.submitter;

            /**
             * TAMPILKAN LOADING HANYA JIKA:
             * - tombol submit TIDAK punya name
             * - artinya tombol "Selesai & Simpan"
             */
            if (submitter && submitter.name) {
                // Ini berarti Previous atau Next
                return;
            }

            // Validasi ulang (aman kalau validasi sebelumnya sudah lolos)
            const questions = document.querySelectorAll('.pertanyaan-item');
            const allAnswered = Array.from(questions).every(div =>
                Array.from(div.querySelectorAll('input[type="radio"]'))
                .some(r => r.checked)
            );

            if (!allAnswered) {
                return;
            }

            // Kunci semua tombol agar tidak double submit
            document.querySelectorAll('button[type="submit"]').forEach(btn => {
                btn.disabled = true;
                btn.classList.add('opacity-70', 'cursor-not-allowed');
            });

            // Tampilkan loading
            setTimeout(() => {
                loadingOverlay.classList.remove('hidden');
                loadingOverlay.classList.add('flex');
            }, 50);
        });
    </script>

</body>

</html>
