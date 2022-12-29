@extends("template.master")

@section('title', 'Home Page')

@section('content')

    <div class="container">
        @if(Auth::check() &&( Auth::user()->role === 'Member' || Auth::user()->role === 'Admin' ))
        <h2 class="Welcome">Welcome, {{Auth::user()->name}}</h2>
        @endif
        @if(isset($query))
            <h1 class="text-center">Showing results of <b>"{{ $query }}"</b></h1>
        @else
            <h1 class="text-center">Home Page</h1>
        @endif
        <div class="row row-cols-3 justify-content-md-center transparant">
            @foreach($gameAccounts as $a)
            @if (Auth::check() && ( Auth::user()->role === 'Member' || Auth::user()->role === 'Admin' ) && Auth::user()->id === $a->UserID)
            <div class="card" style="width: 18rem;">
                <img src=" {{$a->image}} " class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Game Account Name {{$a->name}} </h5>
                  <p class="card-text"> {{$a->describes}} </p>
                  <p class="card-text">Game Name: {{$a->GameName}} </p>
                  <div class="d-flex justify-content-between card-footer">
                    <form action="{{ route('Game Account Page', [$a->GameAccountID]) }}">
                        <button class="btn btn-outline-primary" type="submit">View</button>
                    </form>
                    <div class="Own-Account">
                        <p>You Own<br>this Account</p>
                    </div>
                    </div>
                </div>
              </div>
            @else
            <div class="card" style="width: 18rem;">
                <img src=" {{$a->image}} " class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Game Account Name: {{$a->name}} </h5>
                    <p class="card-text"> {{$a->describes}} </p>
                    <p class="card-text">Game Name: {{$a->GameName}} </p>
                  <div class="d-flex justify-content-between card-footer">
                    <form action="{{ route('Game Account Page', [$a->GameAccountID]) }}">
                        <button class="btn btn-outline-primary" type="submit">View</button>
                    </form>
                    <form action="{{ route('Buat Transaksi Page',[$a->GameAccountID]) }}">
                        <button class="btn btn-outline-primary" type="submit">Buy</button>
                    </form>
                    </div>
                </div>
              </div>
            @endif
            @endforeach
        </div>

        <div class="d-flex justify-content-center" style="margin: 2rem">
            {{$gameAccounts->links()}}
        </div>
    </div>

@endsection
