@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container w-50">
        <h2 class="text-success fw-bold">User Edit</h2>

        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            @if ($user->avatar)
                <img src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}"
                    class="img-thumbnail w-100">
            @else
                <i class="fa-solid fa-image fa-10x d-block text-center mt-4"></i>
            @endif
            <input type="file" name="avatar" class="form-control mt-3" aria-describedby="acatar-info">
            <div class="form-text  mb-4" id="avatar-info">
                Acceptable formats: jpeg, jpg, png, gif Only <br>
                Maximun file size: 1048kb
            </div>
            {{-- Error --}}
            @error('avatar')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            <div class="mb-4">
                <label for="name" class="form-label text-muted">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $user->name) }}">
                {{-- Error --}}
                @error('name')
                    <p class="text-danger smalll">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label text-muted">Email Address</label>
                <input type="text" name="email" id="name" class="form-control"
                    value="{{ old('email', $user->email) }}">
                {{-- Error --}}
                @error('name')
                    <p class="text-danger smalll">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-success px-5 fw-bold"><i
                        class="fa-solid fa-check pe-2"></i>Save</button>

                </form>
                <button type="submit" class="btn btn-danger px-5 fw-bold float-end" data-bs-toggle="modal"
                data-bs-target="#delete-user-{{ $user->id }}" ><i
                            class="fa-solid fa-trash-can pe-2"></i>Delete</button>
            </div>
            @include('users.modal.delete')
        </form>
    </div>

@endsection
