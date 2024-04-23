@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Selamat datang <b>{{ Auth::user()->name }}</b></p>
    <div class="row">
        {{-- <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data }}</h3>
                    <p>Data Absensi</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-chart-column"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div> --}}
        {{-- <div class="col-lg-4 col-6">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $user }}</h3>
                    <p>Data User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-2">
                <div class="card-title text-center">
                    <h3>VISI DAN MISI</h3>
                </div>
                <div class="card-body">
                    <h5 class="text-start">VISI</h5>
                    <p>Menjadi SMK Unggulan Berbasis Budaya Industri yang Menghasilkan Tamatan Berkarakter, Kompeten,
                        Kompetitif dan Berwawasan Lingkungan</p>
                    <h5 class="text-start">MISI</h5>
                    <ol>
                        <li>Melakukan upaya untuk menjadi SMK Unggulan melalui tata kelola sekolah dengan menerapkan Sistem
                            Penjaminan Mutu Internal (SPMI).</li>
                        <li>Menerapkan budaya industri melalui pembentukan kelas-kelas industri dengan manjalin kemitraan
                            dengan Industri dan Dunia Kerja (IDUKA).</li>
                        <li>Melaksanakan penguatan pendidikan karakter melalui pembiasaan dan pedampingan yang intensif.
                        </li>
                        <li>Melaksanakan pembelajaran yang efektif sesuai dengan standar nasional pendidikan (SNP) dalam
                            pembelajaran teori, praktek di sekolah maupun praktek di IDUKA.</li>
                        <li>Melatih dan membimbing siswa untuk untuk memiliki jiwa wira usaha dan kompeten di bidangnya
                            melalui pembelajaran blok berbasis teaching factory (Tefa)</li>
                        <li>Menyiapkan sumber daya manusia yang mampu berfikir kritiis, kreatif, komunikatif dan kolaboratif
                            berbasis literasi di tingkat lokal, nasional dan internasional memalui kegiatan intra dan ekstra
                            kurikuler.</li>
                        <li>Menyiapkan sumber daya manusia yang berwawasan lingkungan dengan menerapkan kegiatan pembiasaan
                            yang intensif.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts pb-5">
        <div class="row no-gutters">

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
                <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p><strong>Happy Clients</strong> consequuntur quae</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p><strong>Projects</strong> adipisci atque cum quia aut</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="count-box">
                    <i class="bi bi-headset"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="count-box">
                    <i class="bi bi-people"></i>
                    <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p><strong>Hard Workers</strong> rerum asperiores dolor</p>
                </div>
            </div>

        </div>

        </div>
    </section>
    <!-- End Facts Section -->



@stop

@section('footer')
    @include('adminlte::partials.footer.footer')
@stop


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
@stop

@section('js')
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        console.log('Hi!');
    </script>
@stop
