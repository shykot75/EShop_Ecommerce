@extends('master.admin-master')

@section('admin-body')

    <section class="content">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Category List </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('all.category')}}">All Categories</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{route('category.update', ['id' => $category->id ])}}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name_en">Category Name English <span class="text-danger">*</span></label>
                                        <input type="text" name="category_name_en" class="form-control" id="category_name_en" value="{{$category->category_name_en}}">
                                        @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name_ban">Category Name Bangla <span class="text-danger">*</span></label>
                                        <input type="text" name="category_name_ban" class="form-control" id="category_name_ban" value="{{$category->category_name_ban}}">
                                        @error('category_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category_icon">Category Icon <span class="text-danger">*</span></label>
                                        <input type="text" name="category_icon" class="form-control" id="category_icon" value="{{$category->category_icon}}">
                                        @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Update Category</button>
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
