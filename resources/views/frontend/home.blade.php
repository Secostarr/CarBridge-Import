@extends('frontend.layouts.app')
@section('title', 'Home')
@section('konten')

<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">CarBridge</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Menghubungkan Anda dengan Mobil Impian dari Seluruh Dunia.</h2>
            </div>
        </div>
    </div>
</header>

<!-- About -->
<section class="about-section text-center" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center align-items-center">
            <!-- Kolom untuk teks -->
            <div class="col-lg-6">
                <h2 class="text-white mb-4">About Us</h2>
                <p class="text-white-50">
                    Di CarBridge, kami menghubungkan Anda dengan pilihan mobil kelas atas dari seluruh dunia. Sebagai perusahaan impor terkemuka,
                    kami berfokus pada penyediaan kendaraan premium yang memenuhi standar kualitas dan kemewahan terbaik. Dengan pengalaman dan jaringan internasional yang luas,
                    kami menghadirkan mobil impian Anda langsung ke tangan Anda, memberikan kepuasan dalam setiap perjalanan.
                    Kami percaya bahwa mobil bukan hanya alat transportasi, tetapi juga simbol prestise dan gaya hidup. Oleh karena itu,
                    kami berkomitmen untuk menawarkan layanan yang dapat diandalkan, dengan pilihan mobil terbaik dari berbagai merek ternama. Di CarBridge,
                    setiap kendaraan yang kami impor dirancang untuk memenuhi ekspektasi tertinggi pelanggan kami, memberikan pengalaman berkendara yang luar biasa.
                </p>
            </div>
            <!-- Kolom untuk carousel gambar -->
            <div class="col-lg-6">
                <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <img src="assets/img/home-car-2-removebg.png" alt="Car Image 1" class="img-fluid rounded">
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="assets/img/home-car-2-removebg.png" alt="Car Image 2" class="img-fluid rounded">
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="assets/img/home-car-2-removebg.png" alt="Car Image 3" class="img-fluid rounded">
                        </div>
                    </div>
                    <!-- Kontrol Carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Projects-->
<section class="projects-section bg-light" id="projects">
    <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" style="width: 800px; height: 440px; object-fit: cover;" src="assets/img/contoh-1.jpg" alt="..." /></div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>Menghadirkan kualitas terbaik dengan layanan yang dapat diandalkan</h4>
                    <p class="text-black-50 mb-0">Kami memastikan produk yang Anda butuhkan hadir dengan kualitas terjamin. Pilih kami sebagai mitra dalam perjalanan bisnis Anda.</p>
                </div>
            </div>
        </div>
        <!-- Project One Row -->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            <div class="col-lg-6">
                <img class="img-fluid" src="assets/img/home-car-2.jpg" alt="..."
                    style="width: 100%; height: 400px; object-fit: cover;" />
            </div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Produk berkualitas, pengiriman tepat waktu</h4>
                            <p class="mb-0 text-white-50">
                                Dengan pengalaman kami, setiap kebutuhan Anda akan kami penuhi dengan harga kompetitif dan pengiriman yang dapat diandalkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Two Row -->
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6">
                <img class="img-fluid" src="assets/img/contoh-mobil-1.jpg" alt="..."
                    style="width: 100%; height: 400px; object-fit: cover;" />
            </div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Pilih kualitas, pilih kami</h4>
                            <p class="mb-0 text-white-50">
                                Kami hadir untuk memenuhi setiap kebutuhan produk Anda, memberikan layanan import yang memudahkan bisnis Anda berkembang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Cars Slide -->
<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <!-- Carousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" class="d-block w-100" style="width: 800px; height: 440px; object-fit: cover;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>BMW</h5>
                                <p>Explore the finest BMW models.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/home-car.jpg') }}" class="d-block w-100" style="width: 800px; height: 440px; object-fit: cover;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Rolls Royce</h5>
                                <p>Luxury at its finest.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/contoh-1.jpg') }}" class="d-block w-100" style="width: 800px; height: 440px; object-fit: cover;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Mercedes-Benz</h5>
                                <p>Class and performance combined.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- See All Button -->
                <div class="mt-4">
                    <a href="{{ Route('seeAll') }}" class="btn btn-primary">See All</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact-->
<section class="contact-section bg-black">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Address</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Phone</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">+1 (555) 902-8832</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social d-flex justify-content-center">
            <a class="mx-2" href="#!"><i class="fab fa-instagram"></i></a>
            <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
        </div>
    </div>
</section>

@endsection