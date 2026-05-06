<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Tes Bakat</title>
    <link rel="icon" href="{{ asset('images/tab.jpg') }}" type="image/jpg">

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
            line-height: 1.0;
            font-size: 12pt;

        }

        h1 {
            color: black;
            font-size: 32pt;
            text-align: center;
            padding-top: 1pt;
        }

        table {
            width: 85%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000000;
        }

        th,
        td {
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #8aabd6;
            font-size: 10pt;
        }

        /* ✅ Atur lebar kolom untuk tabel urutan bakat */
        .table-bakat th:nth-child(1),
        .table-bakat td:nth-child(1),
        .table-bakat th:nth-child(3),
        .table-bakat td:nth-child(3) {
            width: 5%;
            /* Kolom No lebih sempit */
        }

        .table-bakat th:nth-child(2),
        .table-bakat td:nth-child(2),
        .table-bakat th:nth-child(4),
        .table-bakat td:nth-child(4) {
            width: 35%;
            /* Kolom Nama Bakat */

        }

        .table-bakat td.nama-bakat {
            text-align: left;
        }

        .matrix-table {
            width: 90%;
            margin: 0 auto 30px auto;
            border-collapse: collapse;
            table-layout: fixed;
            /* 🔑 kunci lebar kolom */
            font-size: 12px;
        }


        .dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            display: inline-block;
        }

        .red {
            background: red;
        }

        .yellow {
            background: gold;
        }

        .white {
            background: white;
            border: 1px solid #000;
        }

        .gray {
            background: gray;
        }

        .black {
            background: black;
        }


        /* ✅ Atur lebar kolom untuk tabel potensi bakat */
        .table-potensi th:nth-child(1),
        .table-potensi td:nth-child(1) {
            width: 5%;
            /* Kolom No */
        }

        .table-potensi th:nth-child(2),
        .table-potensi td:nth-child(2) {
            width: 35%;
            /* Kolom Potensi Bakat */
        }

        .table-potensi td:nth-child(3) {
            width: 62%;
            /* Kolom Penjelasan */
            text-align: left;
            /* ✅ Rata kiri untuk penjelasan */
            padding: 8px;
        }

        .section-title {
            background: #0f3150;
            color: white;
            font-size: 16pt;
            font-weight: normal;
            width: 90%;
            text-align: center;
            margin: 0 auto;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- COVER PAGE -->
    <div class="cover-page" style="page-break-after: always;">

        <!-- Konten Tengah -->
        <div style="text-align: center; margin-top: 180px;">
            <img src="{{ public_path('images/brain.png') }}" style="width: 500px;">
            <h2>REPORT</h2>
            <h2>PERSONAL STRENGTH PROFILE</h2>
        </div>

        <!-- Nama + Garis -->
        <div style="text-align: center; margin-top: 500px;">
            <div style="width: 60%; margin: 0 auto; border-bottom: 1px solid black;"></div>

            <div style="font-size: 16pt; font-weight: bold; margin-top: 10px;">
                {{ Auth::user()->name }}
            </div>

            <div style="font-size: 10pt; margin-top: 5px;">
                {{ Auth::user()->phone ?? '' }}
            </div>

            <div style="width: 60%; margin: 10px auto 0 auto; border-bottom: 1px solid black;"></div>
        </div>

    </div>


    <div style="page-break-after: always;">
        <div class="section-title" style="margin: 0 auto;">PENDAHULUAN</div>
        <div style="width: 87%; margin: 20px auto; text-align: justify; font-size: 10pt; line-height: 1.2;">
            Selama berabad-abad manusia telah dianjurkan untuk menjadi dirinya sendiri. Namun hingga kini, konsep
            menemukan jati diri tetap terasa abstrak dan sulit dipahami, sehingga nasihat tersebut kerap terdengar ideal
            namun sulit diwujudkan. Padahal, ketika seseorang mampu memahami siapa dirinya dan apa tujuan penciptaannya,
            di sanalah ia akan menemukan arah kesuksesan yang autentik.<br><br>

            Setiap perancang atau pencipta tentu memiliki maksud dan tujuan tertentu ketika menciptakan sesuatu. Tujuan
            tersebut dapat dipahami dengan mengamati hasil rancangan atau produk yang dihasilkan. Setiap perancang atau
            pencipta tentu memiliki maksud dan tujuan tertentu ketika menciptakan sesuatu. Tujuan tersebut dapat
            dipahami dengan mengamati hasil rancangan atau produk yang dihasilkan. Sebagai contoh, sepatu lari dirancang
            ringan dan fleksibel agar mendukung kecepatan, sementara sepatu gunung dibuat lebih tebal dan kokoh untuk
            melindungi kaki di medan berat.<br><br>

            Hal yang sama berlaku dalam penciptaan manusia. Sebagaimana kendaraan diciptakan untuk memindahkan orang
            atau barang dari satu tempat ke tempat lain, manusia pun diciptakan dengan tujuan memberi manfaat dan
            kontribusi bagi sesama serta lingkungannya. Setiap manusia dirancang dengan bentuk, rupa, dan karakteristik
            yang berbeda-beda. Perbedaan tersebut tentu bukan tanpa alasan; Sang Pencipta pasti memiliki maksud dan
            tujuan tertentu di balik keberagaman manusia, bahkan dalam jumlah yang nyaris tak terhingga sepanjang
            sejarah kehidupan di bumi.<br><br>

            Manusia adalah makhluk yang sangat unik. Meskipun jumlah manusia telah mencapai miliaran, tidak ada satu pun
            yang benar-benar sama, bahkan pada individu kembar sekalipun. Keunikan inilah yang menjadikan setiap manusia
            Begitu uniknya sehingga setiap orang merupakan pribadi yang unik dan tak tergantikan. Lalu, bagaimana cara
            kita mengenali keunikan tersebut? Apa yang membedakan satu manusia dengan yang lainnya? Jawabannya terletak
            pada sifat atau kepribadian.<br><br>

            Kepribadian yang dimaksud di sini bukan sekadar karakter, melainkan kepribadian yang bernilai guna dan mampu
            menghasilkan kontribusi nyata. Kepribadian produktif inilah yang kemudian disebut sebagai bakat.<br><br>

            Dalam pengertian yang lebih luas, bakat merupakan potensi diri. Potensi yang dimiliki setiap manusia adalah
            anugerah Tuhan yang sangat berharga, namun sering kali luput untuk disadari dan dikembangkan. Pertanyaannya,
            sejauh mana kita telah mengenali potensi tersebut? <br><br>

            Setiap manusia memiliki berbagai potensi, baik berupa kelebihan maupun keterbatasan. Sayangnya, kebanyakan
            orang lebih fokus untuk memperbaiki kelemahannya daripada mengembangkan kekuatan yang dimilikinya.<br><br>

            Tidak sedikit individu yang tumbuh dan bahkan menjadi ahli dalam mengatasi keterbatasannya, sementara
            potensi kekuatan yang sesungguhnya justru tetap tersembunyi dan terabaikan. Pola ini kerap muncul karena
            anggapan bahwa untuk menjadi sukses, seseorang tidak boleh memiliki kelemahan. Padahal, pada hakikatnya,
            memiliki kelemahan adalah sesuatu yang wajar, karena tidak ada manusia yang sempurna.<br><br>

            Hal terpenting yang perlu disadari adalah bahwa setiap manusia pasti memiliki kelebihan—sebuah kekuatan unik
            yang membedakannya dari orang lain. Namun, kekuatan tersebut hanya dapat dimanfaatkan secara optimal apabila
            diawali dengan proses mengenal diri sendiri. <br><br>

            Mengenali diri merupakan proses memahami bagaimana seseorang diciptakan, bukan sekadar menentukan ingin
            menjadi siapa. Proses ini berkaitan dengan cara berpikir, bertindak, merespons situasi, serta bagaimana
            seseorang memperoleh dan mengelola energi dalam kehidupannya. Ketika seseorang mampu mengenali dirinya
            dengan baik, ia akan lebih mudah menemukan arah hidup yang selaras dengan potensi dan peran yang
            dimilikinya.<br><br>

            Salah satu cara awal untuk mengenali diri adalah dengan memperhatikan pola energi dalam aktivitas
            sehari-hari. Ada aktivitas yang membuat seseorang merasa hidup, bersemangat, dan seolah lupa waktu,
            sementara aktivitas lain justru terasa melelahkan meskipun mampu dilakukan dengan baik. Aktivitas yang
            memberi energi biasanya berkaitan erat dengan potensi atau bakat alami, sedangkan aktivitas yang menguras
            energi sering kali hanya merupakan keterampilan yang dipelajari atau tuntutan lingkungan.<br><br>

            Selain pola energi, pengenalan diri juga dapat dilakukan dengan mengamati pola konsistensi yang muncul
            sepanjang perjalanan hidup. Kecenderungan tertentu biasanya telah terlihat sejak lama dan terus berulang
            dalam berbagai situasi. Ada orang yang secara alami gemar mengamati, menganalisis, dan mendalami informasi,
            sementara yang lain lebih menonjol dalam mengorganisasi, mengeksekusi, atau membangun relasi. Pola-pola
            inilah yang menjadi petunjuk penting dalam mengenali potensi diri.<br><br>

            Emosi juga memegang peranan besar dalam proses mengenali diri. Respons emosional terhadap peristiwa tertentu
            sering kali menunjukkan nilai dan kepedulian terdalam seseorang. Hal-hal yang memicu rasa antusias, empati,
            atau bahkan kegelisahan yang kuat biasanya berkaitan dengan sesuatu yang bermakna secara personal. Dengan
            memahami emosi, seseorang dapat mengenali apa yang benar-benar penting bagi dirinya dan ke mana energi
            hidupnya secara alami tertuju.<br><br>

            Proses mengenali diri menjadi semakin utuh ketika dilengkapi dengan umpan balik dari orang lain. Tidak
            jarang, orang di sekitar justru lebih mudah melihat kekuatan seseorang dalam kondisi terbaiknya. Masukan
            dari orang lain, jika disaring dan dilihat polanya, dapat membantu memvalidasi apa yang selama ini mungkin
            luput disadari oleh diri sendiri.<br><br>

            Sebagai pelengkap, alat bantu seperti asesmen potensi atau refleksi terstruktur dapat digunakan untuk
            mempercepat proses pengenalan diri. Namun, asesmen bukanlah alat untuk memberi label atau membatasi
            seseorang, melainkan sebagai cermin awal untuk memahami kecenderungan dan kekuatan yang dimiliki. Hasil
            asesmen perlu disandingkan dengan pengalaman hidup dan refleksi pribadi agar maknanya menjadi lebih
            utuh.<br><br>

            Pada akhirnya, mengenali diri bukan tentang menghilangkan kelemahan atau menjadi sempurna, melainkan tentang
            memahami keunikan dan kekuatan yang telah dianugerahkan. Setiap manusia memiliki peran dan kontribusi yang
            berbeda, dan pengenalan diri merupakan langkah awal untuk menghadirkan manfaat tersebut secara nyata. Ketika
            seseorang hidup selaras dengan dirinya, ia tidak hanya menemukan arah hidup yang jelas, tetapi juga
            kesuksesan yang bermakna.

        </div>

    </div>

    <div>
        <div class="section-title">URUTAN BAKAT</div>
        <table class="table-bakat">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bakat</th>
                    <th>No</th>
                    <th>Nama Bakat</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 17; $i++)
                    <tr>
                        {{-- Kolom kiri (1–17) --}}
                        <td style="font-size: 10pt">{{ $i + 1 }}</td>
                        <td class="nama-bakat" style="font-size: 10pt">{{ $kolomKiri[$i] ?? '' }}</td>

                        {{-- Kolom kanan (18–34) --}}
                        <td style="font-size: 10pt">{{ $i + 18 }}</td>
                        <td class="nama-bakat" style="font-size: 10pt">{{ $kolomKanan[$i] ?? '' }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <div style="width: 87%;  margin: 20px auto;">
            <h3 style="color: black; font-size: 10pt; margin-bottom: 8px; font-weight: bold;">
                Memahami Urutan Bakat Anda
            </h3>
            <p style="text-align: justify; font-size: 10pt; line-height: 1.2;">
                Setiap individu memiliki bakat yang berjumlah 34 (tiga puluh empat) tema bakat. Perbedaaan satu individu
                dengan individu lainnya adalah urut-urutan tema bakatnya. Urutan tema bakat ini merupakan panduan awal
                dari usaha menemukan diri anda. yang perlu kita perhatikan disini adalah 7 (tujuh) bakat pertama atau
                bakat dominan, karena inilah yang merupakan potensi kekuatan anda. Bakat-bakat yang menempati urut
                urutan terbawah (tujuh atau sepuluh bakat terakhir) merupakan potensi kelemahan atau keterbatasan.
            </p>
        </div>
    </div>

    <div style="page-break-before: always;">
        <div class="section-title" style="margin-bottom: 20px">MATRIX BAKAT</div>
        <table class="matrix-table">
            <tr>
                <th colspan="2">Thinking</th>
                <th colspan="2">Striving</th>
            </tr>

            @for ($i = 0; $i < max(count($matrixBakat['Thinking']), count($matrixBakat['Striving'])); $i++)
                <tr>
                    {{-- THINKING --}}
                    <td style="text-align:left">
                        {{ $matrixBakat['Thinking'][$i]['nama'] ?? '' }}
                    </td>
                    <td style="text-align:center">
                        @isset($matrixBakat['Thinking'][$i])
                            <span class="dot {{ $matrixBakat['Thinking'][$i]['color'] }}"></span>
                        @endisset
                    </td>

                    {{-- STRIVING --}}
                    <td style="text-align:left">
                        {{ $matrixBakat['Striving'][$i]['nama'] ?? '' }}
                    </td>
                    <td style="text-align:center">
                        @isset($matrixBakat['Striving'][$i])
                            <span class="dot {{ $matrixBakat['Striving'][$i]['color'] }}"></span>
                        @endisset
                    </td>
                </tr>
            @endfor
        </table>

        <table class="matrix-table">
            <tr>
                <th colspan="2">Influencing</th>
                <th colspan="2">Relating</th>
            </tr>

            @for ($i = 0; $i < max(count($matrixBakat['Influencing']), count($matrixBakat['Relating'])); $i++)
                <tr>
                    {{-- INFLUENCING --}}
                    <td style="text-align: left">
                        {{ $matrixBakat['Influencing'][$i]['nama'] ?? '' }}
                    </td>
                    <td>
                        @if (isset($matrixBakat['Influencing'][$i]))
                            <span class="dot {{ $matrixBakat['Influencing'][$i]['color'] }}"></span>
                        @endif
                    </td>

                    {{-- RELATING --}}
                    <td style="text-align: left">
                        {{ $matrixBakat['Relating'][$i]['nama'] ?? '' }}
                    </td>
                    <td>
                        @if (isset($matrixBakat['Relating'][$i]))
                            <span class="dot {{ $matrixBakat['Relating'][$i]['color'] }}"></span>
                        @endif
                    </td>
                </tr>
            @endfor
        </table>
        <div style="width: 87%;  margin: 10px auto;">
            <a style="text-align: justify; font-size: 10pt; line-height: 1.2;">
                Bagi Anda yang lebih mudah memahami informasi melalui visual, bakat-bakat yang dimiliki
                disajikan dalam bentuk sebuah peta yang sekaligus menjadi <strong>Matrix Bakat</strong>.
                Matrix ini dirancang untuk membantu pembaca mengenali dan membaca bakat dominan secara
                lebih cepat dan jelas.
            </a>
            <p style="text-align: justify; font-size: 10pt; line-height: 1.2;">
                Setiap tema bakat ditampilkan dengan penanda warna pada setiap bagian bakat.
                Penggunaan warna tersebut berfungsi sebagai panduan untuk menunjukkan tingkat urutan bakat,
                dengan ketentuan sebagai berikut.
            </p>
            <ul style="margin-top: 8px; padding-left: 18px; font-size: 10pt;">
                <li>
                    Warna
                    <span style="color:red;">merah</span>
                    menunjukkan bakat pada peringkat 1 hingga 7.
                </li>
                <li>
                    Warna
                    <span style="color:gold; font-weight:bold;">kuning</span>
                    digunakan untuk menandai bakat pada peringkat 8 hingga 14.
                </li>
                <li>
                    Warna
                    <span style="color:#cccaca; font-weight:bold;">putih</span>
                    menunjukkan bakat pada peringkat 15 hingga 20.
                </li>
                <li>
                    Warna
                    <span style="color:gray; font-weight:bold;">abu-abu</span>
                    menandai bakat pada peringkat 21 hingga 27.
                </li>
                <li>
                    Warna
                    <span style="color:black; font-weight:bold;">hitam</span>
                    digunakan untuk menunjukkan bakat pada peringkat 28 hingga 34.
                </li>
            </ul>

        </div>
    </div>

    <div style="page-break-before: always;">
        <div class="section-title" style="margin-bottom: 20px">POTENSI PEKERJAAN</div>

        <ul
            style="margin-bottom: 20px; margin-top: 20px; list-style: none; text-align: justify; width: 87%; line-height: 1.5;">
            @foreach ($potensiPekerjaan as $item)
                @php
                    $parts = explode('-', $item, 2);
                    $job = trim($parts[0]);
                    $desc = trim($parts[1] ?? '');
                @endphp

                <li style="font-size: 10pt; margin-bottom: 15px;">
                    <strong>{{ $job }}</strong> - {{ $desc }}
                </li>
            @endforeach
        </ul>
    </div>


    <div style="page-break-before: always;">
        <div class="section-title">POTENSI BAKAT / AREA KEKUATAN</div>
        <table class="table-potensi">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Potensi Bakat / Area Kekuatan</th>
                    <th>Penjelasan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($potensiBakat as $index => $item)
                    <tr>
                        <td style="font-size: 10pt">{{ $index + 1 }}</td>
                        <td style="font-size: 10pt">{{ $item['potensi'] }}</td>
                        <td style="font-size: 10pt; justify-content: left; text-align: justify;">
                            {{ $item['penjelasan'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center;">Data potensi bakat tidak tersedia</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <div style="page-break-before: always;">
        <div class="section-title">PUBLIC SPEAKING & COMMUNICATION STYLE</div>

        <table class="table-komunikasi">
            <thead>
                <tr>
                    <th style="font-size: 8pt">Talent Dominan</th>
                    <th style="font-size: 8pt">Kekuatan dalam Public Speaking</th>
                    <th style="font-size: 8pt">Hal yang Perlu Dijaga / Hindari</th>
                    <th style="font-size: 8pt">Strategi Komunikasi Ideal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($komunikasiSummary as $row)
                    <tr>
                        <td style="font-size: 10pt">{{ $row['talent'] }}</td>
                        <td style="font-size: 10pt; text-align: center; ">{{ $row['kekuatan'] }}</td>
                        <td style="font-size: 10pt; text-align: center;">{{ $row['hindari'] }}</td>
                        <td style="font-size: 10pt; text-align: center; ">{{ $row['strategi'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="page-break-before: always;">
        <div class="section-title"> 34 TEMA BAKAT CLIFTONSTRENGTHS</div>

        <div style="width: 87%; margin: 20px auto; font-size: 10pt; line-height: 1.5;">
            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    ACHIEVER
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Orang ini memiliki energi tinggi dan selalu bekerja keras. Kepuasan hidup datang dari aktivitas dan
                    pencapaian.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Selalu ingin mencapai lebih dan menetapkan target tinggi.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memiliki semangat membara dalam dirinya yang mendorongnya untuk berbuat lebih banyak,
                        agar dapat meraih sukses yang lebih banyak.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Tenaga Penjual/Sales,
                    Teknisi Proyek, Teknisi Lapangan, Pekerja Lapangan, Relawan, Petugas SAR.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    ACTIVATOR
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Suka langsung bertindak dan mengubah ide menjadi kenyataan.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Selalu bertanya "kapan bisa mulai?" dan tidak sabar untuk bertindak.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Berani mengambil keputusan walaupun informasi tidak lengkap, melihat kesalahan sebagai bagian
                        dari belajar.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang sering terdapat pada peran: usaha - usaha baru atau
                    yang memerlukan perubahan besar, Entrepreneur, Sales.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    ADAPTABILITY
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Mampu menyesuaikan diri dengan situasi yang berubah tanpa masalah.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Fleksibel dan menerima perubahan dengan senang hati.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Hidup sesuai keadaan saat itu, perubahan bukan masalah.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Perubahan bukanlah musuhnya melainkan temannya.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Peran yang mungkin sesuai: Wartawan, Produksi live TV, Perawat Gawat Darurat, Pelayanan
                    Pelanggan (Customer Service), Pemadam Kebakaran, Dispatcher.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    ANALYTICAL
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Mencari fakta dan alasan di balik setiap kejadian.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Hanya menerima informasi yang berbasis fakta.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Suka bukti dan data, bertanya "buktikan!"
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Analis,Periset
                    (pemasaran, keuangan, atau kesehatan), Manajemen Database, Editor,Manajemen Risiko,
                    Accounting, Programmer.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    ARRANGER
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Mampu mengatur orang dan sumber daya dengan efektif dan fleksibel.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Selalu mencari cara lebih baik dalam mengatur sesuatu.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Senang mengelola banyak faktor agar hasil optimal.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran:Supervisor, Manajer,
                    Event Organizer, Programmer.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    BELIEF
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Memiliki nilai hidup yang kuat dan senang membantu orang lain.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Memprioritaskan kegiatan bermanfaat bagi dunia.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Komitmen terhadap keluarga dan etika tinggi.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Sukses diartikan lebih dari uang, termasuk keberanian berkorban.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memberikan pelayanan dan bantuan bagi orang lain tanpa pamrih.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Pelayanan Pelanggan,
                    CRM, Maintenance, Perawat, Pekerja Sosial, Relawan.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    COMMAND
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Suka memimpin dan bertanggung jawab, kadang terlihat tegas atau memaksa.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Senang mengambil alih situasi.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Tidak berhenti sampai hasil sesuai standar yang ditentukan.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Berani menghadapi masalah langsung dan mengatakan kebenaran.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Sales, Negosiator,
                    Wartawan, Pengacara, Komandan, HRD, Pembelian.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    COMMUNICATION
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Mudah mengekspresikan pikiran lewat kata-kata atau tulisan.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Bisa membuat topik sederhana menjadi menarik.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Senang berbicara, bercerita, menulis, dan presentasi.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Pengajar,Sales,
                    Marketing, Humas, Juru Bicara, Juru Kampanye, Presenter, MC, Pengacara,Layanan Pelanggan,
                    Penulis.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    COMPETITION
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    senang membandingkan kemajuannya dengan orang lain, menjadikan segalanya
                    kompetisi dan selalu berusaha menjadi nomor satu.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Mencapai target tanpa mengalahkan orang lain akan terasa sebagai kemenangan yang kosong.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Senang akan persaingan karena hal tersebut membuatnya sangat bersemangatnya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Senang berkompetisi, khususnya kompetisi yang memiliki peluang untuk dimenangkannya.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Sales,Pelatih Olahraga.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    CONNECTEDNESS
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    senang mengaitkan peristiwa yang satu dengan peristiwa lainnya dan lebih percaya
                    bahwa setiap kejadian pasti memiliki alasan/sebab daripada kebetulan.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Penuh pertimbangan, penuh perhatian, dan mudah menerima; inilah kata-kata yang tepat baginya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Yakin bahwa segala sesuatu yang terjadi pasti ada sebabnya, karena dalam pikirannya semua
                        saling berkaitan.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Pendengar dan Pemberi
                    Saran/Counselor, Leader dalam membangun team yang berbeda kelompok atau membantu orang
                    merasa berguna.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    CONSISTENCY/FAIRNESS
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    memiliki bakat untuk melihat kesamaan orang dan menyadari kebutuhan
                    untuk memperlakukan semua orang secara sama.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Dalam kehidupan yang penuh perubahan ini, mereka yang berbakat Consistency selalu berusaha
                        mencari keseimbangan. Semua orang harus diperlakukan dengan sama tidak peduli siapa dan apa
                        yang mereka lakukan.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Tidak berat sebelah itu penting baginya. Benar-benar sadar akan perlunya untuk memperlakukan
                        semua orang secara adil, apapun jabatan mereka, sehingga tidak berpihak pada kepentingan satu
                        orang tertentu saja.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Hakim,Quantity
                    Surveyor, Petugas Commisioning atau peran yang bisa memiliki kekuatan untuk menyamakan
                    aturan main, Petugas Kontrol terhadap kesesuaian atas standar seperti kepatuhan dan lain-lain.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    CONTEXT
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    menikmati mempelajari sesuatu melalui riset dan studi tentang masa lalu.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Baginya, masa lalu merupakan cetak biru dari sebab dan akibat. Apa yang telah terjadi merupakan
                        pegangan untuk mengerti apa yang terjadi sekarang.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memandang ke belakang untuk memahami masa sekarang karena di sana ada jawaban
                        jawabannya.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran : Guru Sejarah, Arkeolog,
                    Penyusun budaya perusahaan, Hakim.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    DELIBERATIVE
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    berhati-hati, kadang skeptis, memiliki karakter melihat sebelum melompat.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        What if-nya timbul karena waspada dan adanya prasangka.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Dia bersikap hati-hati dan waspada.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Dia seorang pribadi yang khusus yang memilih sahabat dengan hati-hati.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang sering terdapat pada peran berikut :Pilot, Pemberi
                    Saran atau Nasehat (Advisor), Urusan Legal, Membuat Kontrak Bisnis yang baik atau memastikan
                    kesesuaian dengan peraturan atau standar atau kode atau juga peran yang terkait dengan masalah
                    keuangan dan atau keamanan.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    DEVELOPER
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    senang mengenali dan menggali potensi yang terdapat pada diri orang lain dan
                    mendapatkan kepuasan dari setiap kemajuan masing-masing individu.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Dapat melihat potensi yang ada pada diri orang lain. Semua potensi tersebut itu dapat terlihat
                        olehnya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Senang membantu orang lain mencapai kesuksesan dan mencarikan mereka jalan untuk mencapai
                        kesuksesan tersebut.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Manajer,Guru, Pelatih,
                    Pembimbing, Petugas Sosial.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    DISCIPLINE
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Senang berada dalam kondisi atau situasi yang teratur, terstruktur, terencana, memiliki
                    sistem dan prosedur.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Bagi orang yang memiliki bakat Discipline, dunia haruslah dapat diperkirakan, teratur dan
                        terencana.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Fokus pada jadwal dan batas waktu, biasanya senang membagi proyek atau rencana jangka
                        panjang menjadi serangkaian rencana-rencana jangka pendek yang dapat dijalankan dengan lebih
                        teliti.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Keuangan, Sekretaris,
                    Administrasi, Petugas ISO, Kearsipan, Accounting, MIS, Programmer.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    EMPATHY
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    mampu merasakan perasaan orang lain disekitarnya seakan-akan mengalaminya sendiri.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Dapat mengerti perspektif orang lain disekitarnya, walaupun berbeda dengan perspektif yang
                        dimilikinya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Dapat mendengarkan pertanyaan atau keraguan yang tidak terungkap dan mengantisipasi
                        kebutuhan orang lain.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Sales, HRD, Guru TK,
                    Perawat, Operator Telepon, Psikiater, Dispatcher, Layanan Pelanggan.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    FOKUS
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    membutuhkan tujuan yang jelas. Tujuan inilah yang berfungsi sebagai kompas untuk menentukan
                    prioritas, menjalaninya, dan membuat koreksi seperlunya untuk tetap berada dijalur yang benar.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Tanpa tujuan, hidup dan pekerjaannya dapat cepat membuatnya frustrasi. Karena itulah setiap
                        tahun, setiap bulan, dan bahkan setiap minggu, tujuan atau goals yang hendak dicapai dibuat.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Menjaga agar semuanya tetap pada tujuannya.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Project Officer, Team
                    Leader, tugas yang memerlukan fokus.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    FUTURISTIC
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    senang berangan-angan, membayangkan masa depan seakan-akan tergambar pada
                    dinding dan dapat memberikan inspirasi pada rekan lainnya dengan visinya mengenai masa depan.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Dapat melihat dengan detail apa yang mungkin terjadi atau terdapat di masa depan dan hal ini
                        terus membuatnya melangkah maju.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Seorang pemimpi atau visioner, memiliki banyak pilihan kemungkinan situasi mendatang dengan
                        sumber sumber manusia, waktu, uang, bahan dan memilihnya sesuai dengan pilihan yang terbaik.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Entrepreneur, Perencana
                    jangka panjang, Visioner, peran didalam membuat visi organisasi atau pengembang produk baru.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    HARMONY
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    dapat bekerja sama secara baik dengan orang lain.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Tidak suka konflik, setiap kali merasakan adanya perbedaan pendapat atau perdebatan, akan
                        memperhatikan apa yang terjadi dan berusaha mendamaikan dengan menunjukkan adanya
                        kesamaan dari kedua belah pihak.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Menganggap bahwa pertentangan dan konfilk itu tidak produktif, sehingga berusaha
                        menguranginya sekecil mungkin.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Pembangun jaringan
                    antara orang-orang dengan cara pandang yang berbeda, Juru Damai, Penasehat.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    IDEATION
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    menyukai diskusi kelompok yang bebas, baik sekali dalam brainstorming dan mampu
                    menemukan hubungan atau benang merah dari apa yang terlintas pada dua fenomena yang berbeda dan tak
                    terkait.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Inovatif, konsep, teori dan solusi merupakan hal yang penting baginya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memiliki cara yang sederhana untuk menjelaskan banyak kejadian, konsep yang sangat mendasar
                        seringkali dapat menjelaskan apa yang kelihatannya rumit dan menemukan ide yang belum lengkap
                        ini merupakan hal menyenangkan baginya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Tergila-gila dengan ide-ide. Apakah ide itu? Ide adalah konsep, penjelasan terbaik tentang
                        berbagai kejadian.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Marketing, Advertising,
                    Wartawan, Perancang atau Pengembang produk baru.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    INCLUDER/INCLUSIVENESS
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    kecenderungan untuk menerima semua orang dan selalu berusaha agar
                    semua orang mempunyai rasa memiliki dalam kelompok.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Memperbesar kelompok. Inilah filosofi dan pandangan hidupnya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memberikan perhatian pada siapapun yang merasa terasing dan berusaha membuat mereka
                        merasa diterima.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Baginya membuat semua orang merasa bagian dari kelompok adalah penting, karena semua orang
                        akan merasakan manfaat dari dukungan yang lainnya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Kita semua sama-sama penting . Jadi, tidak ada seorang pun yang boleh diabaikan.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Motivator kelompok,
                    Wakil suara minoritas, Pemimpin kelompok dengan latar budaya beragam, Mentor bagi mereka
                    yang baru bergabung di dalam organisasi.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    INDIVIDUALIZATION
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    mampu melihat keunikan dari masing masing orang secara individual dan
                    memikirkan bagaimana orang-orang yang unik dan berbeda dapat bekerja bersama secara produktif.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Mengajukan pertanyaan yang tepat dalam mengumpulkan informasi dan menguji kecocokan
                        pendapatnya mengenai bakat, keterbatasan, dan suasana perasaan seseorang.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Secara naluriah mengamati gaya, motivasi, cara berpikir, dan cara membina hubungan masing
                        masing orang.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Manajer, Penasihat,
                    Rekrutmen, Supervisor, Pengajar, Penulis artikel tentang manusia, Sales, Novelis, HRD.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    INPUT
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    memiliki hasrat untuk mengetahui lebih jauh dan lebih banyak serta senang mengumpulkan atau
                    mengkoleksi dan mengarsip segala macam informasi.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Ingin mengetahui segala hal dan mengumpulkan segala macam benda.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Senang mengumpulkan informasi (artikel, fakta, kutipan, buku, catatan dan lain-lain) atau barang
                        barang seperti kupu-kupu, kartu bergambar, boneka, foto-foto, dan lain-lain.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Apapun koleksinya, dia mengumpulkannya karena itu menarik baginya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memiliki pemikiran yang membuatnya mudah sekali menemukan banyak hal yang menarik baginya
                        di dunia ini.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Pengajar, Periset,
                    Wartawan, Estimator, Petugas Arsip.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    INTELLECTION
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                     Suka berpikir mendalam, merenung, dan menikmati diskusi yang membahas ide atau pemikiran.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Pemikir dalam yang berusaha memahaminya untuk dirinya sendiri.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Menikmati waktu menyendiri karena hal tersebut merupakan saat-saat baginya untuk merenung
                        dan introspeksi
                    </li>
                    <li style="margin-bottom: 8px;">
                        Senang berpikir, aktivitas-aktivitas olah mental dan melatih daya pikirnya ke berbagai arah.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Filusuf, Peneliti,
                    Pertimbangan untuk mulai atau meneruskan studi dalam bidang filosofi, Sastra atau Psikologi.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    LEARNER
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    senang mempelajari sesuatu dan selalu tertarik lebih terhadap proses mempelajari sesuatu
                    dibandingkan bidang, materi atau hasil pembelajaran tersebut.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Senang akan proses mendapatkan informasi atau keterampilan baru.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Materi pokok yang menarik umumnya akan ditentukan oleh tema-tema lain dan pengalamannya,
                        namun apapun bidangnya, dia akan selalu tertarik pada proses belajar.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memiliki gairah atau hasrat yang tinggi untuk belajar dan terus berkembang.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang sering terdapat pada peran berikut: Konsultan
                    (internal atau eksternal), Teknisi TI, Programmer, Guru atau Katalisator Perubahan.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    MAXIMIZER
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    fokus pada kekuatan-kekuatan yang ada sebagai cara untuk merangsang keunggulan pribadi
                    dan kelompok dan cenderung untuk mengubah sesuatu baik dan membuatnya menjadi jauh lebih baik lagi.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Bila menemukan kekuatan akan merasa terdorong untuk mempertahankan, memperbaiki,
                        meningkatkan, dan menjadikannya keunggulan.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Mudah terpikat pada Kekuatan-kekuatan, baik miliknya maupun milik orang lain.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Lebih memilih untuk bekerja atau beraktivitas bersama dengan orang-orang yang menghargai
                        kekuatannya.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: peran dimana dia
                    bertugas membantu orang hebat menjadi sukses seperti Pelatih, Manajer, Mentor, Guru,
                    Transformational leader.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    POSITIVITY
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    memiliki antusiasme tinggi yang dapat menular dan optimisme yang dapat membuat orang
                    lain bersemangat atas apa yang akan dilakukannya.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Ramah, senang memuji, mudah tersenyum dan selalu mencari sisi positif dari segala sesuatu atau
                        situasi.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Mampu membuat orang-orang bersemangat, merasa senang, meningkatkan rasa percaya diri
                        mereka.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Pengajar, Entertainer,
                    Motivator, Sales, Manajer, Entrepreneur atau Leader.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    RELATOR
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Menikmati hubungan yang dekat atau erat dengan orang lain secara pribadi dan menemukan
                    kepuasan mendalam dalam bekerja keras dengan teman-temannya untuk mencapai tujuan.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Memiliki keinginan untuk memahami hal-hal yang bersifat pribadi atau personal tentang orang lain
                        (seperti impian, hasrat, ketakutan, perasaan, dan lain-lain), dan juga ingin agar mereka
                        memahaminya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Merasa nyaman dalam hubungan yang akrab. Bila telah terjalin hubungan, maka akan berusaha
                        untuk membina hubungan yang lebih mendalam lagi.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Account Sales,
                    Katalisator dalam hubungan kepercayaan, bisa menjadi model peran dalam hubungan kepercayaan.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    RESPONSIBILITY
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    memiliki rasa tanggung jawab yang tinggi atas komitmen yang telah dibuat, baik besar
                    ataupun kecil, dan merasa terikat secara emosional atau psikologis untuk memenuhi atau menjalaninya
                    hingga selesai
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Melaksanakan tugas yang diberikan dengan sepenuh hati dan tidak peduli seberapa sulit tugas
                        tersebut, bila ia menerimanya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memiliki rasa kejujuran dan kesetiaan.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Merasa berhutang untuk memenuhi apa yang telah dijanjikannya
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Account Sales, HSE,
                    Manajer, Keuangan, Quality Control, Keamanan.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    RESTORATIVE
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    Senang memecahkan masalah dan memiliki kemampuan untuk mengembalikan segala
                    sesuatu menjadi berfungsi dengan baik kembali
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Pandai dalam mengetahui sesuatu yang salah dan memperbaikinya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Menikmati tantangan dalam menganalisis gejala-gejala, mengidentifikasi yang salah dan
                        menemukan solusinya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Baginya proses, rencana, taktik seperti juga barang dan bahkan manusia, semuanya dapat dibuat
                        menjadi lebih baik.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Pengobatan, Konsultan
                    Perusahaan, Customer Service, Teknisi Perbaikan, Terapist, Business Process Reengineering.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    SELF-ASSURANCE
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    memiliki kepercayaan diri yang tinggi pada kemampuannya untuk mengatur hidupnya
                    sendiri/memiliki keyakinan pada kemampuannya untuk mengatur hidupnya sendiri dan Inner Compas atau
                    intuisi/petunjuk batiniah yang memberikan keyakinan bahwa keputusan-keputusan yang dibuat merupakan
                    keputusan yang benar atau dalam membuat keputusan-keputusan yang benar.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Mampu mengambil risiko dan menghadapi tantangan-tantangan baru.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memiliki perspektif yang unik dan berbeda sehingga harus memutuskan segala sesuatunya sendiri.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memiliki keyakinan tidak hanya pada kemampuannya sendiri namun juga pada pertimbangan atau
                        penilaian yang dimilikinya.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: dia akan sangat baik
                    kalau diminta untuk membuat banyak keputusan seperti Leader, Sales, Legal atau Entrepreneur.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    SIGNIFICANCE
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    senang menjadi pusat perhatian, dikenal, didengar, diakui serta dihargai banyak orang
                    atas keunikan atau keistimewaan yang dimilikinya.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Memiliki keinginan untuk dikagumi sebagai pribadi yang berkredibilitas, profesional, dan sukses.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Lebih memilih untuk berasosiasi dengan orang-orang yang memiliki kredibilitas,profesional, dan
                        sukses.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Seseorang yang sangat independen dan menginginkan agar pekerjaannya menjadi jalan/cara hidup
                        daripada hanya sekedar pekerjaan.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Marketing, Presenter, MC,
                    Juru Kampanye, Sales.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    STRATEGIC
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    mampu memilah-milah masalah yang ada dan menemukan jalan yang terbaik untuk
                    solusinya. Cara pikir dan perspektif yang berbeda memungkinkannya dapat melihat garis besar akan
                    sesuatu secara keseluruhan.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Mampu menciptakan alternatif pilihan-pilihan dari suatu permasalahan.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Mampu melihat pola dari sesuatu disaat yang lain hanya dapat melihat kekacauan.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Dapat dengan cepat mengenali pola yang ada dan masalah-masalah yang mungkin muncul.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Perencana Strategi,
                    Manajer, Leader.
                </p>
            </div>

            <div style="margin-bottom: 25px;">
                <h3 style="color: black; font-size: 12pt; margin-bottom: 4px; font-weight: bold;">
                    WOO (Winning Others Over)
                </h3>
                <a style="text-align: justify; margin-bottom: 10px;">
                    senang akan tantangan untuk bertemu dengan orang baru atau orang yang
                    belum dikenal dan menjadi akrab dengan mereka.
                </a>
                <ul style="margin-left: 20px; text-align: justify;">
                    <li style="margin-bottom: 8px;">
                        Senang bertutur sapa dengan semua orang yang baru ditemuinya.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Memilki rasa ingin tahu yang tinggi terhadap orang asing atau orang yang belum dikenal.
                    </li>
                    <li style="margin-bottom: 8px;">
                        Tidak pernah malu untuk memulai percakapan atau khawatir kehabisan topik pembicaraan.
                    </li>
                </ul>
                <p style="text-align: justify; margin-bottom: 10px;">
                    Tema bakat ini merupakan salah satu bakat yang banyak terdapat pada peran: Duta Organisasi, Sales,
                    SPG, Jurkam, Entertainer, Operator Telepon, Resepsionis.
                </p>
            </div>


        </div>
    </div>

</body>

</html>
