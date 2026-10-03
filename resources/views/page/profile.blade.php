@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white text-center py-4">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('public/img/Screenshot 2026-09-19 150800.png') }}" alt="Foto Mahasiswa" 
                    class="rounded-circle img-thumbnail border border-3 border-primary"
                    style="width: 120px; height: 120px; object-fit: cover;">
                </div>
            </div>
            <h5 class="card-title text-center mt-4">Profile Mahasiswa</h5>
            <span class="badge bg-success">{{ $mahasiswa['status'] }}</span>
        </div>
        <div class="card-body text-center">
            <p class="card-text"><strong>Nama:</strong> {{ $mahasiswa['nama'] }}</p>
            <p class="card-text"><strong>NIM:</strong> {{ $mahasiswa['nim'] }}</p>
            <p class="card-text"><strong>Prodi:</strong> {{ $mahasiswa['prodi'] }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $mahasiswa['email'] }}</p>
            <p class="card-text"><strong>Kampus:</strong> {{ $mahasiswa['kampus'] }}</p>
        </div>
    </div>
</div>
@endsection