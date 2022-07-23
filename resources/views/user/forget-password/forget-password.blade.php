@extends('master.frontend-master')

@section('title')
    Recover Password | EShop Ecommerce Site
@endsection

@section('website-body')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class='active'>Forget Password</li>
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
                            <h4 class="">Recover Your Password</h4>
                            <p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <x-jet-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('password.email') }}"  >
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                                </div>
                                <button type="submit" name="login" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
                            </form>

                        </div>
                <!-- Sign-in -->

                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div>
    </div>>

@endsection
