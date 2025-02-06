@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')

<div>
    <h3 class="fw-bold mb-3">Dashboard</h3>
    <h6 class="op-7 mb-2">Halo Selamat datang, <strong>{{ Auth::user()->nama }}</strong> di dashboard admin</h6>
    <hr style="height: 5px; background-color: black; border: none; margin-top: 50px;">
</div>

<div>
    <div>
        <p class="fw-bold mb-3">Usefull link for admin :</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ Route('admin.dashboard.home') }}" class="btn btn-primary">Home</a>
        <a href="{{ Route('admin.dashboard.about') }}" class="btn btn-secondary">About</a>
        <a href="{{ Route('admin.dashboard.testi') }}" class="btn btn-warning">Testimonial</a>
        <a href="{{ Route('admin.dashboard.contact') }}" class="btn btn-success">Contact</a>
        <a href="{{ Route('admin.dashboard.cars') }}" class="btn btn-danger">Konten Cars</a>
    </div>
    <hr style="height: 5px; background-color: black; border: none; margin-top: 50px;">
</div>

@endsection