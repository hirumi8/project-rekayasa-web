@extends('layouts.admin')

@section('title', 'Data Projects')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <h1 class="h4 mb-0">Data Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Tambah Project</a>
</div>

@if (session('success'))
    <div class="alert alert-success" role="status">{{ session('success') }}</div>
@endif

<section class="card border-0 shadow-sm">
    <div class="card-body p-3 p-lg-4">
        <form action="{{ route('projects.index') }}" method="GET" class="row g-3 align-items-end mb-3">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <label for="per_page" class="form-label">Entries per page</label>
                <select name="per_page" id="per_page" class="form-select">
                    @foreach ([10, 25, 50, 100] as $option)
                        <option value="{{ $option }}" @selected($perPage === $option)>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 ms-md-auto">
                <label for="search" class="form-label">Search</label>
                <div class="input-group">
                    <input type="search" name="search" id="search" class="form-control"
                        value="{{ $search }}" placeholder="Cari project...">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-sm btn-outline-primary" type="submit">Tampilkan</button>
                @if ($search !== '' || $perPage !== 10)
                    <a href="{{ route('projects.index') }}" class="btn btn-sm btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Teknologi</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td class="text-center">{{ $projects->firstItem() + $loop->index }}</td>
                            <td>
                                @if ($project->image && file_exists(public_path('images/' . $project->image)))
                                    <img src="{{ asset('images/' . $project->image) }}"
                                        alt="{{ $project->title }}"
                                        class="rounded border"
                                        style="width: 64px; height: 64px; object-fit: cover;">
                                @else
                                    <span class="text-secondary small">No image</span>
                                @endif
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->teknologi }}</td>
                            <td style="min-width: 220px;">{{ $project->description }}</td>
                            <td>{{ $project->status }}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <a href="{{ route('projects.edit', $project) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                        onsubmit="return confirm('Hapus project ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-secondary">
                                @if ($search !== '')
                                    Tidak ada project yang cocok dengan pencarian "{{ $search }}".
                                @else
                                    Belum ada project.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3">
            <small class="text-secondary">
                Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }}
                of {{ $projects->total() }} entries
            </small>
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection
