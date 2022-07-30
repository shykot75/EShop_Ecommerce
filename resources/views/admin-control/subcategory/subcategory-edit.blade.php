@extends('master.admin-master')

@section('admin-body')

    <section class="content">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Sub Category List </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('all.subcategory')}}">All SubCategories</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit SubCategory</li>
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
                        <h3 class="box-title">Edit SubCategory</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{route('subcategory.update', ['id' => $subcategory->id])}}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>Category Select<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control" aria-invalid="false">
                                                    <option value="" selected disabled>Select Your Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : ''}} >{{ $category->category_name_en }}</option>
                                                    @endforeach

                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="subcategory_name_en">Sub Category English <span class="text-danger">*</span></label>
                                        <input type="text" name="subcategory_name_en" class="form-control" id="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}">
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="subcategory_name_ban">Sub Category Bangla <span class="text-danger">*</span></label>
                                        <input type="text" name="subcategory_name_ban" class="form-control" id="subcategory_name_ban" value="{{ $subcategory->subcategory_name_ban }}">
                                        @error('subcategory_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Update SubCategory</button>
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
