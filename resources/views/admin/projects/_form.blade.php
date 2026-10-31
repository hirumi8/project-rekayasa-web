@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <p class="fw-semibold mb-1">Periksa kembali data yang diisi:</p>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $project ? route('projects.update', $project) : route('projects.store') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if ($project)
        @method('PUT')
    @endif

    <div class="row g-3">
        <div class="col-md-6">
            <label for="title" class="form-label">Nama Project</label>
            <input type="text" name="title" id="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $project?->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="teknologi" class="form-label">Teknologi</label>
            <input type="text" name="teknologi" id="teknologi"
                class="form-control @error('teknologi') is-invalid @enderror"
                value="{{ old('teknologi', $project?->teknologi) }}" required>
            @error('teknologi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status"
                class="form-select @error('status') is-invalid @enderror" required>
                <option value="">Pilih Status</option>
                <option value="active" @selected(old('status', $project?->status) === 'active')>Active</option>
                <option value="archived" @selected(old('status', $project?->status) === 'archived')>Archived</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="image" class="form-label">Image</label>
            @if ($project?->image && file_exists(public_path('images/' . $project->image)))
                <div class="mb-2">
                    <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}"
                        class="rounded border" style="width: 64px; height: 64px; object-fit: cover;">
                </div>
            @endif
            <input type="file" name="image" id="image"
                class="form-control @error('image') is-invalid @enderror"
                accept=".jpg,.jpeg,.png,.gif,.svg">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4"
                class="form-control @error('description') is-invalid @enderror"
                required>{{ old('description', $project?->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('projects.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </div>
</form>
