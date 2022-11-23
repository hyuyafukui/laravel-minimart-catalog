@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="container w-50 justify-content-center">
        <h1 class="h2 fw-bold text-dark mb-2">Users</h1>


        @forelse ($all_users as $user)
            <div class="card mt-4 mx-auto" style="width: 600px;">
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col">
                            @if ($user->avatar)
                                <img src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}"
                                    class="img-thumbnail d-block mx-auto"
                                    style="width: 250px; height:150px; object-fit:cover;">
                            @else
                                <i class="fa-solid fa-image fa-10x d-block text-center"></i>
                            @endif
                        </div>


                        <div class="col">
                            @if ($user->id == Auth::id())
                                <div class="col text-end">
                                    <a href="{{ route('user.edit') }}" class="fs-4 text-dark"><i
                                            class="fa-solid fa-pen"></i></a>
                                    <i class="fa-solid fa-user text-dark fs-4 ps-2"></i>
                                </div>
                            @else
                                <div class="col text-end">
                                    <i class="fa-solid fa-pen text-muted fs-5"></i>
                                    <a class="fs-5 ms-2 text-muted" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i
                                            class="fa-solid fa-user"></i><i
                                            class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            @endif
                            <h2 class="display-6 mt-2">{{ $user->name }}</h2>
                            <p class="h5 mt-3">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@empty
    <div class="lead text-center">No item to display.</div>
    @endforelse




    </div>

@endsection
