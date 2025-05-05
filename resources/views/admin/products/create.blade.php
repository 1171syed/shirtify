@extends('admin.layout')
@push('style')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">    
@endpush


@section('main')
<div class="row mt-4 mb-4 g-4">
    <div class="card mb-4">
        <div class="container">
            <h2>Add New Shirt</h2>

            {{-- Global Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="createForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="name" class="form-label">Shirt Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control d-non @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                    
                    <div id="editor"  style="height: 300px" class="bg-white"></div>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="price" class="form-label">Price (₨)</label>
                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" step="0.01" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="discounted_price" class="form-label">Discounted Price (₨)</label>
                    <input type="number" name="discounted_price" id="discounted_price" class="form-control @error('discounted_price') is-invalid @enderror" step="0.01" value="{{ old('discounted_price') }}">
                    @error('discounted_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', 0) }}" required>
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <select name="size" id="size" class="form-select @error('size') is-invalid @enderror" required>
                        @foreach(['S', 'M', 'L', 'XL'] as $size)
                            <option value="{{ $size }}" {{ old('size') == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                    @error('size')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}">
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="image_path" class="form-label">Shirt Image</label>
                    <input type="file" name="image" id="image_path" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">Add Shirt</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>


<script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });

    document.querySelector("#createForm").addEventListener('submit' , function(e) {
        e.preventDefault();

        const textArea = document.querySelector("#description");

        const html = quill.getSemanticHTML();

        textArea.value = html;

        document.querySelector("#createForm").submit();

    });
  </script>
    
@endpush
@endsection
