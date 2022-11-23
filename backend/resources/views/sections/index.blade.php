@extends('layouts.app')

@section('title', 'Sections')

@section('content')
    <div class="container w-50 justify-content-center">
        <h1 class="h2 fw-bold text-warning mb-2">Sections</h1>
        <form action="{{ route('section.store') }}" method="post" class="form-inline">
            @csrf
            <div class="row mb-2">
                <div class="col pe-0">
                    <input type="text" name="name" class="form-control d-inline" placeholder="Add new section here..."
                        value="{{ old('name') }}" autofocus>
                    @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-warning w-100 mx-0 fw-bold"><i
                            class="fa-solid fa-plus pe-2"></i>Add</button>
                </div>
            </div>


        </form>

        <table class="table table-hover table-sm bg-white align-middle text-center mt-3">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($all_sections as $section)
                    <tr>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->name }}</td>
                        <td>
                            <form action="{{ route('section.destroy', $section->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" title="delete"><i
                                        class="fa-solid fa-trash-can text-danger"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="lead text-center">No item to display.</div>
                                    </td>
                                </tr>
                                @endforelse
            </tbody>
            {{-- </form> <- wrong place --}}
        </table>

    </div>


@endsection
