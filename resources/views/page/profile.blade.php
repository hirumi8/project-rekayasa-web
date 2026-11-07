@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white text-center py-3">
                    <div class="d-flex justify-content-center mb-2">
                        <img src="{{ asset('img/Screenshot 2026-09-19 150800.png') }}" alt="Foto Mahasiswa"
                            class="rounded-circle img-thumbnail border border-3 border-primary"
                            style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                    <h5 class="card-title mb-3">Profile Mahasiswa</h5>
                    <span class="badge bg-success">{{ $mahasiswa['status'] }}</span>
                </div>
                <div class="card-body text-center py-2">
                    <p class="card-text mb-2"><strong>Nama:</strong> {{ $mahasiswa['nama'] }}</p>
                    <p class="card-text mb-2"><strong>NIM:</strong> {{ $mahasiswa['nim'] }}</p>
                    <p class="card-text mb-2"><strong>Prodi:</strong> {{ $mahasiswa['prodi'] }}</p>
                    <p class="card-text mb-2"><strong>Email:</strong> {{ $mahasiswa['email'] }}</p>
                    <p class="card-text mb-0"><strong>Kampus:</strong> {{ $mahasiswa['kampus'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection