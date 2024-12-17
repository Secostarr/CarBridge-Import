@extends('frontend.layouts.app')
@section('title', 'Home')
@section('konten')

<style>
    select#carBrand {
        position: relative;
        z-index: 1050; /* Pastikan angka ini lebih besar dari navbar */
        transition: none; /* Menonaktifkan transisi untuk dropdown */
    }

    #carContent {
        margin-top: 20px; /* Memberikan jarak antara dropdown dan konten */
    }
</style>

<!-- Masthead -->
<header class="masthead visual-hidden">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center">
        <div class="d-flex flex-column w-100">

        

        </div>
    </div>
</header>

@endsection
