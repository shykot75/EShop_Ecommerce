@extends('master.admin-master')

@section('admin-body')

<section class="content px-1">
    <div class="content-header pt-1 ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Slider List </h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Sliders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-8">
            <div class="box-body px-1">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="3%">SL</th>
                            <th width="15%">Image</th>
                            <th width="20%">Title</th>
                            <th width="30%">Description</th>
                            <th width="4%">Status</th>
                            <th width="28%">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{asset($item->slider_img)}}" alt="" height="80" width="100"></td>
                                <td>
                                    @if($item->title == NULL)
                                        <span class="badge badge-pill badge-danger "> No Title</span>
                                    @else
                                        {{ $item->title }}
                                    @endif
                                </td>
                                <td>
                                    @if($item->description == NULL)
                                        <span class="badge badge-pill badge-danger "> No Description</span>
                                    @else
                                        {{ Str::limit($item->description, 100)  }}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-pill {{ $item->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                        <strong>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</strong>
                                    </span>
                                </td>
                                <td>
                                    <a href="{{route('slider.details', ['id' => $item->id])}}" class="btn btn-sm btn-primary m-1" title="See Slider Details"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('statusUpdate.slider', ['id' => $item->id])}}" class="btn btn-sm m-1 {{ $item->status == 1 ? 'btn-success' : 'btn-warning' }} " title="{{ $item->status == 1 ? 'Deactivate It.' : 'Active It.' }}">
                                        <i class=" {{ $item->status == 1 ? 'fa fa-arrow-up' : 'fa fa-arrow-down' }}"></i>
                                    </a>
                                    <a href="{{route('slider.edit', ['id' => $item->id])}}" class="btn btn-sm btn-info m-1" title="Edit This Slider"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('slider.delete', ['id' => $item->id])}}" class="btn btn-sm btn-danger m-1" id="delete" title="Delete This Slider"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">ADD Slider</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('slider.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="slider_img">Slider Image <span class="text-danger">*</span></label>
                                    <input type="file" name="slider_img" class="form-control" id="slider_img" onchange="slider(this)" accept="image/*">
                                    <img src="" alt="" id="sliderImg">
                                    @error('slider_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Slider Title </label>
                                    <input type="text" name="title" class="form-control" id="title">

                                </div>

                                <div class="form-group">
                                    <label for="description">Slider Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="editor1" rows="10" cols="80" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Create Slider</button>
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
    function slider(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#sliderImg').attr('src',e.target.result).width(220).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


@endsection
