@extends('auth.template')

@section('page-title')
Login Scraper
@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/">Indo<b>Scraper</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg lead">Silakan Login!</p>

    <form method="POST" action="{{ route('login') }}">
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" placeholder="Amalat Email"  id="email" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">        
        
          {{ csrf_field() }}  
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        
      </div>
    </form>

    <div class="form-group text-center">
        <a href="{{route('password.request')}}" class="text-center">Lupa password <i class="fa fa-question-circle"></i></a>
    </div>    

  </div>
</div>                          
@endsection