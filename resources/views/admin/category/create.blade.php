
@extends('admin.layout')

@section('main')

<form  id="createForm" action="{{ route('cat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Title --}}
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    {{-- Slug --}}
    <div class="mb-3">
        <label for="slug" class="form-label">Slug:</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    

    {{-- Submit --}}
    <button type="submit" class="btn btn-primary">Submit Post</button>
</form>

@endsection