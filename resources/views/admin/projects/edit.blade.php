@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<section class="card border-0 shadow-sm mx-auto" style="max-width: 900px;">
    <div class="card-body p-4">
        <h1 class="h4 mb-3">Edit Project</h1>
        @include('admin.projects._form', ['project' => $project])
    </div>
</section>
@endsection
