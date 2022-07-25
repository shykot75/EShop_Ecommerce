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
                            <li class="breadcrumb-item active" aria-current="page">All Brands</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Brand Name En</th>
                            <th>Brand Name Ban</th>
                            <th>Image</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->brand_name_en }}</td>
                                <td>{{ $item->brand_name_ban }}</td>
                                <td><img src="{{asset($item->brand_image)}}" alt="" height="40" width="70"></td>
                                <td>
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">ADD Brand</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('brand.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_name_en">Brand Name English <span class="text-danger">*</span></label>
                                    <input type="text" name="brand_name_en" class="form-control" id="brand_name_en">
                                    @error('brand_name_en')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="brand_name_ban">Brand Name Bangla <span class="text-danger">*</span></label>
                                    <input type="text" name="brand_name_ban" class="form-control" id="brand_name_ban">
                                    @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="brand_image">Brand Image <span class="text-danger">*</span></label>
                                    <input type="file" name="brand_image" class="form-control" id="brand_image" accept="image/*">
                                    @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
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
