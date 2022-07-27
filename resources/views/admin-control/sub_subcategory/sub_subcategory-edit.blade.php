@extends('master.admin-master')

@section('admin-body')

    <section class="content">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Sub SubCategory List </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('all.sub-subcategory')}}">All Sub SubCategories</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Sub SubCategory</li>
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
                        <h3 class="box-title">Edit Sub SubCategory</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{route('sub-subcategory.update', ['id' => $subSubCategory->id])}}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>Category Select<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control" aria-invalid="false">
                                                    <option value="" selected disabled>Select Your Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $subSubCategory->category_id ? 'selected' : '' }} >{{ $category->category_name_en }}</option>
                                                    @endforeach

                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>SubCategory Select<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" class="form-control js-example-basic-single" aria-invalid="false">
                                                    <option value="" selected disabled>Select Your SubCategory</option>
                                                    @foreach($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subSubCategory->subcategory_id ? 'selected' : '' }} >{{ $subcategory->subcategory_name_en }}</option>
                                                    @endforeach


                                                </select>
                                                @error('subcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="subsubcategory_name_en">Sub SubCategory English <span class="text-danger">*</span></label>
                                        <input type="text" name="subsubcategory_name_en" class="form-control" id="subsubcategory_name_en" value="{{ $subSubCategory->subsubcategory_name_en }}">
                                        @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="subsubcategory_name_ban">Sub SubCategory Bangla <span class="text-danger">*</span></label>
                                        <input type="text" name="subsubcategory_name_ban" class="form-control" id="subsubcategory_name_ban" value="{{ $subSubCategory->subsubcategory_name_ban }}">
                                        @error('subsubcategory_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Update Sub SubCategory</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.js-example-basic-single').select2();


        });
    </script>








@endsection
