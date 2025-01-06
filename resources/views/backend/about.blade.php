@extends('backend.layouts.app')
@section('title', 'Dashboard - About')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman About</h1>

    @if (is_null($about))
    <div class="">
        <button id="addButton" class="btn btn-primary mt-5"><i class="fas fa-plus"></i> Tambah Data</button>
    </div>
    @else
    <div class="">
        <button id="editButton" class="btn btn-warning mt-5"><i class="fas fa-edit"></i> Edit Data</button>
    </div>

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

<script>
    const data = {
        kontenAbout: `<p class="text-muted">Konten about yang digunakan sekarang:</p>
                      <h5 class="text-dark fw-bold">{{ $about->konten ?? 'Data belum ditentukan' }}</h5>`,
        mediaAbout: `<p class="text-muted">Media about yang di tampilkan sekarang adalah:</p>
                     <img src="{{ $about->media_about ?? '' }}" alt="Media About" class="img-fluid">`
    };

    function showData(key) {
        const container = document.getElementById('dataContainer');
        container.innerHTML = data[key] || '<h5 class="text-center text-danger">Data tidak ditemukan</h5>';
    }

    // Tambah Data
    const addButton = document.getElementById('addButton');
    if (addButton) {
        addButton.addEventListener('click', function () {
            swal({
                title: "Tambah Data",
                content: createForm(),
                buttons: ["Batal", "Simpan"],
            }).then((willSave) => {
                if (willSave) {
                    const kontenAbout = document.getElementById('konten_about').value;
                    const mediaAbout = document.getElementById('media_about').files[0];

                    if (!kontenAbout || !mediaAbout) {
                        swal("Gagal!", "Semua field wajib diisi!", "error");
                        return;
                    }

                    console.log("Data ditambahkan:", { kontenAbout, mediaAbout });
                    swal("Berhasil!", "Data berhasil ditambahkan", "success");
                }
            });
        });
    }

    // Edit Data
    const editButton = document.getElementById('editButton');
    if (editButton) {
        editButton.addEventListener('click', function () {
            swal({
                title: "Edit Data",
                content: createForm({
                    kontenAbout: "{{ $about->konten ?? '' }}",
                    mediaAbout: "{{ $about->media_about ?? '' }}"
                }),
                buttons: ["Batal", "Simpan"],
            }).then((willSave) => {
                if (willSave) {
                    const kontenAbout = document.getElementById('konten_about').value;
                    const mediaAbout = document.getElementById('media_about').files[0];

                    console.log("Data diperbarui:", { kontenAbout, mediaAbout });
                    swal("Berhasil!", "Data berhasil diperbarui", "success");
                }
            });
        });
    }

    function createForm(defaults = { kontenAbout: '', mediaAbout: '' }) {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = `
            <textarea class="form-control mt-2" placeholder="Konten About" id="konten_about">${defaults.kontenAbout}</textarea>
            <div class="mt-2">
                <label class="form-label">Media About (Gambar)</label>
                <input type="file" class="form-control" id="media_about" accept="image/*">
                <img src="${defaults.mediaAbout}" alt="Media About" class="img-fluid mt-2" id="previewMedia" style="max-height: 150px;">
            </div>
        `;
        return wrapper;
    }
</script>

@endsection
