<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/')}}backend/images/favicon.ico">

    <title>EShop - Admin Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('/')}}backend/css/vendors_css.css">

    <!-- Toster Style-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('/')}}backend/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}backend/css/skin_color.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <!-- Header Area -->
    @include('admin.body.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.body.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('admin-body')

    </div>
    <!-- /.content-wrapper -->

    <!-- Footer Area -->
    @include('admin.body.footer')



</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{asset('/')}}backend/js/vendors.min.js"></script>
<script src="{{asset('/')}}assets/icons/feather-icons/feather.min.js"></script>
<script src="{{asset('/')}}assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
<script src="{{asset('/')}}assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="{{asset('/')}}assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

<!-- Form Validation -->
<script src="{{asset('/')}}backend/js/pages/validation.js"></script>
<script src="{{asset('/')}}backend/js/pages/form-validation.js"></script>

<!-- Toster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>

<!-- Data Table -->
<script src="{{asset('/')}}assets/vendor_components/datatable/datatables.min.js"></script>
<script src="{{asset('/')}}backend/js/pages/data-table.js"></script>

<!-- Theme Admin App -->
<script src="{{asset('/')}}backend/js/template.js"></script>
<script src="{{asset('/')}}backend/js/pages/dashboard.js"></script>


</body>
</html>
