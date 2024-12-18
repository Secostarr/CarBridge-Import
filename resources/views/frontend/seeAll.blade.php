@extends('frontend.layouts.app')
@section('title', 'Home')
@section('konten')

<!-- Masthead -->
<header class="masthead visual-hidden">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center">
        <div class="d-flex flex-column w-100">

            <!-- Dropdown untuk Pilihan Merek Mobil -->
            <div class="container mt-5">
                <select id="carBrand" class="form-select" style="background-color: rgba(255, 255, 255, 0.5); border: none; width: 100%; margin: 10px 0;">
                    <option value="" disabled selected >Pilih Merek Mobil</option>
                    <option value="BMW">BMW</option>
                    <option value="Rolls Royce">Rolls Royce</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                </select>
            </div>

            <!-- Konten Mobil -->
            <div class="container mt-5" id="carContent">
                <p class="text-center text-muted">Silakan pilih merek mobil untuk melihat data.</p>
            </div>

        </div>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#carBrand').on('change', function () {
            let brand = $(this).val(); // Ambil nilai pilihan

            // Kosongkan konten sebelumnya
            $('#carContent').html('<p class="text-center">Memuat data...</p>');

            // Simpan data mentah untuk setiap merek mobil (ganti dengan data Anda nanti)
            let carData = {
                "BMW": `
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.5); border: none; width: 100%; margin: 10px 0;">
                        <h2 class="text-dark">BMW</h2>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-mobil-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                        </div>
                    </div>`,
                "Rolls Royce": `
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.5); border: none; width: 100%; margin: 10px 0;">
                        <h2 class="text-dark">Rolls Royce</h2>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/home-car.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/home-car.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/home-car.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                        </div>
                    </div>`,
                "Mercedes-Benz": `
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.5); border: none; width: 100%; margin: 10px 0;">
                        <h2 class="text-dark">Mercedes-Benz</h2>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="menu">
                                    <img src="{{ asset('assets/img/contoh-1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                                    <h4 class="mt-2">Tipe Mobil</h4>
                                    <p>Harga mobil</p>
                                </div>
                            </div>
                        </div>
                    </div>`
            };

            // Tampilkan konten sesuai pilihan
            if (carData[brand]) {
                $('#carContent').html(carData[brand]);
            } else {
                $('#carContent').html('<p class="text-center text-muted">Data tidak ditemukan.</p>');
            }
        });
    });
</script>

@endsection