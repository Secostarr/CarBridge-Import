@extends('backend.layouts.app')
@section('title', 'Dashboard - Testimonial')
@section('content')

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman Testimonial</h1>

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    @if ($testimoni->count() < 3)
    <div class="mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTesti">
            + Tambah Data
        </button>
    </div>
    @endif
    
    @if(!$testimoni->isEmpty())
    <div class="mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title fw-bold mb-0">
                    <i class="fas fa-info-circle"></i> Data Testimonial yang Ditampilkan
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <!-- Tombol Pemilihan -->
                        @foreach($testimoni as $key => $testi)
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('kontenTesti{{ $key + 1 }}')">
                            <i class="fas fa-file-alt"></i> Konten Testimoni {{ $key + 1 }}
                        </button>
                        @endforeach
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
<div class="modal fade" id="tambahTesti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Testimonial</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('backend.testimonial.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="label" class="form-label">Label Testimonial</label>
                        <input type="text" id="label" name="label" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten Testimonial</label>
                        <textarea id="konten" name="konten" class="form-control" rows="3" required></textarea>
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

@if($testimoni)
<!-- Modal Edit -->
<div class="modal fade" id="editTesti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Testimonial</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="label_edit" class="form-label">Label Testimonial</label>
                        <input type="text" id="label_edit" name="label" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="konten_edit" class="form-label">Konten Testimonial</label>
                        <textarea id="konten_edit" name="konten_testi" class="form-control" rows="3" required></textarea>
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
    const data = {
        @foreach($testimoni as $key => $testi)
        kontenTesti{{ $key + 1 }}: `
            <p class="text-muted">Isi testimonial <strong>{{ $key + 1 }}</strong>:</p>
            <h5 class="text-dark fw-bold">Label : {{ $testi->label }}</h5>
            <h5 class="text-dark fw-bold">Konten : {{ $testi->konten }}</h5>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTesti"
                onclick="editData('{{ route('backend.testimonial.update', $testi->id_testimonial) }}', '{{ $testi->label }}', '{{ $testi->konten }}')">
                <i class="fas fa-edit"></i> Edit Data
            </button>`,
        @endforeach
    };

    function showData(key) {
        const container = document.getElementById('dataContainer');
        container.innerHTML = data[key] || '<h5 class="text-center text-danger">Data tidak ditemukan</h5>';
    }

    function editData(url, label, konten) {
        const form = document.querySelector('#editTesti form');
        form.action = url;
        document.getElementById('label_edit').value = label;
        document.getElementById('konten_edit').value = konten;
    }
</script>


@endsection
