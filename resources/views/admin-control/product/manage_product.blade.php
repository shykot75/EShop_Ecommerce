@extends('master.admin-master')

@section('admin-body')

    <section class="content">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Product List </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th >Image</th>
                                <th>Name English</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
{{--                                <th>Discount Price</th>--}}
                                <th>Status</th>
                                <th width="22%">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td ><img src="{{asset($item->product_thumbnail)}}" alt="" width="100px" height="60px" ></td>
                                    <td>{{ $item->product_name_en }}</td>
                                    <td>{{ $item->discount_price == NULL ? number_format($item->selling_price) :  number_format($item->discount_price) }} ৳
                                        <br>
                                        <del>{{number_format($item->selling_price)}}৳</del>
                                    </td>
                                    <td>{{ $item->product_quantity }} Pis</td>
                                    <td>
                                        @if($item->discount_price == NULL)
                                            <span class="badge badge-pill badge-danger">No Discount</span>
                                        @else
                                            @php
                                            $ammount = $item->selling_price - $item->discount_price;
                                            $discount = ($ammount/$item->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-primary">{{round($discount)}}%</span>
                                        @endif
                                    </td>
{{--                                    <td>{{ number_format($item->discount_price) }} ৳</td>--}}
                                    <td><span class="badge badge-pill {{ $item->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                          <strong>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</strong></span>
                                    </td>

                                    <td>
                                        <a href="{{route('details.product', ['id' => $item->id])}}" class="btn btn-primary btn-sm m-1" title="See Product Details"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('statusUpdate.product', ['id' => $item->id])}}" class="btn btn-sm m-1 {{ $item->status == 1 ? 'btn-success' : 'btn-warning' }} " title="{{ $item->status == 1 ? 'Inactive It.' : 'Active It.' }}">
                                            <i class=" {{ $item->status == 1 ? 'fa fa-arrow-up' : 'fa fa-arrow-down' }}"></i>
                                        </a>
                                        <a href="{{route('edit.product', ['id' => $item->id])}}" class="btn btn-info btn-sm m-1" title="Edit This Product"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('delete.product', ['id' => $item->id])}}" class="btn btn-danger btn-sm m-1" id="delete" title="Delete This Product"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </section>












@endsection
