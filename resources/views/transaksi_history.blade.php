@extends("template.master")

@section('title', 'Transaction History Page')

@section('content')

    <div class="container">
        @if(isset($query))
            <h1 class="text-center">Showing results of <b>"{{ $query }}"</b></h1>
        @else
            <h1 class="text-center">Transaction History</h1>
        @endif
        <div class="row row-cols-3 justify-content-md-center">
            @foreach($transaksi as $tr)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"> Transaction ID: {{$tr->TransaksiID}} </h5>
                  <p class="card-text"> Game Account ID {{$tr->GameAccountID}} </p>
                  <p class="card-text"> Method: {{$tr->Method}} </p>
                  <div class="d-flex justify-content-between">
                    <form action="{{ route('View Transaksi History', [$tr->TransaksiID]) }}">
                        <button class="btn btn-outline-primary" type="submit">View Details</button>
                    </form>
                </div>
                </div>
              </div>
            @endforeach
        </div>

        {{-- <div class="d-flex justify-content-center" style="margin: 2rem">
            {{$transaksi->links()}}
        </div> --}}
    </div>

@endsection

<!-- $table->id('TransaksiID');
            $table->foreignId('GameAccountID')->references('GameAccountID')->on('game_accounts');
            $table->string('Method');
            $table->foreignId('UserID')->references('UserID')->on("users");
            $table->timestamps(); -->
