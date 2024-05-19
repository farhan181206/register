@extends('layouts.custom')

@section('title','Register Page')

@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="login-brand">
      <img src="/stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
    </div>

    <div class="card card-primary">
      <div class="card-header"><h4>Register</h4></div>

      <div class="card-body">
        <form action="{{route('register.process')}}" method="POST">
          @csrf
          @method('POST')
          <div class="form-group">
              <label for="name">Name</label>
              <input id="name" type="text"
                  class="form-control"
                  name="name" autofocus>
          </div>
          
          
          <div class="row">
              <div class="form-group col-6">
                  <label for="email">Email</label>
                  <input id="email" type="email"
                      class="form-control"
                      name="email">
              </div>
              <div class="form-group col-6">
                  <label for="phone" class="d-block">Number HP</label>
                  <input id="phone" type="text" class="form-control"
                      name="phone">
              </div>
          </div>

          <div class="row">
              <div class="form-group col-6">
                  <label for="password" class="d-block">Password</label>
                  <input id="password" type="password"
                      class="form-control"
                      name="password">
              </div>
              <div class="form-group col-6">
                  <label for="password_confirmation" class="d-block">Password Confirmation</label>
                  <input id="password_confirmation" type="password" class="form-control"
                      name="password_confirmation">
              </div>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Register
              </button>
          </div>
      </form>
      </div>
    </div>
    <div class="simple-footer">
      Copyright &copy; Stisla 2018
    </div>
  </div>
@endsection