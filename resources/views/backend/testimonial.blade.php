@extends('backend.layouts.app')
@section('title', 'Dashboard - Testimonial')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container-fluid">
    <h1 class="text-dark fw-bold">Halaman Testimonial</h1>

    @if ($testi->isEmpty() || $testi->count() < 3)
    <div class="mt-5">
        <button id="addButton" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
    </div>
    @endif
    @if (!$testi->isEmpty())
    <div class="mt-5">
        <button id="editButton" class="btn btn-warning"><i class="fas fa-edit"></i> Edit Data</button>
    </div>
    @endif  

    @if (!$testi->isEmpty())    
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
                        @foreach ($testi as $key => $item)
                        <button class="btn btn-outline-secondary w-100 mb-2" onclick="showData('konten{{ $key + 1 }}')">
                            <i class="fas fa-globe"></i> Konten {{ $key + 1 }}
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    // Data yang akan ditampilkan
    const data = {
        @foreach ($testi as $key => $item)
        konten{{ $key + 1 }}: `  
            <p class="text-muted">Konten Testimonial yang digunakan sekarang:</p>
            <h4 class="text-dark fw-bold">Konten Testi : {{ $key + 1 }}</h4>
            <h5 class="text-dark fw-bold">Label : {{ $item->label }}</h5>
            <h5 class="text-dark fw-bold">Konten : {{ $item->konten }}</h5>
        `,
        @endforeach
    };

    // Fungsi untuk menampilkan data
    function showData(key) {
        const container = document.getElementById('dataContainer');
        container.innerHTML = data[key] || '<h5 class="text-center text-danger">Data tidak ditemukan</h5>';
    }

    // Tambah Data
    const addButton = document.getElementById('addButton');
    if (addButton) {
        addButton.addEventListener('click', function () {
            swal({
                title: "Tambah Data Testimonial",
                content: createForm(),
                buttons: ["Batal", "Simpan"],
            }).then((willSave) => {
                if (willSave) {
                    const label = document.getElementById('label').value;
                    const konten = document.getElementById('konten').value;

                    if (!label || !konten) {
                        swal("Gagal!", "Semua field wajib diisi!", "error");
                        return;
                    }

                    console.log("Testimonial ditambahkan:", { label, konten });
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
                title: "Edit Data Testimonial",
                content: createForm({
                    label: "{{ $testi->first()->label ?? '' }}",
                    konten: "{{ $testi->first()->konten ?? '' }}"
                }),
                buttons: ["Batal", "Simpan"],
            }).then((willSave) => {
                if (willSave) {
                    const label = document.getElementById('label').value;
                    const konten = document.getElementById('konten').value;

                    console.log("Testimonial diperbarui:", { label, konten });
                    swal("Berhasil!", "Data berhasil diperbarui", "success");
                }
            });
        });
    }

    function createForm(defaults = { label: '', konten: '' }) {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = `
            <input type="text" class="form-control mt-2" placeholder="Label" id="label" value="${defaults.label}">
            <textarea class="form-control mt-2" placeholder="Konten Testimonial" id="konten">${defaults.konten}</textarea>
        `;
        return wrapper;
    }
</script>

@endsection
