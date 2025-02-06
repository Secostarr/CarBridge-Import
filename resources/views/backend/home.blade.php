@extends('backend.layouts.app')
@section('title', 'Dashboard - Home')
@section('content')

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman Home</h1>

    @if (is_null($home))
    <div class="mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahHome">
            + Tambah Data
        </button>
    </div>
    @else
    <div class="mt-5">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editHome">
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
                    <i class="fas fa-info-circle"></i> Data home yang Ditampilkan
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('namaSitus')">
                            <i class="fas fa-globe"></i> Nama Situs
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('selogan')">
                            <i class="fas fa-quote-right"></i> Selogan
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('mediaUtama')">
                            <i class="fas fa-image"></i> Media Utama
                        </button>
                    </div>
                    <div class="col-md-8">
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
<div class="modal fade" id="tambahHome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Home</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.home.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_situs" class="form-label">Nama Situs</label>
                        <input type="text" id="nama_situs" name="nama_situs" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="selogan" class="form-label">Selogan situs</label>
                        <input type="text" id="selogan" name="selogan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="media_utama" class="form-label">Media_utama</label>
                        <input type="file" id="media_utama" name="media_utama" class="form-control">
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

@if($home)
<!-- Modal Edit -->
<div class="modal fade" id="editHome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Home</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.home.update', $home->id_home) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_situs" class="form-label">Nama Situs</label>
                        <input type="text" id="nama_situs" name="nama_situs" class="form-control" value="{{ $home->nama_situs }}">
                    </div>
                    <div class="mb-3">
                        <label for="selogan" class="form-label">Selogan situs</label>
                        <input type="text" id="selogan" name="selogan" class="form-control" value="{{ $home->selogan }}">
                    </div>
                    <div class="mb-3">
                        <label for="media_utama" class="form-label">Media Utama</label>
                        @if(isset($home->media_utama))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $home->media_utama) }}" alt="Media Utama" class="img-fluid" style="max-width: 100px; height: auto;">
                        </div>
                        @endif
                        <input type="file" id="media_utama" name="media_utama" class="form-control">
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
        max-width: 100%; /* Gambar tidak akan melebihi lebar container */
        height: auto;   /* Proporsi gambar tetap terjaga */
        max-height: 400px; /* Tetapkan tinggi maksimum agar tidak terlalu besar */
        object-fit: contain; /* Pastikan gambar tidak terdistorsi */
    }
</style>

<script>
    const data = {
        namaSitus: `<p class="text-muted">Nama website yang digunakan sekarang adalah:</p>
                    <h5 class="text-dark fw-bold">{{ $home->nama_situs ?? 'Data belum ditentukan' }}</h5>`,
        selogan: `<p class="text-muted">Selogan website yang sekarang digunakan adalah:</p>
                  <h5 class="text-dark fw-bold">{{ $home->selogan ?? 'Data belum ditentukan' }}</h5>`,
        mediaUtama: `<p class="text-muted">Media utama yang sekarang digunakan adalah:</p>
                    @if(isset($home) && $home->media_utama)
                        <img src="{{ asset('storage/' . $home->media_utama) }}" alt="Media Utama" class="img-fluid">
                    @else
                        <p>No media available.</p>
                    @endif
                    `
    };

    function showData(key) {
        const container = document.getElementById('dataContainer');
        container.innerHTML = data[key] || '<h5 class="text-center text-danger">Data tidak ditemukan</h5>';
    }
</script>

@endsection