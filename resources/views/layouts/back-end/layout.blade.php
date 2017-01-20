<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="description" content="Miminium Admin Template v.1">
    <meta name="author" content="Isna Nur Azis">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Fundación Antioquía</title>
    <meta name='csrf-param' content='authenticity_token'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- start: Css -->
    {!!Html::style('back-end/css/bootstrap.min.css')!!}
    {{--<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">--}}

    <!-- plugins -->
    {!!Html::style('back-end/css/plugins/font-awesome.min.css')!!}
    {!!Html::style('back-end/css/plugins/animate.min.css')!!}
    {!!Html::style('back-end/css/style.css')!!}

    @yield('style')

    {{--<link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>--}}
    {{--<link href="asset/css/style.css" rel="stylesheet">--}}
    <!-- end: Css -->

    <link rel="shortcut icon" href="/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!!Html::script('back-end/js/html5shiv.min.js')!!}
    {!!Html::script('back-end/js/respond.min.js')!!}
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
</head>

<body id="mimin" class="dashboard">
<!-- start: Header -->
@include('layouts.back-end.menu-top')
<!-- end: Header -->

<div class="container-fluid mimin-wrapper">

    <!-- start:Left Menu -->
    @include('layouts.back-end.menu-side')
    <!-- end: Left Menu -->


    <!-- start: Content -->
    <div id="content">
        @yield('cabecera')
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
    <!-- end: content -->

</div>

<!-- start: Mobile -->
@include('layouts.back-end.menu-mobile')
<!-- end: Mobile -->


<!-- end: Content -->
<!-- start: Javascript -->
{!!Html::script('back-end/js/jquery.min.js')!!}
{!!Html::script('back-end/js/jquery.ui.min.js')!!}
{!!Html::script('back-end/js/bootstrap.min.js')!!}
{{--<script src="asset/back-end/js/jquery.min.js"></script>--}}
{{--<script src="asset/back-end/js/jquery.ui.min.js"></script>--}}
{{--<script src="asset/back-end/js/bootstrap.min.js"></script>--}}


<!-- plugins -->
{!!Html::script('back-end/js/plugins/moment.min.js')!!}
{!!Html::script('back-end/js/plugins/jquery.nicescroll.js')!!}
{{--<script src="asset/back-end/js/plugins/moment.min.js"></script>--}}
{{--<script src="asset/back-end/js/plugins/jquery.nicescroll.js"></script>--}}


<!-- custom -->
{!!Html::script('back-end/js/main.js')!!}
{{--<script src="asset/js/main.js"></script>--}}
<!-- end: Javascript -->

<!-- Modal Bootstrap-->
<div id='modalBs' class='modal fade'>
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>


{!!Html::script('js/inicio.js')!!}

@yield('script')

<script>
    $(function () {
        var CURRENT_URL = window.location.href;
        // console.log(CURRENT_URL);
        var contador = 1;
        if(CURRENT_URL.split("/")[3]=="")
            CURRENT_URL = CURRENT_URL.substring(0,CURRENT_URL.length-1);

        $("#left-menu").find('a[href="' + CURRENT_URL + '"]').parents("li").addClass("active").children("a").addClass("active");
    });
</script>
</body>
</html>