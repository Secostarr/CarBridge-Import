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
                    @foreach ($mobilTerjual as $key => $car)
                        <button type="button" data-bs-target="#mobilCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>

                <!-- Carousel Items -->
                <div class="carousel-inner">
                    @foreach ($mobilTerjual as $key => $car)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.6); border: none; width: 100%; margin: 10px 0;">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('assets/img/' . $car->image) }}" class="img-fluid rounded" alt="Foto Mobil" style="width: 100%; height: 400px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $car->merek }} - {{ $car->car_type }}</h3>
                                            <h4 class="card-title">{{ $car->make }}</h4>
                                            <h3 class="card-text mt-5"><strong>Spesifikasi:</strong></h3>
                                            <ul style="font-size: 1.2rem;" class="list-unstyled">
                                                <li class="mb-1">Mesin: {{ $car->engine }}</li>
                                                <li class="mb-1">Transmisi: {{ $car->transmission }}</li>
                                                <li class="mb-1">Kapasitas Penumpang: {{ $car->capacity }}</li>
                                            </ul>
                                        </div>
                                        <div class="ms-4">
                                            <button class="btn btn-success mb-2" disabled>TERJUAL !!!</button>
                                            <h6><strong>Rp.</strong>{{ $car->price }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
