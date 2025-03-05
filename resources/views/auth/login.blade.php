@extends('front.master')
@section('title', 'Login')
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
                    <div class="col-lg-6 d-flex align-items-center justify-content-center" >
                        <div class="auth-form-transparent text-left p-3">
                        <div class="logo">
                        <img  class="logo" src="/images/logoF.png" alt="" srcset="">
                        </div>
                            <h4>Welcome back</h4>
                            <h6 class="font-weight-light">Happy to see you again!</h6>
                            <form method="POST" action="{{ route('login') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control form-control-lg border-left-0"
                                            id="exampleInputEmail" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="remember">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="my-3">
                                    <button type="submit" class="btn btn-block  btn-primary btn-lg font-weight-medium auth-form-btn  flex-grow ms-1">LOGIN</button>
                                </div>
                                <div class="mb-2 d-flex">
                                   
                                
                                   <a href="{{ route('google.login') }}" class="btn btn-google auth-form-btn flex-grow ms-1">
    <i class="mdi mdi-google me-2 fab fa-google fa-fw"></i>Login with Google
</a>


                                  
                               </div>
                               <div>
                               
                               <div class="text-center mt-4 font-weight-light">
                                   Don't have an account? <a href="{{ route('register') }}"   class="auth-link text-black"aclass="text-primary">Create</a>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
