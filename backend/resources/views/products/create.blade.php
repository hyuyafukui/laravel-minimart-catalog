@extends('layouts.app')

@section('title', 'New Product')

@section('content')
    <h2 class="text-info fw-bold">New Product</h2>
    <form action="{{ route('product.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus>
        @error('name')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        @error('description')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <div class="input-group">
            <div class="input-group-text">$</div>
          <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" step="any">
        </div>
        @error('price')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label for="section-id" class="form-label">Section</label>
        <select name="section_id" id="section-id" class="form-select">
          <option selected>Select Section</option>
          @foreach ($all_sections as $section)
          <option value="{{ $section->id }}">{{ $section->name }}</option>
          @endforeach
        </select>
        @if ($all_sections->isEmpty())
            <a href="{{ route('section.index') }}" class="small text-decoration-none">Add a new section</a>
        @endif
        @error('section_id')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>

            <a href="{{ route('index') }}" class="btn btn-outline-info">Cancel</a>
            <button type="submit" class="btn btn-info text-white"><i class="fa-solid fa-plus pe-2"></i>Add</button>
    </form>
@endsection