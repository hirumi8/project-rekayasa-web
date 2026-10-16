@extends('layouts.app')

@section('title', 'Detail Project')

@section('content')
<div class="container flex-grow-1">
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 800px;">
        <img src="{{ asset('images/'.Str::replaceLast('.jgp', '.jpg', $project->image)) }}" alt="{{ $project->title }}" class="card-img-top"
            style="max-height: 400px; object-fit: cover;">
        <div class="card-body">
            <h2 class="card-title">{{ $project->title }}</h2>
            <span class="badge bg-success mb-3">{{ $project->status }}</span>
            <p class="card-text">{{ $project->description }}</p>
            <p class="mb-0"><strong>Teknologi:</strong> {{ $project->teknologi }}</p>
        </div>
        <div class="card-footer bg-white border-0">
            <a href="{{ route('project.index') }}" class="btn btn-secondary">Kembali ke Project</a>
        </div>
    </div>
</div>
@endsection