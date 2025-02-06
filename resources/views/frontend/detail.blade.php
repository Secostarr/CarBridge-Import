@extends('frontend.layouts.app')
@section('title', 'Detail Mobil')
@section('konten')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Masthead -->
<header class="masthead" style="background-image: url('{{ asset('storage/' . $home->media_utama) }}');">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center">
        <div class="d-flex flex-column w-100">
            <div class="card" style="background-color: rgba(255, 255, 255, 0.6); border: none; width: 100%; margin: 10px 0;">
                <div class="p-5">
                    <div class="row gx-0 mb-4 mb-lg-5">
                        <h4 class="mb-3">{{ $car->merek }}</h4>
                        <p><strong>Type:</strong> {{ $car->car_type }}</p>
                        <div class="col-lg-6 pe-4">
                            <img class="img-fluid" src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->merek }}" style="width: 100%; height: 440px; object-fit: cover;" />
                            <div class="mt-4 text-center">
                                <p class="mb-1"><strong>Contact Us:</strong></p>
                                <button id="contactBtn" class="btn btn-success" style="font-size: 18px;">
                                    <i class="bi bi-chat-dots px-3"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 ps-4">
                            <div class="featured-text text-center text-lg-left mt-4">
                                <label for=""><strong>Description about car:</strong></label>
                                <p class="text-black mb-0 text-start">
                                    {{ $car->description }}
                                </p>
                                <div class="mt-5">
                                    <h5 class="text-start mb-3"><strong>Spesifikasi :</strong></h5>
                                    <ul class="list-unstyled text-start">
                                        <li class="mb-1"><strong>car engine:</strong> {{ $car->engine }}</li>
                                        <li class="mb-1"><strong>Transmission:</strong> {{ $car->transmission }}</li>
                                        <li class="mb-1"><strong>Passenger capacity:</strong> {{ $car->capacity }}</li>
                                        <li class="mb-1"><strong>Features:</strong> {{ $car->feature }}</li>
                                        <li class="mb-1"><strong>Price:</strong> IDR {{ number_format($car->price, 0, ',', '.') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById("contactBtn").addEventListener("click", async function() {
        const {
            value: formValues
        } = await Swal.fire({
            title: "Hubungi Kami",
            html: '<input id="swal-input-name" class="swal2-input" placeholder="Masukkan Nama Anda">' +
                '<textarea id="swal-input-message" class="swal2-textarea" placeholder="Masukkan Pesan Anda"></textarea>',
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: "Kirim",
            cancelButtonText: "Batal",
            preConfirm: () => {
                const name = document.getElementById("swal-input-name").value;
                const message = document.getElementById("swal-input-message").value;
                if (!name || !message) {
                    Swal.showValidationMessage("Harap isi nama dan pesan!");
                    return null;
                }
                return {
                    name,
                    message
                };
            }
        });

        if (formValues) {
            const {
                name,
                message
            } = formValues;
            const phoneNumber = "6281539323818"; // Ganti dengan nomor WhatsApp tujuan

            // Menghilangkan %0A di antara Nama dan Pesan
            const formattedMessage = `Nama: ${name}\nPesan: ${message}`;

            // URL WhatsApp yang diformat dengan benar (menggunakan \n untuk baris baru)
            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(formattedMessage)}`;

            // Tampilkan konfirmasi sebelum diarahkan ke WhatsApp
            Swal.fire({
                title: "Konfirmasi",
                text: `Apakah Anda yakin ingin mengirim pesan ini ke WhatsApp?`,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Kirim",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan ke WhatsApp
                    window.open(whatsappUrl, "_blank");
                }
            });
        }
    });
</script>

@endsection