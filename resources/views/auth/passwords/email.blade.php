@extends('front.master')

@section('title', 'email ')

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
                            <h4>Reset Password</h4>
                            <h6 class="font-weight-light">Enter your email to reset your password</h6>
                            <form method="POST" action="{{ route('password.email') }}" class="pt-3">
                                @csrf


                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control form-control-lg border-left-0"
                                            id="email" name="email" placeholder="Email Address"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    <span class="d-block text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <div class="my-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn flex-grow ms-1">Send
                                        Password Reset Link</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
