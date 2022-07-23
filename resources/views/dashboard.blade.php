{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}

{{--                <h2>Welcome to {{ Auth::user()->name }}'s Dashboard</h2>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
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

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('/')}}backend/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}backend/css/skin_color.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <!-- Header Area -->
    <header class="main-header">
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top pl-30">
            <!-- Sidebar toggle button-->
            <div>
                <ul class="nav">
                    <li class="btn-group nav-item">
                        <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
                            <i class="nav-link-icon mdi mdi-menu"></i>
                        </a>
                    </li>
                    <li class="btn-group nav-item">
                        <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
                            <i class="nav-link-icon mdi mdi-crop-free"></i>
                        </a>
                    </li>
                    <li class="btn-group nav-item d-none d-xl-inline-block">
                        <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
                            <i class="ti-check-box"></i>
                        </a>
                    </li>
                    <li class="btn-group nav-item d-none d-xl-inline-block">
                        <a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
                            <i class="ti-calendar"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <!-- full Screen -->
                    <li class="search-bar">
                        <div class="lookup lookup-circle lookup-right">
                            <input type="text" name="s">
                        </div>
                    </li>
                    <!-- Notifications -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications">
                            <i class="ti-bell"></i>
                        </a>
                        <ul class="dropdown-menu animated bounceIn">

                            <li class="header">
                                <div class="p-20">
                                    <div class="flexbox">
                                        <div>
                                            <h4 class="mb-0 mt-0">Notifications</h4>
                                        </div>
                                        <div>
                                            <a href="#" class="text-danger">Clear All</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu sm-scrol">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>

                    <!-- User Account-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
                            {{ Auth::user()->name }}
                            <img src="{{asset('/')}}backend/images/avatar/1.jpg" alt="">
                        </a>
                        <ul class="dropdown-menu animated flipInX">
                            <li class="user-body">
                                <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My Wallet</a>
                                <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('userLogout').submit();" ><i class="ti-lock text-muted mr-2"></i> Logout</a>
                                <form action="{{route('logout')}}" method="POST" id="userLogout">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
                            <i class="ti-settings"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>


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

<!-- Theme Admin App -->
<script src="{{asset('/')}}backend/js/template.js"></script>
<script src="{{asset('/')}}backend/js/pages/dashboard.js"></script>


</body>
</html>
