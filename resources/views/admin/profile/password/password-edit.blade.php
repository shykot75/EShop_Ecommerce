@extends('master.admin-master')

@section('admin-body')

    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Admin Password Change</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                            <form  action="{{ route('admin.update.password', ['id' => $changePassword->id]) }}" method="POST" novalidate  >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Current Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="current_password" class="form-control" required data-validation-required-message="This field is required" > </div>
                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <h5>New Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="new_password" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                @error('new_password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror

                                            </div>

                                            <div class="form-group col-md-6">
                                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="confirm_password" data-validation-match-match="new_password" class="form-control" required> </div>
                                            </div>

                                        </div>



                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info">Update Password</button>
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



@endsection
