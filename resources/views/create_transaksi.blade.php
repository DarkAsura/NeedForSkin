@extends('template.master')

@section('title', 'Create Transaction')

@section('content')
    <div class="d-flex justify-content-md-center my-5 h-100">
        {{-- TODO: Insert method and action here, and don't forget about enctype and csrf --}}
        <form style="width: 60vw" method="post" action="{{ route('Buat Transaksi') }}">
            @csrf
            <h1 class="text-center h1">Transaction Page</h1>
            <input type="hidden" name="user_id" value="{{ $UserID }}">

            <div class="form-group d-none">
                <label for="name" class="form-label">Your name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                       name="asked_by" value="{{-- Asker Name --}}">
                {{-- Input text, name = "name" --}}
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Game Account ID</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Game Account ID"
                       name="GameAccountID">
                {{-- Input text, name = "GameAccountID" --}}
            </div>

            <div class="form-group">
                <label for="subject" class="form-label">Method</label>
                <input type="text" class="form-control" id="Method" placeholder="Enter Method (like Cash, Credit Card, Gopay, OVO etc.)"
                       name="Method">
                {{-- Input text, name = "Method" --}}
            </div>

            <div class="form-group">
                <label for="subject" class="form-label">User ID</label>
                <input type="text" class="form-control" id="subject" placeholder="Enter User ID"
                       name="UserID">
                {{-- Input text, name = "UserID" --}}
            </div>


            {{-- View Session 3 validation and error message --}}
            {{-- TODO: Generate error message if there are any --}}
            <div class="alert alert-danger d-none">
                <ul>
                    @for($i = 0; $i < 3; $i++)
                        <li>Sample Error Message</li>
                    @endfor
                </ul>
            </div>

            <button type="submit" class="btn btn-primary my-3">Pay</button>
        </form>
    </div>
@endsection


