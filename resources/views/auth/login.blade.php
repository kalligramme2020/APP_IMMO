@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
                    <!-- Material form register -->
                    <div class="card mt-4">

                        <h5 class="card-header info-color white-text text-center">
                            <strong>Connexion</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" method="POST" action="{{ route('login') }}">
                            @csrf


                                <!-- E-mail -->
                                <div class="md-form mt-0">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="md-form">
                                    <label for="materialRegisterFormPassword">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                        minimun 8 caractéres
                                    </small>
                                </div>

                                <!-- Phone number -->
                                <div class="form-group ">
                                    <div class="col-md-6 offset-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-2">
{{--                                        <button type="submit" class="btn btn-primary">--}}
{{--                                            {{ __('Login') }}--}}
{{--                                        </button>--}}

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>



                                <!-- Sign up button -->
                                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">{{ __('Connexion') }}</button>

                                <!-- Social register -->
                                <p>or sign up with:</p>

                                <a type="button" class="btn-floating btn-fb btn-sm">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a type="button" class="btn-floating btn-tw btn-sm">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a type="button" class="btn-floating btn-li btn-sm">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a type="button" class="btn-floating btn-git btn-sm">
                                    <i class="fab fa-github"></i>
                                </a>

                                <hr>

                                <!-- Terms of service -->
                                <p>welcome</p>
                            </form>
                            <!-- Form -->
                        </div>
                    </div>
                    <!-- Material form register -->

        </div>
    </div>
</div>
@endsection
