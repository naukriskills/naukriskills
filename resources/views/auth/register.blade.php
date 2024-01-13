@extends('layouts.app')

@section('content')
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Register</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index-1.html">Home</a></li>
                        <li>Register</li>
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
                    <h3>Create Your New Account!</h3>
                    <span>Don't Have an Account? <a href="{{ route('login') }}">Log In!</a></span>
                </div>

                <form method="POST" action="{{ route('register') }}" id="utf-register-account-form">
                    @csrf
                    <div class="utf-account-type">
                        <div>
                            <input type="radio" name="utf-account-type-radio" id="freelancer-radio"
                                class="utf-account-type-radio" value="User" checked />
                            <label for="freelancer-radio" title="Employer" data-tippy-placement="top"
                                class="utf-ripple-effect-dark"><i class="icon-material-outline-business-center"></i>
                                Candidate</label>
                        </div>
                        <div>
                            <input type="radio" name="utf-account-type-radio" id="employer-radio" value="Company" 
                                class="utf-account-type-radio" />
                            <label for="employer-radio" title="Candidate" data-tippy-placement="top"
                                class="utf-ripple-effect-dark"><i class="icon-material-outline-account-circle"></i>
                                Employer</label>
                        </div>
                    </div>
                    <div class="utf-no-border">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="utf-no-border">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>                  
                    <div class="utf-no-border">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="utf-no-border">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                    <div class="checkbox margin-top-10">
                        <input type="checkbox" id="two-step0">
                        <label for="two-step0"><span class="checkbox-icon"></span> I Have Read and Agree to the <a
                                href="#">Terms &amp; Conditions</a></label>
                    </div>
                    <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit"
                        class="btn btn-primary">
                        {{ __('Create An Account') }} <i class="icon-feather-chevron-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection