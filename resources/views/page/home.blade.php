@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Selamat Datang</h2>
            <p class="text-muted">ini halaman utama web profile mahasiswa Prodi SI UNPAM</p>
            <a href="{{ url('/profile') }}" class="btn btn-primary">Lihat Profile</a>
        </div>
    </div>
</div>
@endsection