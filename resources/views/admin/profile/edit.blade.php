@extends('master.admin-master')

@section('admin-body')

    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Admin Profile Edit</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.profile', ['id' => $editProfile->id])}}"> Profile</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Profile Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form novalidate action="{{ route('admin-profile.update', ['id' => $editProfile->id]) }}" method="POST" novalidate enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required data-validation-required-message="Name is required" value="{{ $editProfile->name }}"> </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required data-validation-required-message="Email is required" value="{{ $editProfile->email }}"> </div>
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
                                                    <img class="rounded" id="showImage" src="{{ $editProfile->profile_photo_path == null ? url('upload/no_image.jpg') : asset($editProfile->profile_photo_path) }}" alt="User Avatar" height="120" width="120">

                                                </div>
                                            </div>

                                        </div>



                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

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
