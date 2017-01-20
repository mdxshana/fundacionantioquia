@extends('layouts.back-end.layout')

@section('style')
    <style>
        .btn.btn-circle{
            width: 40px;
            height: 40px;
            padding: 10px;
            font-size: 18px;
        }
        .btn-xs{
            padding: 4px 10px;
        }
        .popover-content {
            width: 130px;
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
                    <div class="row">
                        <div id="notifRegister" class="col-xs-12">


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
        <div id="admins" class="col-md-12 panel-body" style="padding-bottom:30px;">

            @foreach($users as $user)
                <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                    <div class="thumbnail">
                        <img src="/img/{{$user->avatar}}" alt="...">
                        <div class="caption">
                            <h4>{{$user->nombre." ".$user->apellido}}</h4>
                            <p><i class="fa fa-mobile fa-2x" aria-hidden="true"></i> {{$user->telefono}}</p>

                            <button class=" btn btn-circle btn-gradient btn-primary editarUser" value="primary" data-id="{{$user->id}}" data-nombre="{{$user->nombre}}" data-apellido="{{$user->apellido}}" data-telefono="{{$user->telefono}}" data-email="{{$user->email}}">
                                <span class="fa fa-pencil-square-o"></span>
                            </button>
                            <button class=" btn btn-circle btn-gradient btn-danger pull-right removeUser" value="primary" aria-hidden='true' data-id="{{$user->id}}" data-toggle='confirmation' data-singleton="true" data-placement='top' title='Eliminar?' data-btn-ok-label="Si" data-btn-cancel-label="No">
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
                    <div class="row" style="margin: 0 10px;">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important; margin-right: 3px;">
                                <input type="text" class="form-text" id="editNombre" name="nombre" required>
                                <span class="bar"></span>
                                <label>Nombres</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important; margin-right: 3px;">
                                <input type="text" class="form-text" id="editApellido" name="apellido" required>
                                <span class="bar"></span>
                                <label>Apellidos</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important; margin-left: 3px;">
                                <input type="email" class="form-text" id="editEmail" name="email" required>
                                <span class="bar"></span>
                                <label>Email</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important; margin-left: 3px;">
                                <input type="text" class="form-text" id="editTelefono" name="telefono" required>
                                <span class="bar"></span>
                                <label>Telefono</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div id="notifEdit" class="col-xs-12">


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Guardar Cambios',['class'=>'btn btn-primary']) !!}
                </div>
                {!!Form::close()!!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    {!!Html::script('plugins/bootstrapConfirmation/bootstrap-confirmation.min.js')!!}
    <script>
        $(function () {
            $(".removeUser").each(function(){
                $(this).confirmation({
                    onConfirm: function () {
                        removeUser($(this).data("id"));
                    }
                });
            });
            var formAddAdmin = $("#signupForm");
            formAddAdmin.submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('addAdmin')}}',
                    data: formAddAdmin.serialize(),
                    success: function (data) {
                        formAddAdmin.reset();
                        var html = '<div class="alert alert-success alert-dismissable">'+
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                            '<strong>Perfecto!</strong> Un nuevo administrador en el sistema.'+
                            '</div>';

                        $("#notifRegister").html(html);
                        llenarAdmins();
                        setTimeout(function(){
                            $("#notifRegister").html("");
                        }, 2000);
                    },
                    error: function (data) {

                    }
                });
            });

            var formEditUser = $("#formEditarUser");
            formEditUser.submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editAdmin')}}',
                    data: formEditUser.serialize(),
                    success: function (data) {
                            if(data.estado){

                                var html = '<div class="alert alert-success alert-dismissable">'+
                                    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                                    '<strong>Perfecto!</strong> Los cambios fueron guardados satisfactoriamente.'+
                                    '</div>';

                                $("#notifEdit").html(html);

                                llenarAdmins();
                                setTimeout(function(){
                                    $('#modalEditUser').modal('hide');
                                    $("#notifEdit").html("");
                                }, 2000);

                            }
                        },
                    error: function (data) {
                        var html = '<div class="alert alert-success alert-dismissable">'+
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                            '<strong>Error!</strong>'+data.mensaje+
                            '</div>';

                        $("#notifEdit").html(html);
                    }
                });
            });

        });

        $("#admins").on("click",".editarUser",function () {
            $("#editNombre").val($(this).data("nombre"));
            $("#editApellido").val($(this).data("apellido"));
            $("#editEmail").val($(this).data("email"));
            $("#editTelefono").val($(this).data("telefono"));
            $("#id").val($(this).data("id"));
            $('#modalEditUser').modal('show');
        });

        function llenarAdmins() {
            $.ajax({
                type: "POST",
                context: document.body,
                url: '{{route('getAdmins')}}',
                data: [],
                success: function (data) {
                    $("#admins").html(data);
                    $(".removeUser").each(function(){
                        $(this).confirmation({
                            onConfirm: function () {
                                removeUser($(this).data("id"));
                            }
                        });
                    });
                },
                error: function (data) {
                }
            });
        }

        function removeUser(id) {
            $.ajax({
                type: "POST",
                context: document.body,
                url: '{{route('removeAdmins')}}',
                data: {"id":id},
                success: function (data) {
                    llenarAdmins();
                },
                error: function (data) {
                }
            });
        }

    </script>


@endsection