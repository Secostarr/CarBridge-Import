@extends('frontend.layouts.app')
@section('title', 'Home')
@section('konten')

<header class="masthead" style="background-image: url('{{ asset('storage/' . $home->media_utama) }}');">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center">
        <div class="d-flex flex-column w-100">
            <!-- Dropdown untuk Pilihan Merek Mobil -->
            <div class="container mt-5">
                <select id="carMerek" class="form-select" style="background-color: rgba(255, 255, 255, 0.5); border: none; width: 100%; margin: 10px 0;">
                    <option value="" disabled selected>Pilih Merek Mobil</option>
                    @foreach($mereks as $merek)
                        <option value="{{ $merek->merek }}">{{ $merek->merek }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Konten Mobil -->
            <div class="container mt-5" id="carContent">
                <p class="text-center">Silakan pilih merek mobil untuk melihat data.</p>
            </div>
        </div>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#carMerek').on('change', function () {
            let merek = $(this).val(); // Ambil nilai pilihan
            $('#carContent').html('<p class="text-center">Memuat data...</p>');

            // AJAX untuk mengambil data berdasarkan merek
            $.ajax({
                url: `{{ url('/getCarsByMerek') }}/${merek}`,
                method: 'GET',
                success: function (data) {
                    if (data.length > 0) {
                        let content = `
                            <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                        `;

                        data.forEach((car, index) => {
                            let isActive = index < 3 ? 'active' : ''; // Tampilkan hanya 3 pertama sebagai slide awal
                            if (index % 3 === 0) content += `<div class="carousel-item ${isActive}"><div class="row g-3">`;
                            content += `
                                <div class="col-md-4">
                                    <a style="color: black; text-decoration: none;" href="/carbridge/item/detail/${car.id_cars}">
                                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.5); border: none;">
                                        <img src="/storage/${car.photo}" style="width: 100%; height: 200px; object-fit: cover;" alt="${car.car_type}">
                                        <h4 class="mt-2">${car.merek}</h4>
                                        <p>Harga: ${car.price}</p>
                                    </div>
                                    </a>
                                </div>
                            `;
                            if ((index + 1) % 3 === 0 || index === data.length - 1) content += `</div></div>`;
                        });

                        content += `
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        `;
                        $('#carContent').html(content);
                    } else {
                        $('#carContent').html('<p class="text-center text-muted">Tidak ada data mobil untuk merek ini.</p>');
                    }
                },
                error: function () {
                    $('#carContent').html('<p class="text-center text-danger">Gagal memuat data.</p>');
                }
            });
        });
    });
</script>


@endsection
