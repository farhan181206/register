@extends('layouts.custom')

@section('title','Verify')

@section('content')
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="login-brand">
        <img src="/stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
      </div>

      <div class="card card-primary">
        <div class="card-header"><h4>Verify Page</h4></div>

        <div class="card-body">
          <form method="POST" action="{{route('verify.process')}}" class="needs-validation" novalidate="">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="otp">Masukkan Otp</label>
              <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" tabindex="1" required autofocus>
              @error('otp')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Verifikasi My Number
              </button>
            </div>
        </form>
        <div class="form-group">
            <form action="{{route('resend')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="phone" value="{{$user->phone}}">  
                <button type="submit" class="btn btn-warning btn-lg btn-block" tabindex="4">
                    Kirim Ulang Token
                  </button>
            </form>
          </div>

        </div>
      </div>
      <div class="simple-footer">
        Copyright &copy; Stisla 2018
      </div>
    </div>
  </div>
@endsection