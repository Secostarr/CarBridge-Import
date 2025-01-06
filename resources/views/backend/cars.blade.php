@extends('backend.layouts.app')
@section('title', 'Dashboard - Cars')
@section('content')

<div class="mt-4 mb-5">
    <h2>Halaman Product Mobil Yang Tersedia</h2>

    <div class="row mt-5">
        <!-- Kolom Kiri -->
        <div class="col-md-6">
            @for ($i = 1; $i <= 3; $i++)
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">Tabel Kiri {{ $i }}</h4>
                    <a href="" class="btn btn-sm btn-primary">+ Add Row</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-link btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-6">
            @for ($i = 1; $i <= 3; $i++)
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">Tabel Kanan {{ $i }}</h4>
                    <a href="" class="btn btn-sm btn-primary">+ Add Row</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-link btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

@endsection