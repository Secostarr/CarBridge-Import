@extends('backend.layouts.app')
@section('title', 'Dashboard - Contact')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman Contact</h1>

    @if (is_null($contact))
    <div class="mt-5">
        <button id="addButton" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
    </div>
    @else
    <div class="mt-5">
        <button id="editButton" class="btn btn-warning"><i class="fas fa-edit"></i> Edit Data</button>
    </div>

    <div class="mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title fw-bold mb-0">
                    <i class="fas fa-info-circle"></i> Data Contact yang Ditampilkan
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <!-- Tombol Pemilihan -->
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('lokasi')">
                            <i class="fas fa-map-marker-alt"></i> Lokasi
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('email')">
                            <i class="fas fa-envelope"></i> Email
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('phoneNumber')">
                            <i class="fas fa-phone"></i> Nomor Telepon
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('urlGithub')">
                            <i class="fab fa-github"></i> URL GitHub
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('urlInstagram')">
                            <i class="fab fa-instagram"></i> URL Instagram
                        </button>
                    </div>
                    <div class="col-md-8">
                        <!-- Area Tampilan Data -->
                        <div id="dataContainer" class="p-3 border rounded bg-light">
                            <h5 class="text-center text-muted">Pilih salah satu data untuk ditampilkan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    // Data yang akan ditampilkan
    const data = {
        lokasi: `<p class="text-muted">Alamat lokasi yang terdaftar adalah:</p>
                    <h5 class="text-dark fw-bold">{{ $contact->lokasi ?? 'Data belum tersedia' }}</h5>`,
        email: `<p class="text-muted">Alamat email untuk kontak adalah:</p>
                  <h5 class="text-dark fw-bold">{{ $contact->email ?? 'Data belum tersedia' }}</h5>`,
        phoneNumber: `<p class="text-muted">Nomor telepon untuk kontak adalah:</p>
                     <h5 class="text-dark fw-bold">{{ $contact->phone_number ?? 'Data belum tersedia' }}</h5>`,
        urlGithub: `<p class="text-muted">URL GitHub yang terhubung adalah:</p>
                     <h5 class="text-dark fw-bold">{{ $contact->url_github ?? 'Data belum tersedia' }}</h5>`,
        urlInstagram: `<p class="text-muted">URL Instagram yang terhubung adalah:</p>
                     <h5 class="text-dark fw-bold">{{ $contact->url_instagram ?? 'Data belum tersedia' }}</h5>`,
    };

    // Fungsi untuk menampilkan data
    function showData(key) {
        const container = document.getElementById('dataContainer');
        container.innerHTML = data[key] || '<h5 class="text-center text-danger">Data tidak ditemukan</h5>';
    }

    // Fungsi untuk menampilkan SweetAlert tambah data
    const addButton = document.getElementById('addButton');
    if (addButton) {
        addButton.addEventListener('click', function () {
            swal({
                title: "Tambah Data Contact",
                content: createForm(),
                buttons: ["Batal", "Simpan"],
            }).then((willSave) => {
                if (willSave) {
                    const lokasi = document.getElementById('lokasi').value;
                    const email = document.getElementById('email').value;
                    const phoneNumber = document.getElementById('phone_number').value;
                    const urlGithub = document.getElementById('url_github').value;
                    const urlInstagram = document.getElementById('url_instagram').value;
                    
                    // Simpan data ke server
                    console.log("Data contact ditambahkan:", { lokasi, email, phoneNumber, urlGithub, urlInstagram });
                    swal("Berhasil!", "Data berhasil ditambahkan", "success");
                }
            });
        });
    }

    // Fungsi untuk menampilkan SweetAlert edit data
    const editButton = document.getElementById('editButton');
    if (editButton) {
        editButton.addEventListener('click', function () {
            swal({
                title: "Edit Data Contact",
                content: createForm({
                    lokasi: "{{ $contact->lokasi ?? '' }}",
                    email: "{{ $contact->email ?? '' }}",
                    phoneNumber: "{{ $contact->phone_number ?? '' }}",
                    urlGithub: "{{ $contact->url_github ?? '' }}",
                    urlInstagram: "{{ $contact->url_instagram ?? '' }}"
                }),
                buttons: ["Batal", "Simpan"],
            }).then((willSave) => {
                if (willSave) {
                    const lokasi = document.getElementById('lokasi').value;
                    const email = document.getElementById('email').value;
                    const phoneNumber = document.getElementById('phone_number').value;
                    const urlGithub = document.getElementById('url_github').value;
                    const urlInstagram = document.getElementById('url_instagram').value;
                    
                    // Simpan data yang diperbarui ke server
                    console.log("Data contact diperbarui:", { lokasi, email, phoneNumber, urlGithub, urlInstagram });
                    swal("Berhasil!", "Data berhasil diperbarui", "success");
                }
            });
        });
    }

    // Fungsi untuk membuat form input data
    function createForm(defaults = { lokasi: '', email: '', phoneNumber: '', urlGithub: '', urlInstagram: '' }) {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = `
            <input class="form-control mt-2" placeholder="Lokasi" id="lokasi" value="${defaults.lokasi}">
            <input class="form-control mt-2" placeholder="Email" id="email" value="${defaults.email}">
            <input class="form-control mt-2" placeholder="Nomor Telepon" id="phone_number" value="${defaults.phoneNumber}">
            <input class="form-control mt-2" placeholder="URL GitHub" id="url_github" value="${defaults.urlGithub}">
            <input class="form-control mt-2" placeholder="URL Instagram" id="url_instagram" value="${defaults.urlInstagram}">
        `;
        return wrapper;
    }
</script>

@endsection
