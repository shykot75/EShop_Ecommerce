@extends('master.frontend-master')

@section('title')
    User Dashboard | EShop Ecommerce Site
@endsection

@section('website-body')

    <div class="body-content ">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top"  src="{{ Auth::user()->profile_photo_path == null ? url('upload/no_image.jpg') : asset(Auth::user()->profile_photo_path) }}" alt="" height="100%" width="100%">
                    <br> <br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="" onclick="event.preventDefault(); document.getElementById('userLogout').submit();" class="btn btn-danger btn-sm btn-block">Logout</a>
                        <form action="{{route('logout')}}" method="POST" id="userLogout">
                            @csrf
                        </form>
                    </ul>
                </div>
                <div class="col-md-2"></div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hii....</span> <strong>{{Auth::user()->name}}</strong> Change Your Password
                        </h3>
                        <div class="card-body" style="padding: 10px 0px 30px 0px;">
                            <form action="{{ route('user.update.password') }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="current_password">Current Password <span>*</span></label>
                                    <input type="password" name="current_password" class="form-control unicase-form-control text-input" id="current_password" >
                                    @error('current_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label class="info-title" for="password">New Password <span>*</span></label>
                                        <input type="password" name="password" class="form-control" id="password" >
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                        <input type="password" name="password_confirmation"  class="form-control" id="password_confirmation">
                                        @error('confirm_password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>

                                <button type="submit"  class="btn-upper btn btn-success checkout-page-button">Change Password</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
