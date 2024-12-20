@extends('frontend.layouts.app')
@section('title', 'Detail Mobil')
@section('konten')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Masthead -->
<header class="masthead visual-hidden">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center">
        <div class="d-flex flex-column w-100">
            <!-- Slider -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card p-2 text-center" style="background-color: rgba(255, 255, 255, 0.7); border: none; width: 100%; margin: 10px 0;">
                        <h3>Testimoni dari yang sudah menggunakan jasa kami.</h3>
                    </div>
                </div>
            </div>
            <div id="mobilCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mobilCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#mobilCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#mobilCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#mobilCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>

                <!-- Carousel Items -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.6); border: none; width: 100%; margin: 10px 0;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" class="img-fluid rounded" alt="Foto Mobil" style="width: 100%; height: 400px; object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h3 class="card-title">Brand 1 - Type 1</h3>
                                        <h4 class="card-title">Merek mobil</h4>
                                        <h3 class="card-text mt-5"><strong>Spesifikasi:</strong></h3>
                                        <ul style="font-size: 1.2rem;" class="list-unstyled">
                                            <li class="mb-1">Mesin: 2000cc</li>
                                            <li class="mb-1">Transmisi: Automatic</li>
                                            <li class="mb-1">Bahan Bakar: Bensin</li>
                                            <li class="mb-1">Kapasitas Penumpang: 5</li>
                                        </ul>
                                    </div>
                                    <div class="ms-4">
                                        <button class="btn btn-success mb-2" disabled>TERJUAL !!!</button>
                                        <h6><strong>Rp.</strong>2.200.000.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.6); border: none; width: 100%; margin: 10px 0;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/img/home-car-2.jpg') }}" class="img-fluid rounded" alt="Foto Mobil" style="width: 100%; height: 400px; object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h3 class="card-title">Brand 2 - Type 2</h3>
                                        <h4 class="card-title">Merek mobil</h4>
                                        <h3 class="card-text mt-5"><strong>Spesifikasi:</strong></h3>
                                        <ul style="font-size: 1.2rem;" class="list-unstyled">
                                            <li class="mb-1">Mesin: 1500cc</li>
                                            <li class="mb-1">Transmisi: Manual</li>
                                            <li class="mb-1">Bahan Bakar: Solar</li>
                                            <li class="mb-1">Kapasitas Penumpang: 7</li>
                                        </ul>
                                    </div>
                                    <div class="ms-4">
                                        <button class="btn btn-success" disabled>TERJUAL !!!</button>
                                        <h6><strong>Rp.</strong>2.100.000.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.6); border: none; width: 100%; margin: 10px 0;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/img/home-car.jpg') }}" class="img-fluid rounded" alt="Foto Mobil" style="width: 100%; height: 400px; object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h3 class="card-title">Brand 3 - Type 3</h3>
                                        <h4 class="card-title">Merek mobil</h4>
                                        <h3 class="card-text mt-5"><strong>Spesifikasi:</strong></h3>
                                        <ul style="font-size: 1.2rem;" class="list-unstyled">
                                            <li class="mb-1">Mesin: 1500cc</li>
                                            <li class="mb-1">Transmisi: Manual</li>
                                            <li class="mb-1">Bahan Bakar: Solar</li>
                                            <li class="mb-1">Kapasitas Penumpang: 7</li>
                                        </ul>
                                    </div>
                                    <div class="ms-4">
                                        <button class="btn btn-success" disabled>TERJUAL !!!</button>
                                        <h6><strong>Rp.</strong>2.300.000.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.6); border: none; width: 100%; margin: 10px 0;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/img/contoh-1.jpg') }}" class="img-fluid rounded" alt="Foto Mobil" style="width: 100%; height: 400px; object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h3 class="card-title">Brand 4 - Type 4</h3>
                                        <h4 class="card-title">Merek mobil</h4>
                                        <h3 class="card-text mt-5"><strong>Spesifikasi:</strong></h3>
                                        <ul style="font-size: 1.2rem;" class="list-unstyled">
                                            <li class="mb-1">Mesin: 1500cc</li>
                                            <li class="mb-1">Transmisi: Manual</li>
                                            <li class="mb-1">Bahan Bakar: Solar</li>
                                            <li class="mb-1">Kapasitas Penumpang: 7</li>
                                        </ul>
                                    </div>
                                    <div class="ms-4">
                                        <button class="btn btn-success" disabled>TERJUAL !!!</button>
                                        <h6><strong>Rp.</strong>2.800.000.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#mobilCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mobilCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
