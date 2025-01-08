@extends('backend.layouts.app')
@section('title', 'Dashboard - Home')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman Home</h1>

    @if (is_null($home))
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

    // Tambah Data
    addButton.addEventListener('click', function() {
        swal({
            title: "Tambah Data",
            content: createForm(),
            buttons: ["Batal", "Simpan"],
        }).then((willSave) => {
            if (willSave) {
                const namaSitus = document.getElementById('nama_situs').value;
                const selogan = document.getElementById('selogan').value;
                const mediaUtama = document.getElementById('media_utama').files[0];

                if (!namaSitus || !selogan || !mediaUtama) {
                    swal("Gagal!", "Semua field wajib diisi!", "error");
                    return;
                }

                const formData = new FormData();
                formData.append('nama_situs', namaSitus);
                formData.append('selogan', selogan);
                formData.append('media_utama', mediaUtama);

                fetch('{{ route("admin.home.store") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        swal("Berhasil!", data.message, "success").then(() => {
                            location.reload(); // Refresh halaman setelah berhasil
                        });
                    })
                    .catch((error) => {
                        swal("Gagal!", "Terjadi kesalahan saat menambahkan data", "error");
                        console.error(error);
                    });
            }
        });
    });

    // Edit Data
    editButton.addEventListener('click', function() {
        swal({
            title: "Edit Data",
            content: createForm({
                namaSitus: "{{ $home->nama_situs ?? '' }}",
                selogan: "{{ $home->selogan ?? '' }}",
                mediaUtama: "{{ asset('storage/' . $home->media_utama ?? '') }}",
            }),
            buttons: ["Batal", "Simpan"],
        }).then((willSave) => {
            if (willSave) {
                const namaSitus = document.getElementById('nama_situs').value;
                const selogan = document.getElementById('selogan').value;
                const mediaUtama = document.getElementById('media_utama').files[0];

                const formData = new FormData();
                formData.append('nama_situs', namaSitus);
                formData.append('selogan', selogan);
                if (mediaUtama) {
                    formData.append('media_utama', mediaUtama);
                }

                fetch('{{ route("admin.home.update", $home->id ?? 0) }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'X-HTTP-Method-Override': 'PUT', // Override method to PUT
                        },
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        swal("Berhasil!", data.message, "success").then(() => {
                            location.reload(); // Refresh halaman setelah berhasil
                        });
                    })
                    .catch((error) => {
                        swal("Gagal!", "Terjadi kesalahan saat memperbarui data", "error");
                        console.error(error);
                    });
            }
        });
    });


    function createForm(defaults = {
        namaSitus: '',
        selogan: '',
        mediaUtama: ''
    }) {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = `
            <input class="form-control mt-2" placeholder="Nama Situs" id="nama_situs" value="${defaults.namaSitus}">
            <input class="form-control mt-2" placeholder="Selogan" id="selogan" value="${defaults.selogan}">
            <div class="mt-2">
                <label class="form-label">Media Utama (Gambar)</label>
                <input type="file" class="form-control" id="media_utama" accept="image/*">
                <img src="${defaults.mediaUtama}" alt="Media Utama" class="img-fluid mt-2" id="previewMedia" style="max-height: 150px;">
            </div>
        `;
        return wrapper;
    }
</script>

@endsection