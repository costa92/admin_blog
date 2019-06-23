<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CostaLong | @isset( $data['title']) {{ $data['title'] }} @endisset</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/static/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('/static/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/static/Ionicons/css/ionicons.min.css') }} ">
    <!-- jvectormap -->
    <link rel="stylesheet" href=" {{ asset('/static/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/static/dist/css/AdminLTE.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('/static/dist/css/style.css') }} ">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/static/dist/css/skins/_all-skins.min.css') }} ">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

@stack('styles')
<!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.layouts.header')
<!-- Left side column. contains the logo and sidebar -->
@include('admin.layouts.menu')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('admin.layouts.footer')
</div>

<!-- jQuery 3 -->
<script src=" {{ asset('/static/jquery/dist/jquery.min.js')  }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src=" {{ asset('/static/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Slimscroll -->
<script src=" {{ asset('/static/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src=" {{ asset('/static/fastclick/lib/fastclick.js') }} "></script>
<!-- AdminLTE App -->
<script src=" {{ asset('/static/dist/js/adminlte.min.js') }} "></script>
<!-- AdminLTE for demo purposes -->
<script src=" {{ asset('/static/dist/js/demo.js') }}"></script>

@stack('scripts')

@stack('js')
</body>
</html>

