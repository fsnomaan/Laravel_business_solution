<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')


@yield('style')


<!-- BEGIN CSS for this page -->

    <!-- END CSS for this page -->

</head>

<body class="adminbody">

<div id="main">

    <!-- top bar navigation -->
   @include('partials._headerBar')
    <!-- End Navigation -->


    <!-- Left Sidebar -->
   @include('partials._sidebar')
    <!-- End Sidebar -->


    <div class="content-page">

        <!-- Start content -->
        <div class="content">

                @yield('main_content')

            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->

@include('partials._footer')

</div>
<!-- END main -->

@include('partials._scripts')

@yield('script')

<!-- BEGIN Java Script for this page -->

<!-- END Java Script for this page -->

</body>
</html>