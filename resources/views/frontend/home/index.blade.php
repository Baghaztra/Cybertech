@extends('frontend.layouts.main')
@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-5 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="assets/img/123.jpg" class="img animated" alt="" width="600" height="400">
                    </div>

                    <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
                        <h1>Selamat Datang di <span>Cybertech PNP</span></h1>
                        <p>Unit Kegiatan Mahasiswa yang berfokus pada pengembangan skill di bidang IT dan cyber security di Politeknik Negeri Padang</p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Mulai Jelajahi</a>
                            {{-- <a href="" class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Tonton Video</span></a> --}}
                        </div>
                    </div>

                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section><!-- /Hero Section -->

        <!-- Tentang Kami -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">

                    <div class="col-xl-5 content">
                        <h3>Tentang Kami</h3>
                        <h2>Unit Kegiatan Mahasiswa Cybertech Politeknik Negeri Padang</h2>
                        <p>Unit Kegiatan Mahasiswa yang bergerak di bidang IT. Memiliki 3 divisi utama, yaitu Programming, Multimedia, dan Networking. Berisi mahasiswa dari berbagai jurusan dan prgram studi di Politeknik negeri padang</p>
                        {{-- <a href="#" class="read-more"><span>Baca Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a> --}}
                        <h6 class="text-primary">Cybertech!</h6>
                        <i><h4>Technology can unite anything!</h4></i>
                    </div>

                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <i class="bi bi-buildings"></i>
                                    <h3>Inovasi</h3>
                                    <p>Kami terus berinovasi untuk menyediakan solusi yang efektif dan efisien.</p>
                                </div>
                            </div> <!-- Akhir Kotak Ikon -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-clipboard-pulse"></i>
                                    <h3>Keandalan</h3>
                                    <p>Kami memastikan setiap layanan kami dapat diandalkan dan memenuhi kebutuhan Anda.</p>
                                </div>
                            </div> <!-- Akhir Kotak Ikon -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-command"></i>
                                    <h3>Komitmen</h3>
                                    <p>Kami berkomitmen untuk memberikan yang terbaik dalam setiap proyek yang kami tangani.
                                    </p>
                                </div>
                            </div> <!-- Akhir Kotak Ikon -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-graph-up-arrow"></i>
                                    <h3>Pertumbuhan</h3>
                                    <p>Kami membantu Anda tumbuh dengan solusi teknologi yang relevan dan inovatif.</p>
                                </div>
                            </div> <!-- Akhir Kotak Ikon -->

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /Tentang Kami -->

        {{-- <!-- Fitur Kami -->
        <section id="features" class="features section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="features-item">
                            <i class="bi bi-eye" style="color: #ffbb2c;"></i>
                            <h3><a href="" class="stretched-link">Penglihatan Jelas</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="features-item">
                            <i class="bi bi-infinity" style="color: #5578ff;"></i>
                            <h3><a href="" class="stretched-link">Fleksibilitas Tanpa Batas</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="features-item">
                            <i class="bi bi-mortarboard" style="color: #e80368;"></i>
                            <h3><a href="" class="stretched-link">Peningkatan Keahlian</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="features-item">
                            <i class="bi bi-nut" style="color: #e361ff;"></i>
                            <h3><a href="" class="stretched-link">Solusi Optimal</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="features-item">
                            <i class="bi bi-shuffle" style="color: #47aeff;"></i>
                            <h3><a href="" class="stretched-link">Kemudahan Adaptasi</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="features-item">
                            <i class="bi bi-star" style="color: #ffa76e;"></i>
                            <h3><a href="" class="stretched-link">Kinerja Terbaik</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="features-item">
                            <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
                            <h3><a href="" class="stretched-link">Desain Elegan</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
                        <div class="features-item">
                            <i class="bi bi-camera-video" style="color: #4233ff;"></i>
                            <h3><a href="" class="stretched-link">Visual Interaktif</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
                        <div class="features-item">
                            <i class="bi bi-command" style="color: #b2904f;"></i>
                            <h3><a href="" class="stretched-link">Kontrol Penuh</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
                        <div class="features-item">
                            <i class="bi bi-dribbble" style="color: #b20969;"></i>
                            <h3><a href="" class="stretched-link">Kreativitas Tanpa Batas</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
                        <div class="features-item">
                            <i class="bi bi-activity" style="color: #ff5828;"></i>
                            <h3><a href="" class="stretched-link">Aktivitas Efisien</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
                        <div class="features-item">
                            <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
                            <h3><a href="" class="stretched-link">Efek Terang</a></h3>
                        </div>
                    </div><!-- Fitur Item -->

                </div>

            </div>

        </section>
        <!-- /Fitur Kami --> --}}


        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-emoji-smile"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="74" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Anggota Aktif</p>
                        </div>
                    </div><!-- End Stats Item -->

                    {{-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item --> --}}

                    {{-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-headset"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item --> --}}

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-people"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Angkatan</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->
        <!-- Bagian Detail -->
        <section id="details" class="details section">

            <!-- Judul Bagian -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Detail</h2>
                <div><span>Periksa</span> <span class="description-title">Detail Kami</span></div>
            </div><!-- Akhir Judul Bagian -->

            <div class="container">

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                        <img src="/assets/img/details-1.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                        <h3>Memberikan Solusi yang Andal dan Profesional</h3>
                        <p class="fst-italic">
                            Kami berkomitmen untuk memberikan solusi terbaik, didukung oleh pengalaman dan teknologi
                            terkini.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i><span> Layanan terpercaya dan berkualitas tinggi.</span></li>
                            <li><i class="bi bi-check"></i> <span>Tim profesional dengan keahlian khusus.</span></li>
                            <li><i class="bi bi-check"></i> <span>Dukungan penuh untuk setiap proyek klien.</span></li>
                        </ul>
                    </div>
                </div><!-- Item Fitur -->

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out"
                        data-aos-delay="200">
                        <img src="/assets/img/details-2.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
                        <h3>Solusi Teknologi Modern</h3>
                        <p class="fst-italic">
                            Kami menggunakan teknologi mutakhir untuk memastikan proyek Anda sukses dan efisien.
                        </p>
                        <p>
                            Dengan pengalaman kami, kami dapat memberikan layanan terbaik yang dirancang khusus untuk
                            memenuhi kebutuhan Anda. Kami memastikan setiap detail diperhatikan dengan baik.
                        </p>
                    </div>
                </div><!-- Item Fitur -->

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
                        <img src="/assets/img/details-3.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7" data-aos="fade-up">
                        <h3>Inovasi dan Keunggulan</h3>
                        <p>Kami percaya pada kekuatan inovasi untuk mendorong keberhasilan bisnis Anda. Tim kami bekerja
                            keras untuk menciptakan solusi kreatif dan praktis.</p>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Layanan inovatif yang dirancang untuk kebutuhan spesifik
                                    Anda.</span></li>
                            <li><i class="bi bi-check"></i><span> Dukungan penuh dari awal hingga akhir proyek.</span></li>
                            <li><i class="bi bi-check"></i> <span>Pemanfaatan teknologi terbaru untuk hasil optimal.</span>
                            </li>
                        </ul>
                    </div>
                </div><!-- Item Fitur -->

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
                        <img src="/assets/img/details-4.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
                        <h3>Kepuasan Pelanggan adalah Prioritas Kami</h3>
                        <p class="fst-italic">
                            Kami berkomitmen untuk memberikan layanan yang memuaskan dan memenuhi kebutuhan klien kami.
                        </p>
                        <p>
                            Dengan fokus pada kualitas dan efisiensi, kami memastikan bahwa setiap proyek diselesaikan
                            dengan hasil yang melebihi harapan Anda. Mari bekerja sama untuk mencapai tujuan Anda.
                        </p>
                    </div>
                </div><!-- Item Fitur -->

            </div>

        </section><!-- /Bagian Detail -->


        <!-- Gallery Section -->
        <section id="galeri" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <div><span>Check Our</span> <span class="description-title">Gallery</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-1.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-2.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-3.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-4.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-5.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-6.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-7.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="/assets/img/gallery/gallery-8.jpg" class="glightbox" data-gallery="images-gallery">
                                <img src="/assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                </div>

            </div>

        </section><!-- /Gallery Section -->
        
        {{-- <!-- Bagian Testimoni -->
        <section id="testimonials" class="testimonials section dark-background">

            <img src="/assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="Latar belakang testimoni">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            }
          }
        </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="Foto Saul Goodman">
                                <h3>Saul Goodman</h3>
                                <h4>CEO &amp; Pendiri</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Proin iaculis purus consequat sem cura dignissim donec porttitor. Accusantium
                                        quam, ultricies eget id, aliquam eget nibh et. Maecenas aliquam, risus at
                                        semper.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- Akhir item testimoni -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="Foto Sara Wilsson">
                                <h3>Sara Wilsson</h3>
                                <h4>Desainer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Export tempor illum tamen malis quae irure esse labore. Quis cillum quis erat sunt
                                        aliqua fugiat irure anim culpa.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- Akhir item testimoni -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="Foto Jena Karlis">
                                <h3>Jena Karlis</h3>
                                <h4>Pemilik Toko</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Enim nisi quem export duis labore cillum magna enim sint. Quis veniam duis minim
                                        tempor labore.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- Akhir item testimoni -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="Foto Matt Brandon">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Fugiat enim eram quae cillum dolore amet nulla culpa. Velit minim dolor duis
                                        veniam sunt elit.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- Akhir item testimoni -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="Foto John Larson">
                                <h3>John Larson</h3>
                                <h4>Wirausahawan</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Quis sint aliqua sunt veniam culpa labore. Duia noster aute magna sunt elit veniam
                                        sint minim dolore laboris.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- Akhir item testimoni -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section>
        <!-- /Bagian Testimoni --> --}}


        {{-- <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <div><span>Check Our</span> <span class="description-title">Team</span></div>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="pic"><img src="/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="pic"><img src="/assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="pic"><img src="/assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section>
        <!-- /Team Section --> --}}



        {{-- <!-- Faq Section -->
        <section id="faq" class="faq section light-background">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                            <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p>
                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                            <div class="faq-item faq-active">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                                <div class="faq-content">
                                    <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                                        non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                                        purus non.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                        velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                        donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                        cursus turpis massa tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                                <div class="faq-content">
                                    <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                        pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                        Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                        tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="/assets/img/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in"
                            data-aos-delay="100">
                    </div>
                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <div><span>Check Our</span> <span class="description-title">Contact</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section --> --}}

    </main>
@endsection
