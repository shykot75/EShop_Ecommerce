@extends('master.admin-master')

@section('admin-body')

    <section class="content  pt-1">
        <div class="content-header  pt-0">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Product Details </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('manage.product')}}">All Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
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
                        <h3 class="box-title">Product Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row"> <!-- start first row -->

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <h5>Category Name</h5>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" value="{{ $product->category->category_name_en }}" >
                                                        </div>
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <h5>Sub Category Name</h5>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" value="{{ $product->subcategory->subcategory_name_en }}" >
                                                        </div>

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <h5>Sub SubCategory Name</h5>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" value="{{ $product->subSubCategory->subsubcategory_name_en }}" >
                                                        </div>

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end first row -->

                                            <div class="row"> <!-- start second row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <h5>Brand Select<span class="text-danger">*</span></h5>
                                                        <div class="controls">

                                                            <input type="text" class="form-control" value="{{ $product->brand->brand_name_en }}" >
                                                        </div>

                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_name_en">Product Name En <span class="text-danger">*</span></label>

                                                        <div class="controls">
                                                            <input type="text" name="product_name_en" id="product_name_en" class="form-control" required data-validation-required-message="Product Name English Required" value="{{$product->product_name_en}}" > </div>
                                                        @error('product_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_name_ban">Product Name Ban <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_ban" id="product_name_ban" class="form-control" required data-validation-required-message="Product Name Bangla Required" value="{{$product->product_name_ban}}"   > </div>
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
                                                            <input type="text" name="product_code" id="product_code" class="form-control" required data-validation-required-message="Product Code Required"  value="{{$product->product_code}}"  > </div>
                                                        @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_quantity">Product Quantity<span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_quantity" id="product_quantity" class="form-control" required data-validation-required-message="Product Quantity Required"  value="{{$product->product_quantity}}"  > </div>
                                                        @error('product_quantity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_tags_en">Product Tags En <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_tags_en" id="product_tags_en" data-role="tagsinput" class="form-control" required data-validation-required-message="Product Tags English Required"  value="{{$product->product_tags_en}}"  > </div>
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
                                                            <input type="text" name="product_tags_ban" id="product_tags_ban" data-role="tagsinput" class="form-control" required data-validation-required-message="Product Tags Bangla Required"  value="{{$product->product_tags_ban}}"  > </div>
                                                        @error('product_tags_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_size_en">Product Size En </label>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_en" id="product_size_en" data-role="tagsinput" class="form-control"  value="{{$product->product_size_en}}"  > </div>
                                                        @error('product_size_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_size_ban">Product Size Ban </label>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_ban" id="product_size_ban" data-role="tagsinput" class="form-control"  value="{{$product->product_size_ban}}"  > </div>
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
                                                            <input type="text" name="product_color_en" id="product_color_en" data-role="tagsinput" class="form-control"  required data-validation-required-message="Product Color English Required"   value="{{$product->product_color_en}}"  > </div>
                                                        @error('product_color_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product_color_ban">Product Color Ban <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_ban" id="product_color_ban" data-role="tagsinput" class="form-control" required data-validation-required-message="Product Color Bangla Required" value="{{$product->product_color_ban}}"  > </div>
                                                        @error('product_color_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="selling_price">Product Selling Price <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="selling_price" id="selling_price" class="form-control"  required data-validation-required-message="Product Selling Price Required"  value="{{$product->selling_price}}"  > </div>
                                                        @error('selling_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end col-md-4 -->

                                            </div> <!-- end fifth row -->

                                            <div class="row"> <!-- start sixth row -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="discount_price">Product Discount Price</label>
                                                        <div class="controls">
                                                            <input type="text" name="discount_price" id="discount_price" class="form-control" value="{{$product->discount_price}}"  >
                                                        </div>

                                                    </div>
                                                </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="product_thumbnail">Product Thumbnail<span class="text-danger">*</span></label>
                                                    <div class="controls">
                                                        <img src="{{ asset($product->product_thumbnail) }} " alt="" id="thumb" height="200" width="200">
                                                    </div>
                                                </div>
                                            </div> <!-- end col-md-4 -->

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="multiImg">Product Multiple Image <span class="text-danger">*</span></label>
                                                    <div class="controls">
                                                        <div class="row">
                                                            @foreach($multiImages as $img)
                                                                <div class="col-md-3">
                                                                <img src="{{ asset($img->photo_name) }} " alt="" id="thumb" height="200" width="200">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>


                                                </div>
                                            </div> <!-- end col-md-4 -->

                                            </div> <!-- end sixth row -->

                                            <div class="row"> <!-- start seventh row -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Short Description English <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="short_desc_en" id="short_desc_en" class="form-control" rows="8" cols="80  required data-validation-required-message="Short Description English Required" >{{ $product->short_desc_en }}</textarea>
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
                                                            <textarea name="short_desc_ban" id="short_desc_ban" class="form-control" rows="8" cols="80 required data-validation-required-message="Short Description Bangla Required"  >{{ $product->short_desc_ban }}</textarea>
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
                                                            <textarea name="long_desc_en"  rows="10" cols="80" class="form-control">{!! $product->long_desc_en !!}</textarea>
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
                                                            <textarea name="long_desc_ban"  rows="10" cols="80" class="form-control">{!! $product->long_desc_ban !!}</textarea>
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
                                                                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{$product->hot_deals == 1 ? 'checked' : ''}} >
                                                                <label for="checkbox_2">Hot Deals</label>
                                                            </fieldset>
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_3" name="featured" value="1" {{$product->featured == 1 ? 'checked' : ''}} >
                                                                <label for="checkbox_3">Features</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{$product->special_offer == 1 ? 'checked' : ''}} >
                                                                <label for="checkbox_4">Special Offer</label>
                                                            </fieldset>
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{$product->special_deals == 1 ? 'checked' : ''}} >
                                                                <label for="checkbox_5">Special Deals</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <h3 for="discount_price">Product Status</h3>
                                                        <div class="controls">
                                                           <h4><span class="badge badge-pill {{ $product->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                               <strong>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</strong></span></h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!-- end ninth row -->


                                        </div>

                                    </div>


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







@endsection
