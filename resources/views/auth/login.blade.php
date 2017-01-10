<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="description" content="Miminium Admin Template v.1">
    <meta name="author" content="Isna Nur Azis">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>

    <!-- start: Css -->
    {!!Html::style('back-end/css/bootstrap.min.css')!!}

    <!-- plugins -->
    {!!Html::style('back-end/css/plugins/font-awesome.min.css')!!}
    {!!Html::style('back-end/css/plugins/simple-line-icons.css')!!}
    {!!Html::style('back-end/css/plugins/animate.min.css')!!}
    {!!Html::style('back-end/css/plugins/icheck/skins/flat/aero.css')!!}
    {!!Html::style('back-end/css/style.css')!!}
    <!-- end: Css -->

    <link rel="shortcut icon" href="asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        {!!Html::script('back-end/js/html5shiv.min.js')!!}
        {!!Html::script('back-end/js/respond.min.js')!!}
        <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
</head>

<body id="mimin" class="dashboard form-signin-wrapper">

<div class="container">

    {!!Form::open(['route' => 'login','class'=>'form-signin',"id"=>"login"])!!}
        <div class="panel periodic-login" style="margin-top: 25%;" >
            {{--<span class="atomic-number">28</span>--}}
            <div class="panel-body text-center">
                {{--<h4 class="atomic-symbol">Iniciar Sesión</h4>--}}
                {{--<p class="atomic-mass">14.072110</p>--}}
                {{--<p class="element-name">Miminium</p>--}}
                <h3>Iniciar Sesión</h3>
                {{--<i class="icons icon-arrow-down"></i>--}}
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{--<input type="email" class="form-text" name="email" required>--}}
                    {!!Form::text('email',"",['class'=>'form-text','id'=>'email' , 'required'])!!}
                    <span class="bar"></span>
                    <label>Email</label>
                </div>
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {!!Form::password('password',['class'=>'form-text','id'=>'password' ,'required'])!!}
                    {{--<input type="password" class="form-text" name="password" required>--}}
                    <span class="bar"></span>
                    <label>Contraseña</label>
                </div>

                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none; color: #000;">&times;</a>
                            <strong>Ups!</strong> Favor corregir los siguientes errores.<br><br>
                            <ul class="text-left">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <label class="pull-left">
                            <input type="checkbox" class="icheck pull-left" name="remember"/> Remember me
                        </label>
                    </div>
                    <div class="col-xs-12">
                        <input type="submit" class="btn col-md-12" value="SignIn"/>
                    </div>
                </div>



            </div>
            <div class="text-center" style="padding:5px;">
                <a href="{{route("getEmail")}}">Forgot Password </a>
                <a href="reg.html">| Signup</a>
            </div>
        </div>
    {!!Form::close()!!}

</div>

<!-- end: Content -->
<!-- start: Javascript -->
{!!Html::script('back-end/js/jquery.min.js')!!}
{!!Html::script('back-end/js/jquery.ui.min.js')!!}
{!!Html::script('back-end/js/bootstrap.min.js')!!}


{!!Html::script('back-end/js/plugins/moment.min.js')!!}
{!!Html::script('back-end/js/plugins/icheck.min.js')!!}

<!-- custom -->
{!!Html::script('back-end/js/main.js')!!}
<script type="text/javascript">
    $(document).ready(function(){

        $("#email").html("");
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-aero',
            radioClass: 'iradio_flat-aero'
        });
    });
</script>
<!-- end: Javascript -->
</body>
</html>