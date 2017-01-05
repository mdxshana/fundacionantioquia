<!DOCTYPE html>
<html>
<head>
    <title>Light Blue - Admin Template</title>
    {!!Html::style('back-end/css/application.min.css')!!}
    <link rel="shortcut icon" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="single-widget-container">
    <section class="widget login-widget">
        <header class="text-align-center">
            <h4>Ingrese a su cuenta</h4>
        </header>
        <div class="body">
            {!!Form::open(['route' => 'login','class'=>'no-margin'])!!}
            <fieldset>
                <div class="control-group no-margin">
                    <label class="control-label" for="email">Email</label>
                    <div class="control">
                        <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="eicon-user icon-large"></i>
                                </span>
                            <input id="email" type="email" placeholder="tu Email" name="email" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="password">Contraseña</label>
                    <div class="control">
                        <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="icon-lock icon-large"></i>
                                </span>
                            <input id="password" type="password" name="password" placeholder="tu contraseña" />
                        </div>
                    </div>
                </div>
            </fieldset>
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
            <div class="form-actions">
                <button type="submit" class="btn btn-block btn-large btn-danger">
                    <span class="small-circle"><i class="icon-caret-right"></i></span>
                    <small>Iniciar Sesión</small>
                </button>
                <div class="forgot"><a class="forgot" href="#">Olvidaste tu contraseña?</a></div>
            </div>
            {!!Form::close()!!}
        </div>
    </section>
</div>

{!!Html::script('back-end/lib/jquery/jquery.1.9.0.min.js')!!}
{!!Html::script('back-end/lib/backbone/underscore-min.js')!!}
{!!Html::script('back-end/js/settings.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-alert.js')!!}
</body>
</html>