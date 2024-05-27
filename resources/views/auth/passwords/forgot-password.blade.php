@extends('layouts.custom')

@section('title','Verify')

@section('content')
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="login-brand">
        <img src="/stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
      </div>

      <div class="card card-primary">
        <div class="card-header"><h4>Forgot Password Page</h4></div>

        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card-body">
          <form method="POST" action="{{route('forgot.password.post')}}" class="needs-validation" novalidate="">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="email">Masukkan Email</label>
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
              @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Send Password Reset Link
              </button>
            </div>
        </form>
        </div>
      </div>
      <div class="simple-footer">
        Copyright &copy; Stisla 2018
      </div>
    </div>
  </div>
@endsection