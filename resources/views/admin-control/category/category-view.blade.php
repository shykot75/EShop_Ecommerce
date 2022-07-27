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
                            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
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
                            <th >Category Icon</th>
                            <th>Category English</th>
                            <th>Category Bangla</th>
                            <th width="25%">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td > <span class="{{ $item->category_icon }}"></span></td>
                                <td>{{ $item->category_name_en }}</td>
                                <td>{{ $item->category_name_ban }}</td>

                                <td>
                                    <a href="{{route('category.edit', ['id' => $item->id])}}" class="btn btn-info mr-2" title="Edit This Category"><i class="fa fa-pencil"></i></a>
{{--                                    <a href="" onclick="deleteBrand({{$item->id}})" class="btn btn-danger">Delete</a>--}}
{{--                                    <form action="{{route('brand.delete', ['id' => $item->id])}}" method="POST" id="deleteBrand{{$item->id}}">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
                                    <a href="{{route('category.delete', ['id' => $item->id])}}" class="btn btn-danger" id="delete" title="Delete This Category"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">ADD Category</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('category.create')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="category_name_en">Category Name English <span class="text-danger">*</span></label>
                                    <input type="text" name="category_name_en" class="form-control" id="category_name_en">
                                    @error('category_name_en')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_name_ban">Category Name Bangla <span class="text-danger">*</span></label>
                                    <input type="text" name="category_name_ban" class="form-control" id="category_name_ban">
                                    @error('category_name_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_icon">Category Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="category_icon" class="form-control" id="category_icon">
                                    @error('category_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Create Category</button>
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
