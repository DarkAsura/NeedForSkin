@extends('template.master')

@section('title', 'Game Account Detail Page')

@section('content')
    <div class="container text-center">
        <div class="card col" style="width 18 rem;">
                @foreach ($ga as $gameAccount)
                <div class="card-body">
                    <img src="{{$gameAccount->image}}" class="card-img-top" alt="..." style="height: auto; width: auto; max-width: 300px; max-height: 300px;">
                    <p class="card-title">Game Account ID: {{$gameAccount->GameAccountID}}</p>
                    <p class="card-text">Account Name: {{$gameAccount->name}}</p>
                    <p class="card-text">Game Name: {{ $gameAccount->GameName }}</p>
                    <p class="card-text">{{$gameAccount->describes}}</p>
                    <p class="card-text">Total Payment: {{$gameAccount->price}}</p>
                    <p class="card-text">User Owner: {{$gameAccount->UserID}}</p>
                </div>
                @endforeach
        </div>
    </div>
@endsection

