@extends('auth.template')

@section('page-title')
  Register Page
@endsection

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="/">Indo<b> Scraper</b></a>
  </div>

  <div class="register-box-body">
    <p class="lead login-box-msg">New Account</p>

    <form  method="POST" action="{{ route('register') }}">
      <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <input id="name" type="text" class="form-control" placeholder="Nama lengkap" name="name" value="{{ old('name') }}" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif       
      </div>
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Alamat email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif        
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" name="password"  type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif        
      </div>
      <div class="form-group has-feedback">
        <input id="password-confirm" name="password_confirmation"  type="password" class="form-control" placeholder="Ulangi password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group">        
        
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        
      </div>
    </form>
    
  </div>
</div>
@endsection

