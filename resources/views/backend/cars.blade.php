@extends('backend.layouts.app')
@section('title', 'Dashboard - Cars')
@section('content')

<div class="mt-4 mb-5">
    <h2>Available Car Product Page</h2>

    <div class="row mt-5">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong class="">C A R - L I S T</strong></h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCar">+ Add Cars</button>

                    <!-- Tambah Car -->
                    <div class="modal fade" id="addCar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addCarLabel">Tambah Car</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ Route('backend.cars.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Input Merek -->
                                        <div class="mb-3">
                                            <label for="merek" class="form-label">Merek Mobil</label>
                                            <select id="merek" name="merek" class="form-select">
                                                <option value="" selected disabled>Pilih Merek</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Mercedes">Mercedes</option>
                                                <option value="Porsche">Porsche</option>
                                                <option value="Subaru">Subaru</option>
                                                <option value="Toyota">Toyota</option>
                                                <option value="Nissan">Nissan</option>
                                            </select>
                                            @error('merek')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Tipe -->
                                        <div class="mb-3">
                                            <label for="car_type" class="form-label">Tipe Mobil</label>
                                            <input type="text" id="car_type" name="car_type" class="form-control @error('car_type') is-invalid @enderror" placeholder="Masukkan tipe atau seri mobil">
                                            @error('car_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Kategori -->
                                        <div class="mb-3">
                                            <label for="type_of_car" class="form-label">Jenis Mobil</label>
                                            <input type="text" id="type_of_car" name="type_of_car" class="form-control @error('type_of_car') is-invalid @enderror" placeholder="Masukkan jenis mobil (SUV, Coupe, Sedan)">
                                            @error('type_of_car')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Foto -->
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Foto</label>
                                            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" accept=".png,.jpg,.jpeg">
                                            @error('photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Deskripsi -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan deskripsi mobil"></textarea>
                                            @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Mesin -->
                                        <div class="mb-3">
                                            <label for="engine" class="form-label">Mesin</label>
                                            <input type="text" id="engine" name="engine" class="form-control @error('engine') is-invalid @enderror" placeholder="Masukkan jenis mesin">
                                            @error('engine')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Transmisi -->
                                        <div class="mb-3">
                                            <label for="transmission" class="form-label">Transmisi</label>
                                            <select id="transmission" name="transmission" class="form-select @error('transmission') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih jenis transmisi</option>
                                                <option value="Manual">Manual</option>
                                                <option value="Otomatis">Otomatis</option>
                                            </select>
                                            @error('transmission')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Kapasitas -->
                                        <div class="mb-3">
                                            <label for="capacity" class="form-label">Kapasitas</label>
                                            <input type="number" id="capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror" placeholder="Masukkan kapasitas penumpang" min="1">
                                            @error('capacity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Fitur -->
                                        <div class="mb-3">
                                            <label for="feature" class="form-label">Fitur</label>
                                            <textarea id="feature" name="feature" class="form-control @error('feature') is-invalid @enderror" placeholder="Masukkan fitur mobil"></textarea>
                                            @error('feature')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Harga -->
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Harga</label>
                                            <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan harga mobil" min="0">
                                            @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <!-- Input Status -->
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                                <option value="" selected disabled>Pilih Status</option>
                                                <option value="sold">sold</option>
                                                <option value="for_sale">for_sale</option>
                                            </select>
                                            @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
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

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const modalElement = document.getElementById('addCar');
                            const selectMerek = document.getElementById('merek');

                            // Fetch data dari API saat modal dibuka
                            modalElement.addEventListener('show.bs.modal', function() {
                                fetch('/api/car-status')
                                    .then(response => response.json())
                                    .then(carCounts => {
                                        const options = selectMerek.options;

                                        // Reset semua opsi terlebih dahulu
                                        for (let i = 0; i < options.length; i++) {
                                            options[i].disabled = false;
                                        }

                                        // Nonaktifkan opsi yang jumlahnya >= 3
                                        for (let merek in carCounts) {
                                            if (carCounts[merek] >= 3) {
                                                for (let i = 0; i < options.length; i++) {
                                                    if (options[i].value === merek) {
                                                        options[i].disabled = true;
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    })
                                    .catch(error => console.error('Error fetching car status:', error));
                            });

                            // Validasi saat pengguna memilih
                            selectMerek.addEventListener('change', function() {
                                const selectedOption = this.options[this.selectedIndex];
                                if (selectedOption.disabled) {
                                    alert(`Merek ${selectedOption.value} tidak dapat dipilih karena sudah mencapai batas maksimal 3.`);
                                    this.value = ""; // Reset ke default
                                }
                            });
                        });
                    </script>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="line-bmw-tab" data-bs-toggle="pill" href="#line-bmw" role="tab" aria-controls="pills-bmw" aria-selected="true">BMW</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-mercedes-tab" data-bs-toggle="pill" href="#line-mercedes" role="tab" aria-controls="pills-mercedes" aria-selected="false">Mercedes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-porsche-tab" data-bs-toggle="pill" href="#line-porsche" role="tab" aria-controls="pills-porsche" aria-selected="false">Porsche</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-subaru-tab" data-bs-toggle="pill" href="#line-subaru" role="tab" aria-controls="pills-subaru" aria-selected="false">Subaru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-toyota-tab" data-bs-toggle="pill" href="#line-toyota" role="tab" aria-controls="pills-toyota" aria-selected="false">Toyota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-nissan-tab" data-bs-toggle="pill" href="#line-nissan" role="tab" aria-controls="pills-nissan" aria-selected="false">Nissan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade show active" id="line-bmw" role="tabpanel" aria-labelledby="line-bmw-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Car Type</th>
                                                    <th>Type Of Car</th>
                                                    <th>Photo</th>
                                                    <th>Description</th>
                                                    <th>Engine</th>
                                                    <th>Transmission</th>
                                                    <th>Capacity</th>
                                                    <th>Feature</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cars->where('merek', 'BMW') as $car)
                                                <tr>
                                                    <td>{{ $car->car_type }}</td>
                                                    <td>{{ $car->type_of_car }}</td>
                                                    <td><img src="{{ asset('storage/' . $car->photo) }}" alt="Car Photo" width="100"></td>
                                                    <td>{{ $car->description }}</td>
                                                    <td>{{ $car->engine }}</td>
                                                    <td>{{ $car->transmission }}</td>
                                                    <td>{{ $car->capacity }}</td>
                                                    <td>{{ $car->feature }}</td>
                                                    <td>{{ number_format(floatval($car->price), 0, ',', '.') }}</td>
                                                    <td>{{ ucfirst($car->status) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="modal" data-bs-target="#editCar<?= $car->id_cars ?>"
                                                                title="Edit Task"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-id="{{ $car->id_cars }}"
                                                                data-bs-toggle="tooltip"
                                                                title="Remove"
                                                                class="btn btn-link btn-danger delete-button">
                                                                <i class="fa fa-times"></i>
                                                            </button>

                                                        </div>
                                                    </td>
                                                </tr>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    document.querySelectorAll('.delete-button').forEach(button => {
                                                        button.addEventListener('click', function() {
                                                            const itemId = this.getAttribute('data-id');

                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    deleteItem(itemId);
                                                                }
                                                            });
                                                        });
                                                    });

                                                    function deleteItem(id_cars) {
                                                        fetch(`/admin/dashboard/cars/delete/${id_cars}`, {
                                                                method: 'DELETE',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                }
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    Swal.fire({
                                                                        title: "Deleted!",
                                                                        text: "Your item has been deleted.",
                                                                        icon: "success"
                                                                    }).then(() => {
                                                                        location.reload(); // Reload halaman setelah berhasil
                                                                    });
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Error!",
                                                                        text: "Failed to delete the item.",
                                                                        icon: "error"
                                                                    });
                                                                }
                                                            });
                                                    }
                                                </script>


                                                <!-- Edit Car -->
                                                <div class="modal fade" id="editCar<?= $car->id_cars ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addCarLabel">Edit Car</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('backend.cars.update', $car->id_cars) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <!-- Input Merek -->
                                                                    <div class="mb-3">
                                                                        <label for="merek" class="form-label">Merek Mobil</label>
                                                                        <select id="merek" name="merek" class="form-select">
                                                                            <option value="" disabled>Pilih Merek</option>
                                                                            <option value="BMW" {{ $car->merek == 'BMW' ? 'selected' : '' }}>BMW</option>
                                                                            <option value="Mercedes" {{ $car->merek == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                                                                            <option value="Porsche" {{ $car->merek == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                                                            <option value="Subaru" {{ $car->merek == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                                                            <option value="Toyota" {{ $car->merek == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                                                            <option value="Nissan" {{ $car->merek == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Tipe -->
                                                                    <div class="mb-3">
                                                                        <label for="car_type" class="form-label">Tipe Mobil</label>
                                                                        <input type="text" id="car_type" name="car_type" class="form-control" value="{{ $car->car_type }}">
                                                                    </div>
                                                                    <!-- Input Kategori -->
                                                                    <div class="mb-3">
                                                                        <label for="type_of_car" class="form-label">Jenis Mobil</label>
                                                                        <input type="text" id="type_of_car" name="type_of_car" class="form-control" value="{{ $car->type_of_car }}">
                                                                    </div>
                                                                    <!-- Input Foto -->
                                                                    <div class="mb-3">
                                                                        <label for="photo" class="form-label">Foto</label>
                                                                        <input type="file" id="photo" name="photo" class="form-control">
                                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                                    </div>
                                                                    <!-- Input Deskripsi -->
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Deskripsi</label>
                                                                        <textarea id="description" name="description" class="form-control">{{ $car->description }}</textarea>
                                                                    </div>
                                                                    <!-- Input Mesin -->
                                                                    <div class="mb-3">
                                                                        <label for="engine" class="form-label">Mesin</label>
                                                                        <input type="text" id="engine" name="engine" class="form-control" value="{{ $car->engine }}">
                                                                    </div>
                                                                    <!-- Input Transmisi -->
                                                                    <div class="mb-3">
                                                                        <label for="transmission" class="form-label">Transmisi</label>
                                                                        <select id="transmission" name="transmission" class="form-select">
                                                                            <option value="" disabled {{ !$car->transmission ? 'selected' : '' }}>Pilih jenis transmisi</option>
                                                                            <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                                                                            <option value="Otomatis" {{ $car->transmission == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Kapasitas -->
                                                                    <div class="mb-3">
                                                                        <label for="capacity" class="form-label">Kapasitas</label>
                                                                        <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $car->capacity }}">
                                                                    </div>
                                                                    <!-- Input Fitur -->
                                                                    <div class="mb-3">
                                                                        <label for="feature" class="form-label">Fitur</label>
                                                                        <textarea id="feature" name="feature" class="form-control">{{ $car->feature }}</textarea>
                                                                    </div>
                                                                    <!-- Input Harga -->
                                                                    <div class="mb-3">
                                                                        <label for="price" class="form-label">Harga</label>
                                                                        <input type="number" id="price" name="price" class="form-control" value="{{ $car->price }}">
                                                                    </div>
                                                                    <!-- Input Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select id="status" name="status" class="form-select">
                                                                            <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                                                                            <option value="for_sale" {{ $car->status == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                                                        </select>
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
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-mercedes" role="tabpanel" aria-labelledby="line-mercedes-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Car Type</th>
                                                    <th>Type Of Car</th>
                                                    <th>Photo</th>
                                                    <th>Description</th>
                                                    <th>Engine</th>
                                                    <th>Transmission</th>
                                                    <th>Capacity</th>
                                                    <th>Feature</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cars->where('merek', 'Mercedes') as $car)
                                                <tr>
                                                    <td>{{ $car->car_type }}</td>
                                                    <td>{{ $car->type_of_car }}</td>
                                                    <td><img src="{{ asset('storage/' . $car->photo) }}" alt="Car Photo" width="100"></td>
                                                    <td>{{ $car->description }}</td>
                                                    <td>{{ $car->engine }}</td>
                                                    <td>{{ $car->transmission }}</td>
                                                    <td>{{ $car->capacity }}</td>
                                                    <td>{{ $car->feature }}</td>
                                                    <td>{{ number_format(floatval($car->price), 0, ',', '.') }}</td>
                                                    <td>{{ ucfirst($car->status) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="modal" data-bs-target="#editCar<?= $car->id_cars ?>"
                                                                title=" Edit Task"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-id="{{ $car->id_cars }}"
                                                                data-bs-toggle="tooltip"
                                                                title="Remove"
                                                                class="btn btn-link btn-danger delete-button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    document.querySelectorAll('.delete-button').forEach(button => {
                                                        button.addEventListener('click', function() {
                                                            const itemId = this.getAttribute('data-id');

                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    deleteItem(itemId);
                                                                }
                                                            });
                                                        });
                                                    });

                                                    function deleteItem(id_cars) {
                                                        fetch(`/admin/dashboard/cars/delete/${id_cars}`, {
                                                                method: 'DELETE',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                }
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    Swal.fire({
                                                                        title: "Deleted!",
                                                                        text: "Your item has been deleted.",
                                                                        icon: "success"
                                                                    }).then(() => {
                                                                        location.reload(); // Reload halaman setelah berhasil
                                                                    });
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Error!",
                                                                        text: "Failed to delete the item.",
                                                                        icon: "error"
                                                                    });
                                                                }
                                                            });
                                                    }
                                                </script>

                                                <!-- Edit Car -->
                                                <div class="modal fade" id="editCar<?= $car->id_cars ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addCarLabel">Edit Car</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('backend.cars.update', $car->id_cars) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <!-- Input Merek -->
                                                                    <div class="mb-3">
                                                                        <label for="merek" class="form-label">Merek Mobil</label>
                                                                        <select id="merek" name="merek" class="form-select">
                                                                            <option value="" disabled>Pilih Merek</option>
                                                                            <option value="BMW" {{ $car->merek == 'BMW' ? 'selected' : '' }}>BMW</option>
                                                                            <option value="Mercedes" {{ $car->merek == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                                                                            <option value="Porsche" {{ $car->merek == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                                                            <option value="Subaru" {{ $car->merek == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                                                            <option value="Toyota" {{ $car->merek == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                                                            <option value="Nissan" {{ $car->merek == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Tipe -->
                                                                    <div class="mb-3">
                                                                        <label for="car_type" class="form-label">Tipe Mobil</label>
                                                                        <input type="text" id="car_type" name="car_type" class="form-control" value="{{ $car->car_type }}">
                                                                    </div>
                                                                    <!-- Input Kategori -->
                                                                    <div class="mb-3">
                                                                        <label for="type_of_car" class="form-label">Jenis Mobil</label>
                                                                        <input type="text" id="type_of_car" name="type_of_car" class="form-control" value="{{ $car->type_of_car }}">
                                                                    </div>
                                                                    <!-- Input Foto -->
                                                                    <div class="mb-3">
                                                                        <label for="photo" class="form-label">Foto</label>
                                                                        <input type="file" id="photo" name="photo" class="form-control">
                                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                                    </div>
                                                                    <!-- Input Deskripsi -->
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Deskripsi</label>
                                                                        <textarea id="description" name="description" class="form-control">{{ $car->description }}</textarea>
                                                                    </div>
                                                                    <!-- Input Mesin -->
                                                                    <div class="mb-3">
                                                                        <label for="engine" class="form-label">Mesin</label>
                                                                        <input type="text" id="engine" name="engine" class="form-control" value="{{ $car->engine }}">
                                                                    </div>
                                                                    <!-- Input Transmisi -->
                                                                    <div class="mb-3">
                                                                        <label for="transmission" class="form-label">Transmisi</label>
                                                                        <select id="transmission" name="transmission" class="form-select">
                                                                            <option value="" disabled {{ !$car->transmission ? 'selected' : '' }}>Pilih jenis transmisi</option>
                                                                            <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                                                                            <option value="Otomatis" {{ $car->transmission == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Kapasitas -->
                                                                    <div class="mb-3">
                                                                        <label for="capacity" class="form-label">Kapasitas</label>
                                                                        <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $car->capacity }}">
                                                                    </div>
                                                                    <!-- Input Fitur -->
                                                                    <div class="mb-3">
                                                                        <label for="feature" class="form-label">Fitur</label>
                                                                        <textarea id="feature" name="feature" class="form-control">{{ $car->feature }}</textarea>
                                                                    </div>
                                                                    <!-- Input Harga -->
                                                                    <div class="mb-3">
                                                                        <label for="price" class="form-label">Harga</label>
                                                                        <input type="number" id="price" name="price" class="form-control" value="{{ $car->price }}">
                                                                    </div>
                                                                    <!-- Input Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select id="status" name="status" class="form-select">
                                                                            <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                                                                            <option value="for_sale" {{ $car->status == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                                                        </select>
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
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        // Event listener untuk setiap modal edit
                                                        document.querySelectorAll('[id^="editCar"]').forEach(modal => {
                                                            const merekSelect = modal.querySelector('select[name="merek"]');

                                                            modal.addEventListener('show.bs.modal', function() {
                                                                fetch('/api/car-status')
                                                                    .then(response => response.json())
                                                                    .then(data => {
                                                                        // Reset semua opsi
                                                                        Array.from(merekSelect.options).forEach(option => {
                                                                            option.disabled = false;
                                                                        });

                                                                        // Nonaktifkan opsi dengan 3 atau lebih data for_sale
                                                                        for (const [merek, count] of Object.entries(data)) {
                                                                            if (count >= 3 && merekSelect.value !== merek) {
                                                                                const option = Array.from(merekSelect.options).find(opt => opt.value === merek);
                                                                                if (option) option.disabled = true;
                                                                            }
                                                                        }
                                                                    })
                                                                    .catch(error => console.error('Error fetching car status:', error));
                                                            });
                                                        });
                                                    });
                                                </script>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-porsche" role="tabpanel" aria-labelledby="line-porsche-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Car Type</th>
                                                    <th>Type Of Car</th>
                                                    <th>Photo</th>
                                                    <th>Description</th>
                                                    <th>Engine</th>
                                                    <th>Transmission</th>
                                                    <th>Capacity</th>
                                                    <th>Feature</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cars->where('merek', 'Porsche') as $car)
                                                <tr>
                                                    <td>{{ $car->car_type }}</td>
                                                    <td>{{ $car->type_of_car }}</td>
                                                    <td><img src="{{ asset('storage/' . $car->photo) }}" alt="Car Photo" width="100"></td>
                                                    <td>{{ $car->description }}</td>
                                                    <td>{{ $car->engine }}</td>
                                                    <td>{{ $car->transmission }}</td>
                                                    <td>{{ $car->capacity }}</td>
                                                    <td>{{ $car->feature }}</td>
                                                    <td>{{ number_format(floatval($car->price), 0, ',', '.') }}</td>
                                                    <td>{{ ucfirst($car->status) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="modal" data-bs-target="#editCar
                                                                title=" Edit Task"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-id="{{ $car->id_cars }}"
                                                                data-bs-toggle="tooltip"
                                                                title="Remove"
                                                                class="btn btn-link btn-danger delete-button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    document.querySelectorAll('.delete-button').forEach(button => {
                                                        button.addEventListener('click', function() {
                                                            const itemId = this.getAttribute('data-id');

                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    deleteItem(itemId);
                                                                }
                                                            });
                                                        });
                                                    });

                                                    function deleteItem(id_cars) {
                                                        fetch(`/admin/dashboard/cars/delete/${id_cars}`, {
                                                                method: 'DELETE',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                }
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    Swal.fire({
                                                                        title: "Deleted!",
                                                                        text: "Your item has been deleted.",
                                                                        icon: "success"
                                                                    }).then(() => {
                                                                        location.reload(); // Reload halaman setelah berhasil
                                                                    });
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Error!",
                                                                        text: "Failed to delete the item.",
                                                                        icon: "error"
                                                                    });
                                                                }
                                                            });
                                                    }
                                                </script>

                                                <!-- Edit Car -->
                                                <div class="modal fade" id="editCar<?= $car->id_cars ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addCarLabel">Edit Car</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('backend.cars.update', $car->id_cars) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <!-- Input Merek -->
                                                                    <div class="mb-3">
                                                                        <label for="merek" class="form-label">Merek Mobil</label>
                                                                        <select id="merek" name="merek" class="form-select">
                                                                            <option value="" disabled>Pilih Merek</option>
                                                                            <option value="BMW" {{ $car->merek == 'BMW' ? 'selected' : '' }}>BMW</option>
                                                                            <option value="Mercedes" {{ $car->merek == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                                                                            <option value="Porsche" {{ $car->merek == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                                                            <option value="Subaru" {{ $car->merek == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                                                            <option value="Toyota" {{ $car->merek == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                                                            <option value="Nissan" {{ $car->merek == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Tipe -->
                                                                    <div class="mb-3">
                                                                        <label for="car_type" class="form-label">Tipe Mobil</label>
                                                                        <input type="text" id="car_type" name="car_type" class="form-control" value="{{ $car->car_type }}">
                                                                    </div>
                                                                    <!-- Input Kategori -->
                                                                    <div class="mb-3">
                                                                        <label for="type_of_car" class="form-label">Jenis Mobil</label>
                                                                        <input type="text" id="type_of_car" name="type_of_car" class="form-control" value="{{ $car->type_of_car }}">
                                                                    </div>
                                                                    <!-- Input Foto -->
                                                                    <div class="mb-3">
                                                                        <label for="photo" class="form-label">Foto</label>
                                                                        <input type="file" id="photo" name="photo" class="form-control">
                                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                                    </div>
                                                                    <!-- Input Deskripsi -->
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Deskripsi</label>
                                                                        <textarea id="description" name="description" class="form-control">{{ $car->description }}</textarea>
                                                                    </div>
                                                                    <!-- Input Mesin -->
                                                                    <div class="mb-3">
                                                                        <label for="engine" class="form-label">Mesin</label>
                                                                        <input type="text" id="engine" name="engine" class="form-control" value="{{ $car->engine }}">
                                                                    </div>
                                                                    <!-- Input Transmisi -->
                                                                    <div class="mb-3">
                                                                        <label for="transmission" class="form-label">Transmisi</label>
                                                                        <select id="transmission" name="transmission" class="form-select">
                                                                            <option value="" disabled {{ !$car->transmission ? 'selected' : '' }}>Pilih jenis transmisi</option>
                                                                            <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                                                                            <option value="Otomatis" {{ $car->transmission == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Kapasitas -->
                                                                    <div class="mb-3">
                                                                        <label for="capacity" class="form-label">Kapasitas</label>
                                                                        <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $car->capacity }}">
                                                                    </div>
                                                                    <!-- Input Fitur -->
                                                                    <div class="mb-3">
                                                                        <label for="feature" class="form-label">Fitur</label>
                                                                        <textarea id="feature" name="feature" class="form-control">{{ $car->feature }}</textarea>
                                                                    </div>
                                                                    <!-- Input Harga -->
                                                                    <div class="mb-3">
                                                                        <label for="price" class="form-label">Harga</label>
                                                                        <input type="number" id="price" name="price" class="form-control" value="{{ $car->price }}">
                                                                    </div>
                                                                    <!-- Input Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select id="status" name="status" class="form-select">
                                                                            <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                                                                            <option value="for_sale" {{ $car->status == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                                                        </select>
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
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        // Event listener untuk setiap modal edit
                                                        document.querySelectorAll('[id^="editCar"]').forEach(modal => {
                                                            const merekSelect = modal.querySelector('select[name="merek"]');

                                                            modal.addEventListener('show.bs.modal', function() {
                                                                fetch('/api/car-status')
                                                                    .then(response => response.json())
                                                                    .then(data => {
                                                                        // Reset semua opsi
                                                                        Array.from(merekSelect.options).forEach(option => {
                                                                            option.disabled = false;
                                                                        });

                                                                        // Nonaktifkan opsi dengan 3 atau lebih data for_sale
                                                                        for (const [merek, count] of Object.entries(data)) {
                                                                            if (count >= 3 && merekSelect.value !== merek) {
                                                                                const option = Array.from(merekSelect.options).find(opt => opt.value === merek);
                                                                                if (option) option.disabled = true;
                                                                            }
                                                                        }
                                                                    })
                                                                    .catch(error => console.error('Error fetching car status:', error));
                                                            });
                                                        });
                                                    });
                                                </script>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-subaru" role="tabpanel" aria-labelledby="line-subaru-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Car Type</th>
                                                    <th>Type Of Car</th>
                                                    <th>Photo</th>
                                                    <th>Description</th>
                                                    <th>Engine</th>
                                                    <th>Transmission</th>
                                                    <th>Capacity</th>
                                                    <th>Feature</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cars->where('merek', 'Subaru') as $car)
                                                <tr>
                                                    <td>{{ $car->car_type }}</td>
                                                    <td>{{ $car->type_of_car }}</td>
                                                    <td><img src="{{ asset('storage/' . $car->photo) }}" alt="Car Photo" width="100"></td>
                                                    <td>{{ $car->description }}</td>
                                                    <td>{{ $car->engine }}</td>
                                                    <td>{{ $car->transmission }}</td>
                                                    <td>{{ $car->capacity }}</td>
                                                    <td>{{ $car->feature }}</td>
                                                    <td>{{ number_format(floatval($car->price), 0, ',', '.') }}</td>
                                                    <td>{{ ucfirst($car->status) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="modal" data-bs-target="#editCar
                                                                title=" Edit Task"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-id="{{ $car->id_cars }}"
                                                                data-bs-toggle="tooltip"
                                                                title="Remove"
                                                                class="btn btn-link btn-danger delete-button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    document.querySelectorAll('.delete-button').forEach(button => {
                                                        button.addEventListener('click', function() {
                                                            const itemId = this.getAttribute('data-id');

                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    deleteItem(itemId);
                                                                }
                                                            });
                                                        });
                                                    });

                                                    function deleteItem(id_cars) {
                                                        fetch(`/admin/dashboard/cars/delete/${id_cars}`, {
                                                                method: 'DELETE',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                }
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    Swal.fire({
                                                                        title: "Deleted!",
                                                                        text: "Your item has been deleted.",
                                                                        icon: "success"
                                                                    }).then(() => {
                                                                        location.reload(); // Reload halaman setelah berhasil
                                                                    });
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Error!",
                                                                        text: "Failed to delete the item.",
                                                                        icon: "error"
                                                                    });
                                                                }
                                                            });
                                                    }
                                                </script>

                                                <!-- Edit Car -->
                                                <div class="modal fade" id="editCar<?= $car->id_cars ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addCarLabel">Edit Car</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('backend.cars.update', $car->id_cars) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <!-- Input Merek -->
                                                                    <div class="mb-3">
                                                                        <label for="merek" class="form-label">Merek Mobil</label>
                                                                        <select id="merek" name="merek" class="form-select">
                                                                            <option value="" disabled>Pilih Merek</option>
                                                                            <option value="BMW" {{ $car->merek == 'BMW' ? 'selected' : '' }}>BMW</option>
                                                                            <option value="Mercedes" {{ $car->merek == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                                                                            <option value="Porsche" {{ $car->merek == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                                                            <option value="Subaru" {{ $car->merek == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                                                            <option value="Toyota" {{ $car->merek == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                                                            <option value="Nissan" {{ $car->merek == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Tipe -->
                                                                    <div class="mb-3">
                                                                        <label for="car_type" class="form-label">Tipe Mobil</label>
                                                                        <input type="text" id="car_type" name="car_type" class="form-control" value="{{ $car->car_type }}">
                                                                    </div>
                                                                    <!-- Input Kategori -->
                                                                    <div class="mb-3">
                                                                        <label for="type_of_car" class="form-label">Jenis Mobil</label>
                                                                        <input type="text" id="type_of_car" name="type_of_car" class="form-control" value="{{ $car->type_of_car }}">
                                                                    </div>
                                                                    <!-- Input Foto -->
                                                                    <div class="mb-3">
                                                                        <label for="photo" class="form-label">Foto</label>
                                                                        <input type="file" id="photo" name="photo" class="form-control">
                                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                                    </div>
                                                                    <!-- Input Deskripsi -->
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Deskripsi</label>
                                                                        <textarea id="description" name="description" class="form-control">{{ $car->description }}</textarea>
                                                                    </div>
                                                                    <!-- Input Mesin -->
                                                                    <div class="mb-3">
                                                                        <label for="engine" class="form-label">Mesin</label>
                                                                        <input type="text" id="engine" name="engine" class="form-control" value="{{ $car->engine }}">
                                                                    </div>
                                                                    <!-- Input Transmisi -->
                                                                    <div class="mb-3">
                                                                        <label for="transmission" class="form-label">Transmisi</label>
                                                                        <select id="transmission" name="transmission" class="form-select">
                                                                            <option value="" disabled {{ !$car->transmission ? 'selected' : '' }}>Pilih jenis transmisi</option>
                                                                            <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                                                                            <option value="Otomatis" {{ $car->transmission == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Kapasitas -->
                                                                    <div class="mb-3">
                                                                        <label for="capacity" class="form-label">Kapasitas</label>
                                                                        <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $car->capacity }}">
                                                                    </div>
                                                                    <!-- Input Fitur -->
                                                                    <div class="mb-3">
                                                                        <label for="feature" class="form-label">Fitur</label>
                                                                        <textarea id="feature" name="feature" class="form-control">{{ $car->feature }}</textarea>
                                                                    </div>
                                                                    <!-- Input Harga -->
                                                                    <div class="mb-3">
                                                                        <label for="price" class="form-label">Harga</label>
                                                                        <input type="number" id="price" name="price" class="form-control" value="{{ $car->price }}">
                                                                    </div>
                                                                    <!-- Input Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select id="status" name="status" class="form-select">
                                                                            <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                                                                            <option value="for_sale" {{ $car->status == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                                                        </select>
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
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-toyota" role="tabpanel" aria-labelledby="line-toyota-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Car Type</th>
                                                    <th>Type Of Car</th>
                                                    <th>Photo</th>
                                                    <th>Description</th>
                                                    <th>Engine</th>
                                                    <th>Transmission</th>
                                                    <th>Capacity</th>
                                                    <th>Feature</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cars->where('merek', 'Toyota') as $car)
                                                <tr>
                                                    <td>{{ $car->car_type }}</td>
                                                    <td>{{ $car->type_of_car }}</td>
                                                    <td><img src="{{ asset('storage/' . $car->photo) }}" alt="Car Photo" width="100"></td>
                                                    <td>{{ $car->description }}</td>
                                                    <td>{{ $car->engine }}</td>
                                                    <td>{{ $car->transmission }}</td>
                                                    <td>{{ $car->capacity }}</td>
                                                    <td>{{ $car->feature }}</td>
                                                    <td>{{ number_format(floatval($car->price), 0, ',', '.') }}</td>
                                                    <td>{{ ucfirst($car->status) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="modal" data-bs-target="#editCar
                                                                title=" Edit Task"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-id="{{ $car->id_cars }}"
                                                                data-bs-toggle="tooltip"
                                                                title="Remove"
                                                                class="btn btn-link btn-danger delete-button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    document.querySelectorAll('.delete-button').forEach(button => {
                                                        button.addEventListener('click', function() {
                                                            const itemId = this.getAttribute('data-id');

                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    deleteItem(itemId);
                                                                }
                                                            });
                                                        });
                                                    });

                                                    function deleteItem(id_cars) {
                                                        fetch(`/admin/dashboard/cars/delete/${id_cars}`, {
                                                                method: 'DELETE',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                }
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    Swal.fire({
                                                                        title: "Deleted!",
                                                                        text: "Your item has been deleted.",
                                                                        icon: "success"
                                                                    }).then(() => {
                                                                        location.reload(); // Reload halaman setelah berhasil
                                                                    });
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Error!",
                                                                        text: "Failed to delete the item.",
                                                                        icon: "error"
                                                                    });
                                                                }
                                                            });
                                                    }
                                                </script>

                                                <!-- Edit Car -->
                                                <div class="modal fade" id="editCar<?= $car->id_cars ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addCarLabel">Edit Car</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('backend.cars.update', $car->id_cars) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <!-- Input Merek -->
                                                                    <div class="mb-3">
                                                                        <label for="merek" class="form-label">Merek Mobil</label>
                                                                        <select id="merek" name="merek" class="form-select">
                                                                            <option value="" disabled>Pilih Merek</option>
                                                                            <option value="BMW" {{ $car->merek == 'BMW' ? 'selected' : '' }}>BMW</option>
                                                                            <option value="Mercedes" {{ $car->merek == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                                                                            <option value="Porsche" {{ $car->merek == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                                                            <option value="Subaru" {{ $car->merek == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                                                            <option value="Toyota" {{ $car->merek == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                                                            <option value="Nissan" {{ $car->merek == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Tipe -->
                                                                    <div class="mb-3">
                                                                        <label for="car_type" class="form-label">Tipe Mobil</label>
                                                                        <input type="text" id="car_type" name="car_type" class="form-control" value="{{ $car->car_type }}">
                                                                    </div>
                                                                    <!-- Input Kategori -->
                                                                    <div class="mb-3">
                                                                        <label for="type_of_car" class="form-label">Jenis Mobil</label>
                                                                        <input type="text" id="type_of_car" name="type_of_car" class="form-control" value="{{ $car->type_of_car }}">
                                                                    </div>
                                                                    <!-- Input Foto -->
                                                                    <div class="mb-3">
                                                                        <label for="photo" class="form-label">Foto</label>
                                                                        <input type="file" id="photo" name="photo" class="form-control">
                                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                                    </div>
                                                                    <!-- Input Deskripsi -->
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Deskripsi</label>
                                                                        <textarea id="description" name="description" class="form-control">{{ $car->description }}</textarea>
                                                                    </div>
                                                                    <!-- Input Mesin -->
                                                                    <div class="mb-3">
                                                                        <label for="engine" class="form-label">Mesin</label>
                                                                        <input type="text" id="engine" name="engine" class="form-control" value="{{ $car->engine }}">
                                                                    </div>
                                                                    <!-- Input Transmisi -->
                                                                    <div class="mb-3">
                                                                        <label for="transmission" class="form-label">Transmisi</label>
                                                                        <select id="transmission" name="transmission" class="form-select">
                                                                            <option value="" disabled {{ !$car->transmission ? 'selected' : '' }}>Pilih jenis transmisi</option>
                                                                            <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                                                                            <option value="Otomatis" {{ $car->transmission == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Kapasitas -->
                                                                    <div class="mb-3">
                                                                        <label for="capacity" class="form-label">Kapasitas</label>
                                                                        <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $car->capacity }}">
                                                                    </div>
                                                                    <!-- Input Fitur -->
                                                                    <div class="mb-3">
                                                                        <label for="feature" class="form-label">Fitur</label>
                                                                        <textarea id="feature" name="feature" class="form-control">{{ $car->feature }}</textarea>
                                                                    </div>
                                                                    <!-- Input Harga -->
                                                                    <div class="mb-3">
                                                                        <label for="price" class="form-label">Harga</label>
                                                                        <input type="number" id="price" name="price" class="form-control" value="{{ $car->price }}">
                                                                    </div>
                                                                    <!-- Input Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select id="status" name="status" class="form-select">
                                                                            <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                                                                            <option value="for_sale" {{ $car->status == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                                                        </select>
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
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-nissan" role="tabpanel" aria-labelledby="line-nissan-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Car Type</th>
                                                    <th>Type Of Car</th>
                                                    <th>Photo</th>
                                                    <th>Description</th>
                                                    <th>Engine</th>
                                                    <th>Transmission</th>
                                                    <th>Capacity</th>
                                                    <th>Feature</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cars->where('merek', 'Nissan') as $car)
                                                <tr>
                                                    <td>{{ $car->car_type }}</td>
                                                    <td>{{ $car->type_of_car }}</td>
                                                    <td><img src="{{ asset('storage/' . $car->photo) }}" alt="Car Photo" width="100"></td>
                                                    <td>{{ $car->description }}</td>
                                                    <td>{{ $car->engine }}</td>
                                                    <td>{{ $car->transmission }}</td>
                                                    <td>{{ $car->capacity }}</td>
                                                    <td>{{ $car->feature }}</td>
                                                    <td>{{ number_format(floatval($car->price), 0, ',', '.') }}</td>
                                                    <td>{{ ucfirst($car->status) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="modal" data-bs-target="#editCar
                                                                title=" Edit Task"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-id="{{ $car->id_cars }}"
                                                                data-bs-toggle="tooltip"
                                                                title="Remove"
                                                                class="btn btn-link btn-danger delete-button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    document.querySelectorAll('.delete-button').forEach(button => {
                                                        button.addEventListener('click', function() {
                                                            const itemId = this.getAttribute('data-id');

                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    deleteItem(itemId);
                                                                }
                                                            });
                                                        });
                                                    });

                                                    function deleteItem(id_cars) {
                                                        fetch(`/admin/dashboard/cars/delete/${id_cars}`, {
                                                                method: 'DELETE',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                }
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    Swal.fire({
                                                                        title: "Deleted!",
                                                                        text: "Your item has been deleted.",
                                                                        icon: "success"
                                                                    }).then(() => {
                                                                        location.reload(); // Reload halaman setelah berhasil
                                                                    });
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Error!",
                                                                        text: "Failed to delete the item.",
                                                                        icon: "error"
                                                                    });
                                                                }
                                                            });
                                                    }
                                                </script>

                                                <!-- Edit Car -->
                                                <div class="modal fade" id="editCar<?= $car->id_cars ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addCarLabel">Edit Car</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('backend.cars.update', $car->id_cars) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <!-- Input Merek -->
                                                                    <div class="mb-3">
                                                                        <label for="merek" class="form-label">Merek Mobil</label>
                                                                        <select id="merek" name="merek" class="form-select">
                                                                            <option value="" disabled>Pilih Merek</option>
                                                                            <option value="BMW" {{ $car->merek == 'BMW' ? 'selected' : '' }}>BMW</option>
                                                                            <option value="Mercedes" {{ $car->merek == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                                                                            <option value="Porsche" {{ $car->merek == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                                                            <option value="Subaru" {{ $car->merek == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                                                            <option value="Toyota" {{ $car->merek == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                                                            <option value="Nissan" {{ $car->merek == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Tipe -->
                                                                    <div class="mb-3">
                                                                        <label for="car_type" class="form-label">Tipe Mobil</label>
                                                                        <input type="text" id="car_type" name="car_type" class="form-control" value="{{ $car->car_type }}">
                                                                    </div>
                                                                    <!-- Input Kategori -->
                                                                    <div class="mb-3">
                                                                        <label for="type_of_car" class="form-label">Jenis Mobil</label>
                                                                        <input type="text" id="type_of_car" name="type_of_car" class="form-control" value="{{ $car->type_of_car }}">
                                                                    </div>
                                                                    <!-- Input Foto -->
                                                                    <div class="mb-3">
                                                                        <label for="photo" class="form-label">Foto</label>
                                                                        <input type="file" id="photo" name="photo" class="form-control">
                                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                                    </div>
                                                                    <!-- Input Deskripsi -->
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Deskripsi</label>
                                                                        <textarea id="description" name="description" class="form-control">{{ $car->description }}</textarea>
                                                                    </div>
                                                                    <!-- Input Mesin -->
                                                                    <div class="mb-3">
                                                                        <label for="engine" class="form-label">Mesin</label>
                                                                        <input type="text" id="engine" name="engine" class="form-control" value="{{ $car->engine }}">
                                                                    </div>
                                                                    <!-- Input Transmisi -->
                                                                    <div class="mb-3">
                                                                        <label for="transmission" class="form-label">Transmisi</label>
                                                                        <select id="transmission" name="transmission" class="form-select">
                                                                            <option value="" disabled {{ !$car->transmission ? 'selected' : '' }}>Pilih jenis transmisi</option>
                                                                            <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                                                                            <option value="Otomatis" {{ $car->transmission == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Input Kapasitas -->
                                                                    <div class="mb-3">
                                                                        <label for="capacity" class="form-label">Kapasitas</label>
                                                                        <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $car->capacity }}">
                                                                    </div>
                                                                    <!-- Input Fitur -->
                                                                    <div class="mb-3">
                                                                        <label for="feature" class="form-label">Fitur</label>
                                                                        <textarea id="feature" name="feature" class="form-control">{{ $car->feature }}</textarea>
                                                                    </div>
                                                                    <!-- Input Harga -->
                                                                    <div class="mb-3">
                                                                        <label for="price" class="form-label">Harga</label>
                                                                        <input type="number" id="price" name="price" class="form-control" value="{{ $car->price }}">
                                                                    </div>
                                                                    <!-- Input Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select id="status" name="status" class="form-select">
                                                                            <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                                                                            <option value="for_sale" {{ $car->status == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                                                        </select>
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
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function() {
            $("#add-row")
                .dataTable()
                .fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action,
                ]);
            $("#addRowModal").modal("hide");
        });
    });
</script>

@endsection