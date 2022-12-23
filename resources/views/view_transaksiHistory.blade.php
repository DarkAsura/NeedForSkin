@extends('template.master')

@section('title', 'Game Account Detail Page')

@section('content')
    <div class="container text-center">
        <div class="card col" style="width 18 rem;">
            @foreach ($tr as $transaksi)
            <h3>Transanction History Details</h3>
            <div class="card-body">
                <p class="card-title">Transaction ID: {{$transaksi->TransaksiID}}</p>
                <img src="{{$transaksi->image}}" class="card-img-top" alt="..." style="height: auto; width: auto; max-width: 300px; max-height: 300px;">
                <p class="card-text">Game Account ID: {{$transaksi->GameAccountID}}</p>
                <p class="card-text">Game Account Name: {{$transaksi->name}}</p>
                <p class="card-text">Game Account Description: {{$transaksi->describes}}</p>
                <p class="card-text">Game Account Price: {{$transaksi->price}}</p>
                <p class="card-text">Payment Method: {{$transaksi->Method}}</p>
                <p class="card-text">Buy From User ID: {{$transaksi->UserID}}</p>
            </div>
            @endforeach
        </div>
    </div>


@endsection

