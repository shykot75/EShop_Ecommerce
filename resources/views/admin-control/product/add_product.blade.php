@extends('master.admin-master')

@section('admin-body')

    <section class="content  pt-1">
        <div class="content-header  pt-0">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">ADD Product</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">ADD Product</li>
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
                        <h3 class="box-title">ADD Product</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('create.product') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row"> <!-- start first row -->

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                            <h5>Category Select<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="category_id" class="form-control" required data-validation-required-message="Select a Category" >
                                                                    <option value="" selected disabled>Select Your Category</option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}" >{{ $category->category_name_en }}</option>
                                                                    @endforeach

                                                                </select>
                                                                @error('category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                            <h5>Sub Category Select<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="subcategory_id" class="form-control js-example-basic-single" aria-invalid="false" required data-validation-required-message="Select a Sub Category" >
                                                                    <option value="" selected disabled>Select Your Sub Category</option>


                                                                </select>
                                                                @error('subcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                            <h5>Sub SubCategory Select<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="subsubcategory_id" class="form-control js-example-basic-single" required data-validation-required-message="Select a Sub SubCategory" >
                                                                    <option value="" selected disabled>Select Your Sub SubCategory</option>

                                                                </select>
                                                                @error('subsubcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end first row -->

                                            <div class="row"> <!-- start second row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                            <h5>Brand Select<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="brand_id" class="form-control" aria-invalid="false"  required data-validation-required-message="Select a Brand" >
                                                                    <option value="" selected disabled>Select Your Brand</option>
                                                                    @foreach($brands as $brand)
                                                                        <option value="{{ $brand->id }}" >{{ $brand->brand_name_en }}</option>
                                                                    @endforeach

                                                                </select>
                                                                @error('brand_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_name_en">Product Name En <span class="text-danger">*</span></label>

                                                        <div class="controls">
                                                            <input type="text" name="product_name_en" id="product_name_en" class="form-control" required data-validation-required-message="Product Name English Required" > </div>
                                                        @error('product_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_name_ban">Product Name Ban <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_ban" id="product_name_ban" class="form-control" required data-validation-required-message="Product Name Bangla Required"  > </div>
                                                        @error('product_name_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end second row -->

                                            <div class="row"> <!-- start third row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_code">Product Code <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_code" id="product_code" class="form-control" required data-validation-required-message="Product Code Required"  > </div>
                                                        @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_quantity">Product Quantity<span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_quantity" id="product_quantity" class="form-control" required data-validation-required-message="Product Quantity Required"  > </div>
                                                        @error('product_quantity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_tags_en">Product Tags En <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_tags_en" id="product_tags_en" value="Lorem,Ipsum" data-role="tagsinput" class="form-control" required data-validation-required-message="Product Tags English Required"  > </div>
                                                        @error('product_tags_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end third row -->

                                            <div class="row"> <!-- start forth row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_tags_ban">Product Tags Ban <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_tags_ban" id="product_tags_ban" value="লরেম,ডলার" data-role="tagsinput" class="form-control" required data-validation-required-message="Product Tags Bangla Required"  > </div>
                                                        @error('product_tags_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_size_en">Product Size En </label>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_en" id="product_size_en" value="XL,M" data-role="tagsinput" class="form-control" > </div>
                                                        @error('product_size_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_size_ban">Product Size Ban </label>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_ban" id="product_size_ban" value="এক্স,এম" data-role="tagsinput" class="form-control" > </div>
                                                        @error('product_size_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end forth row -->

                                            <div class="row"> <!-- start fifth row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_color_en">Product Color En <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_en" id="product_color_en" value="blue,red" data-role="tagsinput" class="form-control"  required data-validation-required-message="Product Color English Required" > </div>
                                                        @error('product_color_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_color_ban">Product Color Ban <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_ban" id="product_color_ban" value="নীল,লাল" data-role="tagsinput" class="form-control" required data-validation-required-message="Product Color Bangla Required"  > </div>
                                                        @error('product_color_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="selling_price">Product Selling Price <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="selling_price" id="selling_price" class="form-control"  required data-validation-required-message="Product Selling Price Required" > </div>
                                                        @error('selling_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end fifth row -->

                                            <div class="row"> <!-- start sixth row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="discount_price">Product Discount Price</label>
                                                        <div class="controls">
                                                            <input type="text" name="discount_price" id="discount_price" class="form-control" > </div>
                                                        @error('discount_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_thumbnail">Product Thumbnail<span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="file" name="product_thumbnail" id="product_thumbnail" onchange="thumbnail(this)" class="form-control" accept="image/*"  required data-validation-required-message="Product Thumbnail Required" > </div>
                                                        <img src="" alt="" id="thumb">
                                                        @error('product_thumbnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="multiImg">Product Multiple Image <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="file" name="multi_img[]" id="multiImg" class="form-control" multiple accept="image/*"  required data-validation-required-message="Select Multiple Images for Product" > </div>
                                                        @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end sixth row -->

                                            <div class="row"> <!-- start seventh row -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Short Description English <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="short_desc_en" id="short_desc_en" class="form-control" rows="8" cols="80  required data-validation-required-message="Short Description English Required" ></textarea>
                                                        </div>
                                                        @error('short_desc_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="short_desc_ban" id="short_desc_ban" class="form-control" rows="8" cols="80 required data-validation-required-message="Short Description Bangla Required"  ></textarea>
                                                        </div>
                                                        @error('short_desc_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end seventh row -->

                                            <div class="row"> <!-- start eighth row -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Long Description English </h5>
                                                        <div class="controls">
                                                            <textarea name="long_desc_en" id="editor1" rows="10" cols="80" class="form-control"></textarea>
                                                        </div>
                                                        @error('long_desc_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Long Description Bangla </h5>
                                                        <div class="controls">
                                                            <textarea name="long_desc_ban" id="editor2" rows="10" cols="80" class="form-control"></textarea>
                                                        </div>
                                                        @error('long_desc_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end eighth row -->

                                            <hr>

                                            <div class="row"><!-- end ninth row -->
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                        <label for="checkbox_2">Hot Deals</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                        <label for="checkbox_3">Features</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                        <label for="checkbox_4">Special Offer</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                        <label for="checkbox_5">Special Deals</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                            </div> <!-- end ninth row -->

                                            <div class="text-xs-right">
                                                <button type="submit" class="btn btn-rounded btn-info">Create New Product</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <! ------- Multi Dependency For Sub Category and Sub SubCategory--------->
    <script type="text/javascript">
        $(document).ready(function(){

            //------- Sub Category -----
            $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('/sub-subcategory/fetch/') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subsubcategory_id"]').html('');
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

        //-------------- Sub SubCategory -----------
            $('select[name="subcategory_id"]').on('change',function(){
                var subcategory_id = $(this).val();
                if (subcategory_id) {

                    $.ajax({
                        url: "{{ url('/sub-subcategory/sub/fetch/') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id + '">' + value.subsubcategory_name_en + '</option>');

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
    <! ------- Multi Dependency For Sub Category and Sub SubCategory--------->

    <! ------- Product Thumbnail Preview--------->
    <script type="text/javascript">
        function thumbnail(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <! ------- Product Thumbnail Preview--------->

    <! ------- Multiple Product Image Preview--------->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    <! ------- Multiple Product Image Preview--------->








@endsection
