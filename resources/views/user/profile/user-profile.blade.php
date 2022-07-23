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
                            <span class="text-danger">Hii....</span> <strong>{{Auth::user()->name}}</strong> Update Your Profile
                        </h3>
                        <div class="card-body" style="padding: 10px 0px 30px 0px;">
                            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="name">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" value="{{ $user->name }}" >
                                    @error('name')
                                    <span class="text-warning" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="email">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" value="{{ $user->email }}">
                                    @error('email')
                                    <span class="text-warning" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                    <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" value="{{ $user->phone }}">
                                    @error('phone')
                                    <span class="text-warning" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <h5>Image</h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control"  accept="image/*" id="image">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <div class="controls">
                                            <img class="rounded" id="showImage" src="{{ $user->profile_photo_path == null ? url('upload/no_image.jpg') : asset($user->profile_photo_path) }}" alt="User Avatar" height="120" width="120">

                                        </div>
                                    </div>

                                </div>


                                <button type="submit"  class="btn-upper btn btn-success checkout-page-button">Update Profile</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>


@endsection
