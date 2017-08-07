@extends('auth.template')

@section('page-title')
    Setel ulang password
@endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/">Indo<b>responder</b></a>
    </div>
    <div class="login-box-body">
        <p class="lead login-box-msg">Setel ulang Password</p>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" placeholder="Alamat email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif                            
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">                           
                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif                            
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">                            
                <input id="password-confirm" placeholder="Ulangi Password" type="password" class="form-control" name="password_confirmation" required>
                <span class="glyphicon glyphicon-login form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif                           
            </div>

            <div class="form-group">                            
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Setel ulang password
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
