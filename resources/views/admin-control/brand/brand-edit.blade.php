@extends('master.admin-master')

@section('admin-body')

    <section class="content">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Brand List </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('all.brand')}}">All Brands</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Brand</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{route('brand.update', ['id' => $brand->id ])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="brand_name_en">Brand Name English <span class="text-danger">*</span></label>
                                        <input type="text" name="brand_name_en" class="form-control" id="brand_name_en" value="{{$brand->brand_name_en}}">
                                        @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="brand_name_ban">Brand Name Bangla <span class="text-danger">*</span></label>
                                        <input type="text" name="brand_name_ban" class="form-control" id="brand_name_ban" value="{{$brand->brand_name_ban}}">
                                        @error('brand_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="brand_image">Brand Image <span class="text-danger">*</span></label>
                                        <img src="{{ asset($brand->brand_image) }}" alt="" height="100px" width="100px">
                                        <input type="file" name="brand_image" class="form-control" id="brand_image" accept="image/*">

                                    </div>


                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Update Brand</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>













@endsection
