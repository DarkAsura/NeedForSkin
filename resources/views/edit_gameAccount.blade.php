@extends('template.master')

@section('title', 'Update Account')

@section('content')

<div class="d-flex justify-content-md-center my-5 h-100">
    {{-- TODO: Insert method and action here, and don't forget about enctype and csrf --}}
    <form style="width: 60vw" method="post" action="{{ route('Edit Game Account', $ga->GameAccountID) }}">
        @csrf
        {{ method_field('PUT') }}

        <h1 class="text-center h1">Update Account</h1>
        <input type="hidden" name="user_id" value="{{Auth::user()->id }}">

        <div class="form-group">
            <label for="name" class="form-label">Game Account Name</label>
            <input type="text" class="form-control" id="name" placeholder="Your game name"
                   name="name" value="{{ $ga->name }}">
        </div>

        @if($ga->image === 'https://drive.google.com/thumbnail?id=1lLAsBFzOGSTNtnjcuoLWVvpOv59kpluY')
            <div class="form-group">
                <label for="subject" class="form-label">Game Type</label>
                <select class="form-select" id="subject" required name="GameType">
                  <option selected disabled value="">Choose...</option>
                  <option value="1" selected>Valorant</option>
                  <option value="2">Genshin Impact</option>
                  <option value="3">DOTA 2</option>
                  <option value="4">CSGO</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid Game Type.
                  </div>
            </div>
        @elseif($ga->image === 'https://drive.google.com/thumbnail?id=13iynboeEGsz3H5SjYTkrmRhIo6P146zB')
            <div class="form-group">
                <label for="subject" class="form-label">Game Type</label>
                <select class="form-select" id="subject" required name="GameType">
                  <option selected disabled value="">Choose...</option>
                  <option value="1">Valorant</option>
                  <option value="2"selected>Genshin Impact</option>
                  <option value="3">DOTA 2</option>
                  <option value="4">CSGO</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid Game Type.
                  </div>
            </div>
        @elseif($ga->image == 'https://drive.google.com/thumbnail?id=1IbgX7_8dPuDisxjfk5EEqPV6dncAI-s3')
            <div class="form-group">
                <label for="subject" class="form-label">Game Type</label>
                <select class="form-select" id="subject" required name="GameType">
                  <option selected disabled value="">Choose...</option>
                  <option value="1">Valorant</option>
                  <option value="2">Genshin Impact</option>
                  <option value="3" selected>DOTA 2</option>
                  <option value="4">CSGO</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid Game Type.
                  </div>
            </div>
        @elseif ($ga->image == 'https://drive.google.com/thumbnail?id=1S9vWjzfP6L-zXa3gyAPIM3DIC-jtzt3k')
            <div class="form-group">
                <label for="subject" class="form-label">Game Type</label>
                <select class="form-select" id="subject" required name="GameType">
                  <option selected disabled value="">Choose...</option>
                  <option value="1">Valorant</option>
                  <option value="2">Genshin Impact</option>
                  <option value="3">DOTA 2</option>
                  <option value="4" selected>CSGO</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid Game Type.
                  </div>
            </div>
        @else
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
        @endif

        <div class="form-group">
            <label for="title" class="form-label">Description</label>
            <input type="text" class="form-control" id="title" placeholder="Enter game account description"
                   name="describes" value="{{ $ga->describes }}">
        </div>

        <div class="form-group">
            <label for="title" class="form-label">Price</label>
            <input type="number" class="form-control" id="title" placeholder="Enter game account price"
                   name="price" value="{{ $ga->price }}">
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

        <button type="submit" class="btn btn-primary my-3">Update</button>
    </form>
</div>

@endsection
