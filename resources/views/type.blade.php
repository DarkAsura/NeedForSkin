@extends('template.master')

@section('title', 'Type Page')

@section('content')
    <div class="container-fluid">
    <h2 class="card-title">{{$type->name}}</h2>
        <div class="categoryDetail">
        <div class="container d-flex">
        @foreach($gameAccounts as $a)
            <div class="card" style="width: 18rem;">
            <img src=" {{$a->image}} " class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"> {{$a->name}} </h5>
                  <p class="card-text"> {{$a->describes}} </p>
                  <div class="d-flex justify-content-between">
                    <form action= "{{ route('Game Account Page', [$a->GameAccountID]) }}">
                        <button class="btn btn-outline-primary" type="submit">View</button>
                    </form>
                    <form action="{{ route('Buat Transaksi Page',[$a->GameAccountID]) }}">
                        <button class="btn btn-outline-primary" type="submit">Buy</button>
                    </form>
                </div>
                </div>
              </div>
            @endforeach
        </div>
        </div>
    </div>
    @endsection
