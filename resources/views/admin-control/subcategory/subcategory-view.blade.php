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
                            <li class="breadcrumb-item active" aria-current="page">All Sub Categories</li>
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
                            <th>Category</th>
                            <th>SubCategory English</th>
                            <th>SubCategory Bangla</th>
                            <th width="25%">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $item->categoryByName->category_name_en }}</td>
                                <td>{{ $item->subcategory_name_en }}</td>
                                <td>{{ $item->subcategory_name_ban }}</td>

                                <td>
                                    <a href="{{route('subcategory.edit', ['id' => $item->id])}}" class="btn btn-info mr-2" title="Edit This SubCategory"><i class="fa fa-pencil"></i></a>
{{--                                    <a href="" onclick="deleteBrand({{$item->id}})" class="btn btn-danger">Delete</a>--}}
{{--                                    <form action="{{route('brand.delete', ['id' => $item->id])}}" method="POST" id="deleteBrand{{$item->id}}">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
                                    <a href="{{route('subcategory.delete', ['id' => $item->id])}}" class="btn btn-danger" id="delete" title="Delete This SubCategory"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">ADD Sub Category</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('subcategory.create')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <h5>Category Select<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" aria-invalid="false">
                                                <option value="" selected disabled>Select Your Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                    <input type="text" name="subcategory_name_en" class="form-control" id="subcategory_name_en">
                                    @error('subcategory_name_en')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="subcategory_name_ban">Sub Category Bangla <span class="text-danger">*</span></label>
                                    <input type="text" name="subcategory_name_ban" class="form-control" id="subcategory_name_ban">
                                    @error('subcategory_name_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Create SubCategory</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





{{--<script>--}}
{{--    function deleteBrand(id) {--}}
{{--        event.preventDefault();--}}

{{--        var check = confirm('Are You Sure To DELETE This Brand?');--}}

{{--        if(check){--}}
{{--            document.getElementById('deleteBrand'+id).submit();--}}
{{--        }--}}

{{--    }--}}
{{--</script>--}}













@endsection
