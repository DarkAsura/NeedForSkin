@extends('template.master')

@section('title', 'Register Page')

@section('content')
<div class="container" style="width:400px">
  <form action="{{route('register')}}" method="post">
      @csrf
    <div class="mb-2">
      <h3 class="h3">Register Page</h3>
    </div>
      <div class="mb-2 d-flex flex-column align-items-start">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="name">
      </div>
    <div class="mb-2 d-flex flex-column align-items-start">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-2 d-flex flex-column align-items-start">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="8 - 20 Characters">
    </div>
    <div class="mb-2 d-flex flex-column align-items-start">
      <label for="confirm" class="form-label">Confirm Password</label>
      <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Re-type your password">
    </div>
    <div class="mb-2 form-check d-flex justify-content-start gap-2">
      <input class="form-check-input" type="checkbox" name="terms" value="0" id="terms">
      <label class="form-check-label" for="terms">
        I Agree To The Terms & Conditions.
      </label>
    </div>
    <div class="mb-2">
        @if($errors->any())
      <p class="text-danger">{{$errors->first()}}</p>
        @endif
    </div>
    <div class="mb-2">
      <button type="submit" class="btn btn-light w-100">Register</button>
    </div>
  </form>
  <hr>
  <p class="text-light">Already have an account ? Click <a class="link-light" href="{{route('login')}}">Here</a> to Login.</p>
</div>
@endsection
