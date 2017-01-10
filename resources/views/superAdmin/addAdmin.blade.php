@extends('layouts.back-end.layout')

@section('style')
    <style>
        .btn.btn-circle{
            width: 40px;
            height: 40px;
            padding: 10px;
            font-size: 18px;
        }
    </style>
@endsection

@section('cabecera')
{{--        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Article v1</h3>
                    <p class="animated fadeInDown">
                        Pages <span class="fa-angle-right fa"></span> Article v1
                    </p>
                </div>
            </div>
        </div>--}}
@endsection

@section('content')


    <div class="col-md-12 panel" style="margin-top: 15px;">
        <div class="col-md-12 panel-heading">
            <h4>Resgistrar un nuevo Administrador</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
            <div class="col-md-12">
                {!!Form::open(['id' => 'signupForm', 'class'=>'cmxform'])!!}
                    <div class="col-md-6">
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" class="form-text" id="validate_firstname" name="nombre" required>
                            <span class="bar"></span>
                            <label>Nombres</label>
                        </div>

                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" class="form-text" id="validate_lastname" name="apellido" required>
                            <span class="bar"></span>
                            <label>Apellidos</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="email" class="form-text" id="validate_email" name="email" required>
                            <span class="bar"></span>
                            <label>Email</label>
                        </div>
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" class="form-text" id="telefono" name="telefono" required>
                            <span class="bar"></span>
                            <label>Telefono</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input class="submit btn btn-danger" type="submit" value="Registrar">
                    </div>
                {!!Form::close()!!}

            </div>
        </div>

</div>

    <div class="col-md-12 panel" style="margin-top: 15px;">
        <div class="col-md-12 panel-heading">
            <h4>Administradores Registrados</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">

            @foreach($users as $user)
                <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                    <div class="thumbnail">
                        {{--<div class="product-location">--}}
                        {{--<span class="fa-map-marker fa"></span> Banyumas--}}
                        {{--</div>--}}
                        <img src="/img/{{$user->avatar}}" alt="...">
                        <div class="caption">
                            <h4>{{$user->nombre." ".$user->apellido}}</h4>
                            <p><i class="fa fa-mobile fa-2x" aria-hidden="true"></i> {{$user->telefono}}</p>

                            <button class=" btn btn-circle btn-gradient btn-primary editarUser" value="primary">
                                <span class="fa fa-pencil-square-o"></span>
                            </button>
                            <button class=" btn btn-circle btn-gradient btn-danger pull-right removeUser" value="primary">
                                <span class="fa fa-trash"></span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <div id="modalEditUser" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                {!!Form::open(['id'=>'formEditarUser','class'=>'form-horizontal', 'autocomplete'=>'off'])!!}
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_firstname" name="nombre" required>
                                <span class="bar"></span>
                                <label>Nombres</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_lastname" name="apellido" required>
                                <span class="bar"></span>
                                <label>Apellidos</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="email" class="form-text" id="validate_email" name="email" required>
                                <span class="bar"></span>
                                <label>Email</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="telefono" name="telefono" required>
                                <span class="bar"></span>
                                <label>Telefono</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Guardar Información',['class'=>'btn btn-primary']) !!}
                </div>
                {!!Form::close()!!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')

    <script>
        $(function () {
            var $formAddAdmin = $("#signupForm");
            $formAddAdmin.submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('addAdmin')}}',
                    data: $formAddAdmin.serialize(),
                    success: function (data) {
                        if (data == "exito")
                            $("#notif").html('<strong>Correcto!</strong> La informacion se ha actualizado exitosamente.').removeClass("hidden").addClass("alert-success").removeClass("alert-danger");
                        else
                            $("#notif").html('<strong>Correo no actualizado!</strong> <p>El correo electrónico ya esta en uso por otro usuario.</p>').removeClass("hidden").addClass("alert-danger").removeClass("alert-success");
                    },
                    error: function (data) {
                        var respuesta =JSON.parse(data.responseText);
                        var arr = Object.keys(respuesta).map(function(k) { return respuesta[k] });
                        var error='<ul class="no-padding"><p>Por favor corregir los siguientes errores:</p>';
                        for (var i=0; i<arr.length; i++)
                            error += "<li>"+arr[i][0]+"</li>";
                        error += "</ul>";
                        $("#notif").html(error).removeClass("hidden").addClass("alert-danger").removeClass("alert-success");
                    }
                });



            });

            $(function () {
                $(".editarUser").click(function () {
                    console.log("click");
                    $('#modalEditUser').modal('show');
                });
            });



        });

    </script>


@endsection