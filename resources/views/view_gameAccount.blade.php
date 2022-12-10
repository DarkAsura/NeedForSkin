@extends('template.master')

@section('title', 'Game Account Detail Page')

@section('content')
    <div class="container text-center">
        <div class="card col" style="width 18 rem;">
            <img src="{{$gameAccount->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-title">Game Account ID: {{$gameAccount->GameAccountID}}</p>
                <p class="card-text">Account Name: {{$gameAccount->name}}</p>
                <p class="card-text">{{$gameAccount->describes}}</p>
                <p class="card-text">Total Payment: {{$gameAccount->price}}</p>
            </div>
        </div>
    </div>


@endsection

