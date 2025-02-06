@extends('backend.layouts.app')
@section('title', 'Dashboard - Contact')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman Contact</h1>

    @if (is_null($contact))
    <div class="mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahContact">
            + Tambah Data
        </button>
    </div>
    @else
    <div class="mt-5">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editContact">
            <i class="fas fa-edit"></i> Edit Data
        </button>
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambahContact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kontak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ Route('backend.contact.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="number" id="phone_number" name="phone_number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="url_github" class="form-label">Url GitHub</label>
                        <input type="url" id="url_github" name="url_github" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="url_instagram" class="form-label">Url Instagram</label>
                        <input type="url" id="url_instagram" name="url_instagram" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@if($contact)
<div class="modal fade" id="editContact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kontak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('backend.contact.update', $contact->id_contact) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ $contact->lokasi }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $contact->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="number" id="phone_number" name="phone_number" class="form-control" value="{{ $contact->phone_number }}">
                    </div>
                    <div class="mb-3">
                        <label for="url_github" class="form-label">Url GitHub</label>
                        <input type="url" id="url_github" name="url_github" class="form-control" value="{{ $contact->url_github }}">
                    </div>
                    <div class="mb-3">
                        <label for="url_instagram" class="form-label">Url Instagram</label>
                        <input type="url" id="url_instagram" name="url_instagram" class="form-control" value="{{ $contact->url_instagram }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

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
</script>

@endsection