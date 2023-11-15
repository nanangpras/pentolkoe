@extends('home.layouts.layout-pages')
@section('content')
    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Sign In <br>To Your Account</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                            Sit aliquid, Non distinctio vel iste.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-login-inner">
                        <form action="{{ route('login') }}" method="POST" class="ltn__form-box contact-form-box">
                            @csrf
                            <input type="text" name="email" placeholder="Email*" value="{{ old('email') }}"
                                class="@error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="password" name="password" placeholder="Password*"
                                    class="@error('password') is-invalid @enderror">
                                <div class="btn-wrapper mt-0">
                                    <button class="theme-btn-1 btn btn-block" type="submit">SIGN IN</button>
                                </div>
                                <div class="go-to-btn mt-20">
                                    <a href="#"><small>FORGOTTEN YOUR PASSWORD?</small></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="account-create text-center pt-50">
                            <h4>DON'T HAVE AN ACCOUNT?</h4>
                            <p>Add items to your wishlistget personalised recommendations <br>
                                check out more quickly track your orders register</p>
                            <div class="btn-wrapper">
                                <a href="{{ route('register.user') }}" class="theme-btn-1 btn black-btn">CREATE ACCOUNT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN AREA END -->
    @endsection
