@extends('auth.template')

@section('page-title')
    Setel Ulang Password
@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/">Indo<b> Scraper</b></a>
  </div>
  <div class="login-box-body">
    <p class="lead login-box-msg">Setel ulang Password</p>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="post" action="{{ route('password.email') }}">
    {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" placeholder="Alamat email" class="form-control" name="email" value="{{ old('email') }}" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                Kirim tautan setel ulang password! 
            </button>            
        </div>   

    </form>                 
@endsection