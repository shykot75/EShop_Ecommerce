@extends('master.frontend-master')

@section('title')
    Sign In | Sign Up - EShop Ecommerce Site
@endsection

@section('website-body')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>



                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{  isset($guard) ? url($guard.'/login') : route('login')    }}"  class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" id="remember_me" name="remember" value="option2">Remember me!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            <button type="submit" name="login" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>

                        <x-jet-validation-errors style="font-size: 20px;" class="my-3 text-center" />

                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
{{--                    <div class="col-md-6 col-sm-6 create-new-account">--}}
{{--                        <h4 class="checkout-subtitle">Create a new account</h4>--}}
{{--                        <p class="text title-tag-line">Create your new account.</p>--}}
{{--                        <form method="POST" action="{{ route('register') }}" >--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="info-title" for="name">Name <span>*</span></label>--}}
{{--                                <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" >--}}
{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="info-title" for="email">Email Address <span>*</span></label>--}}
{{--                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" >--}}
{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="info-title" for="phone">Phone Number <span>*</span></label>--}}
{{--                                <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" >--}}
{{--                                @error('phone')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="info-title" for="password">Password <span>*</span></label>--}}
{{--                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >--}}
{{--                                @error('password')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>--}}
{{--                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation" >--}}
{{--                                @error('password_confirmation')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <button type="submit" name="signup" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>--}}

{{--                        </form>--}}


{{--                    </div>--}}
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div>
    </div>>

@endsection
