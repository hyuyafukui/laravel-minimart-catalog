@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container justify-content-center">
        <div class="row">
            <div class="col">
                <h1 class="h2 text-info fw-bold ">Products</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('product.create') }}" class="btn btn-info text-end fw-bold text-white"><i
                        class="fa-solid fa-plus pe-2"></i>New Product</a>
            </div>
        </div>

        <table class="table table-hover bg-white align-middle text-center mt-3">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>SECTION</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($all_products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td class="fw-bold">{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        {{-- If the section of the product is NULL, display Uncategorized --}}
                        <td class="text-secondary">{{ $product->section ? $product->section->name : 'Uncategorized' }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn"><i
                                        class="fa-solid fa-pen text-secondary"></i></a>
                                {{-- <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE') --}}
                                <button type="submit" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#delete-product-{{ $product->id }}"><i
                                        class="fa-solid fa-trash-can text-danger"></i></button>
                                {{-- </form> --}}
                            </div>
                        </td>
                    </tr>
                    @include('products.modal.delete')

                @empty
                    <tr>
                        <td colspan="6">
                            <div class="lead text-center">No item to display.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
