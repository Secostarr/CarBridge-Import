@extends('backend.layouts.app')
@section('title', 'Dashboard - About')
@section('content')

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman About</h1>

    @if (is_null($about))
    <div class="mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAbout">
            + Tambah Data
        </button>
    </div>
    @else
    <div class="mt-5">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAbout">
            <i class="fas fa-edit"></i> Edit Data
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <div class="mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title fw-bold mb-0">
                    <i class="fas fa-info-circle"></i> Data About yang Ditampilkan
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <!-- Tombol Pemilihan -->
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('kontenAbout')">
                            <i class="fas fa-file-alt"></i> Konten About
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('mediaAbout')">
                            <i class="fas fa-image"></i> Media About
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

<!-- tambah data -->
<div class="modal fade" id="tambahAbout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah About</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('backend.about.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten About</label>
                        <textarea id="konten" name="konten" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="media_about" class="form-label">Media About (Disarankan tidak memiliki background)</label>
                        <input type="file" id="media_about" name="media_about" class="form-control">
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

@if($about)
<!-- Modal Edit -->
<div class="modal fade" id="editAbout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit About</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.about.update', $about->id_about) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten About</label>
                        <textarea id="konten" name="konten" class="form-control" rows="5">{{ $about->konten }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="media_utama" class="form-label">Media Utama (Disarankan tidak memiliki background)</label>
                        @if(isset($about->media_about))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $about->media_about) }}" alt="Media About" class="img-fluid" style="max-width: 100px; height: auto;">
                        </div>
                        @endif
                        <input type="file" id="media_about" name="media_about" class="form-control">
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

<style>
    .img-fluid {
        max-width: 100%;
        /* Gambar tidak akan melebihi lebar container */
        height: auto;
        /* Proporsi gambar tetap terjaga */
        max-height: 400px;
        /* Tetapkan tinggi maksimum agar tidak terlalu besar */
        object-fit: contain;
        /* Pastikan gambar tidak terdistorsi */
    }
</style>

<script>
    const data = {
        kontenAbout: `<p class="text-muted">Konten about yang digunakan sekarang:</p>
                  <h5 class="text-dark fw-bold">{{ $about->konten ?? 'Data belum ditentukan' }}</h5>`,
        mediaAbout: `<p class="text-muted">Media about yang di tampilkan sekarang adalah:</p>
                 @if(isset($about) && $about->media_about)
                    <img src="{{ asset('storage/' . $about->media_about) }}" alt="Media Utama" class="img-fluid">
                 @else
                    <p>No media available.</p>  
                 @endif`
    };


    function showData(key) {
        const container = document.getElementById('dataContainer');
        container.innerHTML = data[key] || '<h5 class="text-center text-danger">Data tidak ditemukan</h5>';
    }
</script>

@endsection