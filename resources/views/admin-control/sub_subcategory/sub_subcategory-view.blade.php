@extends('master.admin-master')

@section('admin-body')

<section class="content">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Sub->Sub Category List </h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sub->Sub Categories</li>
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
                            <th>Sub Category</th>
                            <th>Sub SubCategory En</th>
{{--                            <th>Sub SubCategory Ban</th>--}}
                            <th >Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subSubCategories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $item->categoryByName->category_name_en }}</td>
                                <td> {{ $item->subCategoryByName->subcategory_name_en }}</td>
                                <td>{{ $item->subsubcategory_name_en }}</td>
{{--                                <td>{{ $item->subsubcategory_name_ban }}</td>--}}

                                <td>
                                    <a href="{{route('sub-subcategory.edit', ['id' => $item->id])}}" class="btn btn-info mr-2" title="Edit This SubCategory"><i class="fa fa-pencil"></i></a>
{{--                                    <a href="" onclick="deleteBrand({{$item->id}})" class="btn btn-danger">Delete</a>--}}
{{--                                    <form action="{{route('brand.delete', ['id' => $item->id])}}" method="POST" id="deleteBrand{{$item->id}}">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
                                    <a href="{{route('sub-subcategory.delete', ['id' => $item->id])}}" class="btn btn-danger" id="delete" title="Delete This SubCategory"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">ADD Sub->SubCategory</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('sub-subcategory.create')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <h5>Category Select<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control js-example-basic-single" aria-invalid="false">
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
                                    <div class="form-group">
                                        <h5>SubCategory Select<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control js-example-basic-single" aria-invalid="false">
                                                <option value="" selected disabled>Select Your SubCategory</option>


                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subsubcategory_name_en">Sub SubCategory English <span class="text-danger">*</span></label>
                                    <input type="text" name="subsubcategory_name_en" class="form-control" id="subsubcategory_name_en">
                                    @error('subsubcategory_name_en')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>

                                <div class="form-group">
                                    <label for="subsubcategory_name_ban">Sub SubCategory Bangla <span class="text-danger">*</span></label>
                                    <input type="text" name="subsubcategory_name_ban" class="form-control" id="subsubcategory_name_ban">
                                    @error('subsubcategory_name_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Create Sub SubCategory</button>
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

        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if (category_id) {

                $.ajax({
                    url: "{{ url('/sub-subcategory/fetch/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name_en + '</option>');

                        });
                    },
                });
            }else{
                alert('danger');
            }
        });

        $('.js-example-basic-single').select2();


    });
</script>











@endsection
