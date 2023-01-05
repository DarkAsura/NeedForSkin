@extends('template.master')

@section('title', 'Create Account')

@section('content')

<div class="d-flex justify-content-md-center my-5 h-100">
    {{-- TODO: Insert method and action here, and don't forget about enctype and csrf --}}
    <form style="width: 60vw" method="post" action="{{ route('Buat Game Account Logic') }}">
        @csrf
        <h1 class="text-center h1">Create Account</h1>
        <input type="hidden" name="user_id" value="{{Auth::user()->id }}">

        <div class="form-group">
            <label for="name" class="form-label">Game Account Name</label>
            <input type="text" class="form-control" id="name" placeholder="Your game name"
                   name="name" value="">
        </div>

        <div class="form-group">
            <label for="subject" class="form-label">Game Type</label>
            <select class="form-select" id="subject" required name="GameType">
              <option selected disabled value="">Choose...</option>
              <option value="1">Valorant</option>
              <option value="2">Genshin Impact</option>
              <option value="3">DOTA 2</option>
              <option value="4">CSGO</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid Game Type.
              </div>
        </div>

        <div class="form-group">
            <label for="title" class="form-label">Description</label>
            <input type="text" class="form-control" id="title" placeholder="Enter game account description"
                   name="describes" value="">
        </div>

        <div class="form-group">
            <label for="title" class="form-label">Price</label>
            <input type="number" class="form-control" id="title" placeholder="Enter game account price"
                   name="price" value="">
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <button type="submit" class="btn btn-primary my-3">Create</button>
    </form>
</div>

@endsection
