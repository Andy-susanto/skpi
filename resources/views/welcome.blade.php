<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Selamat Datang di Sistem Informasi Surat Keterangan Pendamping Ijazah
    </title>
    <meta charset="UTF-8">
    <meta name="description" content="Unica University Template">
    <meta name="keywords" content="event, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('images/logo.png')}}" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .header-section{
            background-image: none;
        }

        .footer-section{
            backgroun-color:white;
            background-image: :none !important;
        }

    </style>

</head>

<body>
    <!-- Page Preloder -->


    <!-- header section -->
    <header class="header-section">
        <div class="container">
            <!-- logo -->

            <a href="https://simpeg.unja.ac.id" class="site-logo" style="padding-top: 0px;">
                <img width="400px;"src="{{asset('images/logo3.png')}}" alt="">
            </a>

            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <div class="header-info">

                <div class="hf-item" style="width:470px;">

                    <p style="float: right;"><span>Alamat:</span>Jl. Raya Jambi - Muara Bulian Km. 15,
                        Mendalo Indah, Jambi Luar Kota, Jambi 36361</p>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end-->


    <!-- Header section  -->
    <nav class="nav-section ">
        <div class="container ">

            <ul class="main-menu ">
                <li class="active "><a href="https://simpeg.unja.ac.id">HOME</a></li>
                @if (Auth::check())
                <li class=""><a href="{{url('home')}}">Dashboard</a></li>
                @else
                <li class=""><a href="{{route('login')}}">LOGIN</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Header section end -->

    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{asset('images/bg-skpi.jpg')}}">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hs-subtitle">A World Class Enterpreneurship University</div>
                                <h2 class="hs-title">SELAMAT DATANG DI SISTEM INFORMASI SURAT PENDAMPING IJAZAH UNIVERSITAS JAMBI
                                </h2>
                                <p class="hs-des"></p>
                                @if (Auth::check())
                                <a class="site-btn" href="{{route('login')}}">Dashboard</a>
                                @else
                                <a class="site-btn" href="{{route('login')}}">Masuk</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->




    <section class="enroll-section spad set-bg" data-setbg="img/enroll-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="p-4 col-lg-7 p-lg-0">
                    <div class="text-white section-title">
                        <h4>Tentang SKPI UNJA</h4>
                    </div>
                    <div class="text-white enroll-list">
                        <div class="enroll-list-item">
                            <span>1</span>
                            <h5>Apa Itu SKPI ?</h5>
                            <p class="text-justify">Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia Nomor 59 tahun 2018 Pasal 1 ayat (5) menyatakan bahwa Surat Keterangan Pendamping Ijazah (SKPI) adalah dokumen yang memuat informasi tentang pemenuhan kompetensi lulusan dalam suatu Program Pendidikan Tinggi.
                                Dalam Peraturan Menteri Pendidikan dan Kebudayaan Nomor 81 tahun 2014 Bab 1, Pasal 1 ayat (4) didefenisikan Surat Keterangan Pendamping Ijazah (SKPI) adalah dokumen yang memuat informasi tentang pencapaian akademik atau kualifikasi dari lulusan pendidikan tinggi bergelar. Kualifikasi lulusan diuraikan dalam bentuk narasi deskriptif yang menyatakan capaian pembelajaran lulusan pada jenjang KKNI yang relevan, dalam suatu format standar yang mudah oleh masyarakat umum.
                                SKPI bukan pengganti dari ijazah dan bukan transkrip akademik. SKPI juga bukan media yang secara otomatis memastikan pemegangnya mendapat pengakuan.</p>
                        </div>
                        <div class="enroll-list-item">
                            <span>2</span>
                            <h5>Tujuan SKPI ?</h5>
                            <p>Adapun tujuan Surat Keterangan Pendamping Ijazah (SKPI) adalah sebagai berikut:</p>
                            <ul style="margin-left: 20px" class="text-justify">
                                <li> Kompetensi lulusan pada Universitas Jambi. </li>
                                <li> Meningkatkan keaktifan Mahasiswa pada kegiatan ekstrakurikuler. </li>
                                <li> Meningkatkan minat Mahasiswa pada kegiatan-kegiatan ekstrakurikuler. </li>
                                <li> Menerangkan profil alumni Universitas Jambi yang berwawasan luar dan mampu bersaing pada dunia kerja. </li>
                            </ul>
                        </div>
                        <div class="enroll-list-item">
                            <span>3</span>
                            <h5>Manfaat SKPI ?</h5>
                            <p>
                                1.	Manfaat SKPI untuk Lulusan
                            </p>
                            <ul style="margin-left:20px" class="text-justify">
                              <li>SKPI diberikan kepada semua lulusan jenjang pendidikan pada Universitas Jambi. </li>
                              <li>SKPI memuat dokumen kompetensi lulusan seperti kemampuan kerja, penguasaan pengetahuan serta sikap moral lulusan yang lebih mudah dimengerti oleh pihak pengguna di dalam maupun luar negeri dibandingkan dengan membaca transkrip</li>
                              <li>SKPI menerangkan objektif mengenai prestasi dan kompetensi pemegangnya.</li>
                              <li>Meningkatkan kelayakan kerja ( employability ) terlepas dari kekakuan jenis dan jenjang program studi.</li>
                            </ul>

                            <p style="margin-top:20px">
                                2.	Manfaat SKPI untuk Perguruan Tinggi
                            </p>

                            <ul style="margin-left: 20px" class="text-justify">
                                <li>Tersedia penjelasan kualifikasi lulusan yang lebih mudah dimengerti oleh masyarakat dan stakeholders yang lebih luas dibandingkan dengan membaca transkrip nilai. </li>
                                <li>Meningkatkan akuntabilitas institusi dengan pernyataan capaian pembelajaran suatu program yang transparan. Pada jangka menengah dan panjang, hal ini akan meningkatkan trust dari pihak lain dan sustainability dari institusi.</li>
                                <li>Menyatakan Universitas Jambi berada dalam kerangka kualifikasi nasional yang diakui secara nasional dan dapat disandingkan dengan program studi pada institusi luar melalui qualification framework masing-masing negara.</li>
                            </ul>

                        </div>
                        <div class="enroll-list-item">
                            <span>4</span>
                            <h5>Petunjuk Pengisian SKPI ?</h5>
                            <p class="text-justify">Pengisian SKPI dilakukan oleh Mahasiswa melalui laman https://skpi.unja.ac.id/. Pengisian yang diinputkan oleh Mahasiswa adalah informasi capaian atau kegiatan yang dilakukan semenjak semester pertama dengan syarat dan ketentuan dokumen yang berlaku.</p>
                        </div>
                        <div class="enroll-list-item">
                            <span>5</span>
                            <h5> SKPI ?</h5>
                            <p>Sistematika data pokok dalam format SKPI pada Universitas Jambi dikelompokkan ke dalam tiga komponen, yaitu:</p>
                            <ol style="margin-left:20px" class="text-justify">
                               <li> Informasi tentang identitas diri pemegang SKPI </li>
                               <li> Informasi tentang identitas Penyelenggara Program </li>
                               <li> Informasi tentang kualifikasi dan hasil yang dicapai</li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="p-4 col-lg-1 col p-lg-0">

                </div>
                <div class="p-4 col-lg-4 col p-lg-0">
                    <img src="https://simpeg.unja.ac.id/img/visimisi.jpeg" width="100%" height="70%">
                </div>

            </div>
        </div>
    </section>



    <!-- Footer section -->
    <footer class="footer-section" style="background-image: none;background-color:white">
        <div class="container footer-top">
            <div class="row">
                <!-- widget -->
                <div class="col-sm-6 col-lg-3 footer-widget">
                    <div class="about-widget">
                        <img width="300px;" src="https://simpeg.unja.ac.id/img/smart.png" alt="">

                    </div>
                </div>
                <!-- widget -->
                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">TAUTAN TERKAIT</h6>
                    <div class="dobule-link">
                        <ul>
                            <li><a href="https://www.gerbang.ac.id">Gerbang Universitas Jambi</a></li>
                            <li><a href="https://www.unja.ac.id">WEB UNJA</a></li>
                            <li><a href="https://www.siakad.unja.ac.id">Sistem Akademik</a></li>
                            <li><a href="https://simawa.unja.ac.id/">Sistem Informasi Mahasiswa</a></li>
                            <li><a href="https://www.elista.unja.ac.id">Tugas Akhir</a></li>
                            <li><a href="https://www.edimas.unja.ac.id">EDIMAS</a></li>
                            <li><a href="https://www.karir.unja.ac.id">KARIR ALUMNI</a></li>
                            <li><a href="https://jejakalumni.unja.ac.id/">TRACER STUDY</a></li>
                        </ul>

                    </div>
                </div>
                <!-- widget -->

                <!-- widget -->
                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">Kontak Kami</h6>
                    <ul class="contact">
                        <li>
                            <p><i class="fa fa-phone" aria-hidden="true"></i>
                            BIRO AKADEMIK DAN KEMAHASISWAAN</p>
                        </li>
                        <li>
                            <p><i class="fa fa-map-marker"></i> Jl. Raya Jambi - Muara Bulian Km. 15,
                                Mendalo Indah, Jambi Luar Kota, Jambi 36361</p>
                        </li>
                        <li>
                            <p><i class="fa fa-clock"></i> Senin - Jum&#039;at 07.00 - 17.00 WIB</p>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 footer-widget">


                </div>
            </div>
        </div>
        <!-- copyright -->
        <div class="copyright">
            <div class="container">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; 2021 Lembaga Pengembangan Teknologi Informasi dan Komunikasi (LPTIK)<br>
                    Universitas Jambi </a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer section end-->



    <!--====== Javascripts & Jquery ======-->
    <script src="{{asset('front/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>


</body>
</html>
