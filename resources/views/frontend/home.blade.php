@extends('frontend.layouts.app')
@section('title', 'Home')
@section('konten')

<!-- Masthead-->
<header class="masthead" style="background-image: url('{{ asset('storage/' . $home->media_utama) }}');">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">{{ $home->nama_situs ?? 'belum di tentukan' }}</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">{{ $home->selogan ?? 'belum di tentukan' }}</h2>
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
                <p class="text-white-50">{{ $about->konten ?? 'belum di tentukan' }}</p>
            </div>
            <!-- Kolom untuk carousel gambar -->
            <div class="col-lg-6">
                <div class="carousel-item active">
                <img src="{{ asset('storage/' . $about->media_about) }}" alt="Car Image 1" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Testimonial-->
<section class="projects-section bg-light" id="Testimonial">
    <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" style="width: 800px; height: 440px; object-fit: cover;" src="assets/img/contoh-1.jpg" alt="..." /></div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>{{ $firstTestimoni->label ?? 'belum di tentukan' }}</h4>
                    <p class="text-black-50 mb-0">{{ $firstTestimoni->konten ?? 'belum di tentukan' }}</p>
                </div>
                <!-- Kami memastikan produk yang Anda butuhkan hadir dengan kualitas terjamin. Pilih kami sebagai mitra dalam perjalanan bisnis Anda. -->
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
                            <h4 class="text-white">{{ $secondTestimoni->label ?? 'belum di tentukan' }}</h4>
                            <p class="mb-0 text-white-50">
                                {{ $secondTestimoni->konten ?? 'belum di tentukan' }}
                                <!-- Dengan pengalaman kami, setiap kebutuhan Anda akan kami penuhi dengan harga kompetitif dan pengiriman yang dapat diandalkan. -->
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
                            <h4 class="text-white">{{ $thirdTestimoni->label ?? 'belum di tentukan' }}</h4>
                            <p class="mb-0 text-white-50">
                                {{ $thirdTestimoni->konten ?? 'belum di tentukan' }}
                                <!-- Kami hadir untuk memenuhi setiap kebutuhan produk Anda, memberikan layanan import yang memudahkan bisnis Anda berkembang. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 justify-content-center">
            <a href="{{ Route('testimoni') }}" class="btn btn-primary">See All Testimonial</a>
        </div>

    </div>
</section>

@php
// Jika tidak ada data, tampilkan placeholder
if ($randomCars->isEmpty()) {
    $randomCars = collect([
        (object) ['merek' => 'Default Car', 'car_type' => 'Sedan', 'image' => 'default.jpg']
    ]);
}
@endphp

<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <!-- Carousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($randomCars as $index => $car)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $index }}"
                            class="{{ $loop->first ? 'active' : '' }}"
                            aria-current="{{ $loop->first ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($randomCars as $index => $car)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $car->photo) }}"
                                class="d-block w-100"
                                style="width: 800px; height: 440px; object-fit: cover;"
                                alt="{{ $car->merek }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $car->merek }}</h5>
                                <p>{{ $car->car_type }}</p>
                            </div>
                        </div>
                        @endforeach
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
                    <a href="{{ route('seeAll') }}" class="btn btn-primary">See All</a>
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
                        <div class="text-black-50">{{ $contact->lokasi ?? 'Lokasi belum di tentukan' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="text-black-50"><a href="#!">{{ $contact->email ?? 'Email belum di tentukan' }}</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Phone</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="text-black-50">{{ $contact->phone_number ?? 'Phone number belum di tentukan' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social d-flex justify-content-center">
            <a class="mx-2" href="{{ $contact->url_instagram ?? '' }}"><i class="fab fa-instagram"></i></a>
            <a class="mx-2" href="{{ $contact->url_github ?? '' }}"><i class="fab fa-github"></i></a>
        </div>
    </div>
</section>

@endsection