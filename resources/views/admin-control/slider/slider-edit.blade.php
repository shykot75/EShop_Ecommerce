@extends('master.admin-master')

@section('admin-body')

    <section class="content">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Slider Edit </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('manage.slider')}}">All Sliders</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
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
                        <h3 class="box-title">Edit Slider</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action=" {{ route('slider.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <img src="{{asset($slider->slider_img)}}" alt="" id="sliderImg" height="100%" width="100%">
                                        <label for="slider_img">Slider Image <span class="text-danger">*</span></label>
                                        <input type="file" name="slider_img" class="form-control" id="slider_img" onchange="slider(this)" accept="image/*">
                                        @error('slider_img')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Slider Title </label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{$slider->title}}">

                                    </div>

                                    <div class="form-group">
                                        <label for="description">Slider Description</label>
                                        <div class="controls">
                                            <textarea name="description" id="editor1" rows="10" cols="80" class="form-control">{!! $slider->description !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Update Slider</button>
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
                    $('#sliderImg').attr('src',e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>









@endsection
