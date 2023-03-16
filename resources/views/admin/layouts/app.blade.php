<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('/userpage/images/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('/userpage/images/favicon.ico') }}" type="image/x-icon">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{ asset('/adminpage/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="{{ asset('/adminpage/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{ asset('/adminpage/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/adminpage/assets/js/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .center-input {
            text-align: center;
        }
    </style>
</head>

<body>
    @include('admin.layouts.partials.navbar')
    <!-- LOGO HEADER END-->
    @include('admin.layouts.partials.header')
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    @include('admin.layouts.partials.footer')
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="{{ asset('/adminpage/assets/js/jquery-1.10.2.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{ asset('/adminpage/assets/js/bootstrap.js') }}"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="{{ asset('/adminpage/assets/js/custom.js') }}"></script>
    <script src="{{ asset('/adminpage/assets/js/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/adminpage/assets/js/dataTables/dataTables.bootstrap.js') }}"></script>
</body>

</html>
