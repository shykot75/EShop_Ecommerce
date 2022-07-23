@extends('master.frontend-master')

@section('title')
    User Dashboard | EShop Ecommerce Site
@endsection

@section('website-body')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top"  src="{{ Auth::user()->profile_photo_path == null ? url('upload/no_image.jpg') : asset(Auth::user()->profile_photo_path) }}" alt="" height="100%" width="100%">
                    <br> <br>
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
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
                            <span class="text-danger">Hii....</span> <strong>{{Auth::user()->name}}</strong> Welcome to Eshop.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
