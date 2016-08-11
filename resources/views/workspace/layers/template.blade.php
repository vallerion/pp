<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - PIRA</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap-select.min.css")}}">
    {{--<link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap-slider.css")}}">--}}
    <link rel="stylesheet" href="{{asset("css/font-awesome.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin_panel.css")}}">
    <link rel="stylesheet" href="{{asset("css/skin-black.css")}}">
    <link rel="stylesheet" href="{{asset("css/lib/noty/animate.css")}}">
    <link rel="stylesheet" href="{{asset("bootstrap/bootstrap-editable/css/bootstrap-editable.css")}}">
    <link rel="stylesheet" href="{{asset("css/workspace.css")}}">
    {{--<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-wysihtml5.css')}}">--}}
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css">-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

    @yield('header')

    @yield('sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        2016
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="{{asset("js/lib/jquery.js")}}"></script>
<script src="{{asset("js/lib/jquery-ui.js")}}"></script>
<script src="{{asset("bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("bootstrap/js/bootstrap-select.js")}}"></script>
{{--<script src="{{asset("bootstrap/js/bootstrap-slider.js")}}"></script>--}}
<script src="{{asset('js/lib/noty/packaged/jquery.noty.packaged.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap-editable/js/bootstrap-editable.min.js')}}"></script>
{{--<script src="{{asset('bootstrap/js/wysihtml5-0.3.0.js')}}"></script>--}}
<script src="{{asset('bootstrap/js/wysihtml5-0.4.0pre.js')}}"></script>
<script src="{{asset('bootstrap/js/wysihtml5ParserRules.js')}}"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("js/workspace.js")}}"></script>
<script src="{{asset('js/responseHandler.js')}}"></script>
<script src="{{asset('js/move_list.js')}}"></script>
<script src="{{asset('js/editable.js')}}"></script>
</body>
</html>
