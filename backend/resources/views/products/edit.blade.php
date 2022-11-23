@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <h2 class="text-success fw-bold">Edit Product</h2>

    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}"
                autofocus>
            @error('name')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <div class="input-group">
                <div class="input-group-text">$</div>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ old('price', $product->price) }}" step="any">
            </div>
            @error('price')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="section-id" class="form-label">Section</label>
            <select name="section_id" id="section-id" class="form-select">
                <option selected>Select Section</option>

                {{-- have to appear only selected section --}}
                @foreach ($all_sections as $section)

                    {{-- <option value="{{ $section->id)}}">{{ $section->name }}</option> --}}

                    //Teacher code
                    @if ($section->id == $product->section_id)
                        <option value="{{ $section->id }}" selected>{{ $section->name }}</option>
                    @else
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endif
                    
                @endforeach
            </select>
            @error('section_id')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <a href="{{ route('index') }}" class="btn btn-outline-success">Cancel</a>
        <button type="submit" class="btn btn-success text-white"><i class="fa-solid fa-check pe-2"></i>Save
            Changes</button>
    </form>

@endsection
