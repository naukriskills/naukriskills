@extends('layouts.app')

@section('content')
 <!-- Titlebar -->
 <div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{__('Log In')}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ route('user/dashboard') }}">{{ __('Dashboard') }}</a></li>
              <li>{{ __("Log In") }}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-xl-6 offset-xl-3">
        <div class="utf-login-register-page-aera margin-bottom-50"> 
          <div class="utf-welcome-text-item">
            <h3>Welcome Back Sign in to Continue</h3>
            <span>Don't Have an Account? <a href="{{ route('register') }}">{{ __('Sign Up!') }}</a></span> 
		  </div>
          <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf          
            <div class="utf-no-border">
             <input id="email" type="email" class="form-control utf-with-border @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>             
             @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="utf-no-border">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
			<div class="checkbox margin-top-10">			
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
				
			</div>
            @if (Route::has('password.request'))
                                    <a class="btn btn-link forgot-password" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif        
          </form>
          <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">{{ __('Login') }} <i class="icon-feather-chevron-right"></i></button>
          <div class="utf-social-login-separator-item"><span>Or Login in With</span></div>
          <div class="utf-social-login-buttons-block">
            <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Facebook</button>
			<button class="google-login ripple-effect"><i class="icon-brand-google"></i> Google+</button>
			<button class="twitter-login ripple-effect"><i class="icon-brand-twitter"></i> Twitter</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
