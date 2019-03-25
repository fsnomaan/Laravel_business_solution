<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')



<!-- BEGIN CSS for this page -->

    <!-- END CSS for this page -->

</head>

<body class="adminbody">

<div id="main">



    <div class="content">

        <!-- Start content -->
        <div class="content">

        @yield('main_content')

        <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->



</div>
<!-- END main -->

@include('partials._scripts')

<!-- BEGIN Java Script for this page -->

<!-- END Java Script for this page -->

</body>
</html>