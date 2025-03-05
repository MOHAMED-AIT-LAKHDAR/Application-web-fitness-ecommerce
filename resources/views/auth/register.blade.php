@extends('front.master')
@section('title', 'register')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <div class="brand-logo">
                            {{-- <img src="/images/phton1n.png" alt="auth-register-cover" class="platform-bg" /> --}}
                        </div>
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020
                            All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="logo">
                                <img class="logo" src="/images/logoF.png" alt="" srcset="">
                            </div>

                            <h4 class="font-weight-lightX">Register</h4>
                            <form method="POST" action="{{ route('register') }}" class="pt-3">
                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror form-control-lg  border-left-0"
                                            name="name" value="{{ old('name') }}" placeholder="name" required
                                            autocomplete="name" autofocus>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail">Email Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email"
                                            class="form-control form-control-lg border-left-0 @error('email') id-invalide @enderror"
                                            id="exampleInputEmail" name="email" placeholder="Email Address"
                                            value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="fileInput">Choose Picture</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-image-outline text-primary"></i>
                                            </span>
                                        </div>


                                        <input type="file" class="form-control form-control-lg border-left-0"
                                            id="fileInput" name="image">
                                    </div>

                                    @error('image')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password"
                                            class="form-control form-control-lg border-left-0 @error('password') id-invalide @enderror"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="password-confirm" type="password"
                                            class="form-control form-control-lg border-left-0 @error('password_confirmation') id-invalide @enderror"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="confirme password">
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="form-group">
                                    <div class="text-center mt-4 font-weight-light">
                                        you already have account ? <a href="{{ route('login') }}"
                                            class="auth-link text-black" class="text-primary">Sign in</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
