@extends('layouts.auth')

@section('title','Log in')
@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">{{ __('Login') }}</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class=" input-group mb-3">
            <input placeholder="{{ __('Email Address') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input placeholder="{{ __('Password') }}" id=" password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <div class=" input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }}</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
    </div> -->
    <!-- /.social-auth-links -->


    <p class="mb-1">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            <small>{{ __('Forgot Your Password?') }}</small>
        </a>
        @endif
    </p>
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center"><small>Register a new membership</small></a>
    </p>
</div>
<!-- /.login-card-body -->
@endsection