@extends('template.master')

@section('title', "View User Profile")

{{-- from $user --}}
@section('content')
    <div class="container mt-5">
        <h1 class="h1 text-center"> {{ $user->name }} </h1>
        <h2 class="h2 text-center"> {{ $user->Email }} </h2>

        <div class="row row-cols-3 justify-content-md-center">
            @foreach($user->gameAccounts as $ga)
                <div class="card col m-1" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $ga->name }} </h5>
                        <h6 class="card-subtitle mb-2 text-muted"> {{ $ga->GameAccountID }}</h6>
                        <p class="card-text text-truncate"> {{ $ga->describes }} </p>
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('Game Account Page', [$ga->GameAccountID]) }}">
                                <button class="btn btn-outline-primary" type="submit">View</button>
                            </form>
                        </div>
                        <form action="{{ route('Edit Transaction Page', [$ga->id]) }}">
                            <button class="btn btn-outline-primary" type="submit">Edit</button>
                        </form>

                        <form method="post" action="{{route('Delete Transaction', [$ga->id])}}">
                            @csrf
                            @method('deleteTransaction')
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<!-- $table->id("UserID");
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->timestamps(); -->

            <!-- $table->id('GameAccountID');
            $table->foreignId("UserID")->references('UserID')->on('users');
            $table->string('name');
            $table->string('image');
            $table->string('describes');
            $table->integer('price');
            $table->timestamps(); -->

