@extends('master.admin-master')

@section('admin-body')

    <section class="content">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Slider Details </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('manage.slider')}}">All Sliders</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Details Slider</li>
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
                        <h3 class="box-title">Slider Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                    <div class="form-group">
                                        <h2 class="text-primary">Slider Image </h2>
                                        <img src="{{asset($slider->slider_img)}}" alt="" id="sliderImg" height="100%" width="100%">
                                    </div>

                                    <div class="form-group">
                                       <h2 class="text-primary">Slider Title</h2>
                                        <div><h4>{{$slider->title}}</h4></div>

                                    </div>

                                    <div class="form-group">
                                        <h2 class="text-primary">Slider Description</h2>
                                        <div class="controls">
                                            <div><p>{!! $slider->description !!}</p></div>
                                        </div>
                                    </div>

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
