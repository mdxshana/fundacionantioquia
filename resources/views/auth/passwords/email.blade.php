<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurar Contraseña</title>
    <meta name='csrf-param' content='authenticity_token'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- start: Css -->
{!!Html::style('back-end/css/bootstrap.min.css')!!}

  <!-- plugins -->
    {!!Html::style('back-end/css/plugins/font-awesome.min.css')!!}
    {!!Html::style('back-end/css/plugins/simple-line-icons.css')!!}
    {!!Html::style('back-end/css/plugins/animate.min.css')!!}
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

    <body id="mimin" class="form-signin-wrapper">

      <div class="container">
          {!!Form::open(['id'=>'formEnviarEmail','class'=>'form-signin'])!!}
          <div class="panel periodic-login" style="margin-top: 25%">
              {{--<span class="atomic-number">28</span>--}}
              <div class="panel-body text-center">
                  {{--<h1 class="atomic-symbol">Mi</h1>--}}
                  {{--<p class="atomic-mass">14.072110</p>--}}
                  {{--<p class="element-name">Miminium</p>--}}
                  <h3>Restablecer Contraseña</h3>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="email" required>
                    <span class="bar"></span>
                    <label>Email</label>
                    <p>Ingrese su correo electrónico para restablecer su contraseña</p>
                  </div>

                  <div class="row">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
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

                  <input type="submit" class="btn col-md-12" value="Restablecer Contraseña"/>
              </div>
                <div class="text-center" style="padding:5px;">
                    <a href="{{route("login")}}">Iniciar Sesion</a> |
                    <a href="{{route("inicio")}}">Inicio</a>
                </div>
          </div>
          {!!Form::close()!!}

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      {!!Html::script('back-end/js/jquery.min.js')!!}
      {!!Html::script('back-end/js/jquery.ui.min.js')!!}
      {!!Html::script('back-end/js/bootstrap.min.js')!!}
      <!-- custom -->
      {!!Html::script('back-end/js/main.js')!!}
      <script type="text/javascript">
       $(document).ready(function(){
         
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>