@extends('template.master')

@section('title', 'Game Account Detail Page')

@section('content')
    <div class="container text-center">
        <div class="card col" style="width 18 rem;">
            <h3>Transanction History Details</h3>
            <div class="card-body">
                <p class="card-title">Transaction ID: {{$tr->TransaksiID}}</p>
                <p class="card-text">Game Account ID: {{$tr->GameAccountID}}</p>
                <p class="card-text">Payment Method: {{$tr->Method}}</p>
                <p class="card-text">User ID: {{$tr->UserID}}</p>
            </div>
        </div>
    </div>


@endsection

