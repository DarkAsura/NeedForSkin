@extends("template.master")

@section('title', 'Home Page')

@section('content')

    <div class="container">
        @if(isset($query))
            <h1 class="text-center">Showing results of <b>"{{ $query }}"</b></h1>
        @else
            <h1 class="text-start">Home Page</h1>
        @endif
        <div class="row row-cols-3 justify-content-md-center">
            @foreach($gameAccounts as $a)
            <div class="card col m-3" style="width: 18rem;">
                <img src=" {{$a->image}} " class="card-img-top" alt="..." style="margin-top: 10px">
                <div class="card-body">
                  <h5 class="card-title"> {{$a->name}} </h5>
                  <p class="card-text"> {{$a->describes}} </p>
                  <div class="d-flex justify-content-between">
                    <form action="{{ route('Game Account Page', [$a->GameAccountID]) }}">
                        <button class="btn btn-outline-primary" type="submit">View</button>
                    </form>
                    <form action="{{ route('Buat Transaksi Page') }}">
                        <button class="btn btn-outline-primary" type="submit">Buy</button>
                    </form>
                </div>
            </div>
        </div>
            @endforeach

        <div class="d-flex justify-content-center" style="margin: 2rem">
            {{$gameAccounts->links()}}
        </div>
    </div>

@endsection
