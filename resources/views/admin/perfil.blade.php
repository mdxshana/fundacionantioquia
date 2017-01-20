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
        .product-grid{
            cursor: pointer;
        }
        .avatar-select{
            box-shadow: 5px 5px 10px rgb(3, 99, 6);
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
            <h4>Actualiza tu información personal</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
            <div class="col-md-12">
                {!!Form::open(['id' => 'signupForm', 'class'=>'cmxform'])!!}
                <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
                <div class="col-md-6">
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text" id="validate_firstname" name="nombre" required value="{{Auth::user()->nombre}}">
                        <span class="bar"></span>
                        <label>Nombres</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text" id="validate_lastname" name="apellido" required  value="{{Auth::user()->apellido}}">
                        <span class="bar"></span>
                        <label>Apellidos</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="email" class="form-text" id="validate_email" name="email" required value="{{Auth::user()->email}}">
                        <span class="bar"></span>
                        <label>Email</label>
                    </div>
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text" id="telefono" name="telefono" required  value="{{Auth::user()->telefono}}">
                        <span class="bar"></span>
                        <label>Telefono</label>
                    </div>
                </div>
                <div class="row">
                    <div id="notif" class="col-xs-6 col-sm-offset-3">


                    </div>
                </div>
                <div class="col-md-12">
                    <input class="submit btn btn-primary" type="submit" value="Actualizar" >
                    <a class="btn btn-circle btn-gradient btn-success editarPass"style="width: 34px; height: 34px; font-size: 12px;" data-toggle="tooltip" data-placement="bottom" title="Cambiar contraseña"> <span class="fa fa-key"></span></a>
                </div>
                {!!Form::close()!!}

            </div>
        </div>

    </div>

    <div class="col-md-12 panel" style="margin-top: 15px;">
        <div class="col-md-12 panel-heading">
            <h4>Selecciona tu avatar <span id="actAvatar"></span></h4>
        </div>
        <div id="avatars" class="col-md-12 panel-body" style="padding-bottom:30px;">

            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar.png">
                    <img src="/img/avatar.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-hombre-1.png">
                    <img src="/img/avatar-hombre-1.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-hombre-2.png">
                    <img src="/img/avatar-hombre-2.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-hombre-3.png">
                    <img src="/img/avatar-hombre-3.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-hombre-4.png">
                    <img src="/img/avatar-hombre-4.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-mujer-1.png">
                    <img src="/img/avatar-mujer-1.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-mujer-2.png">
                    <img src="/img/avatar-mujer-2.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-mujer-3.png">
                    <img src="/img/avatar-mujer-3.png" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 product-grid">
                <div class="thumbnail" data-avatar="avatar-mujer-4.png">
                    <img src="/img/avatar-mujer-4.png" alt="...">
                </div>
            </div>

        </div>

    </div>
    <div id="modalEditPass" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center">Cambiar tu contraseña</h4>
                </div>
                {!!Form::open(['id'=>'formEditarPass','class'=>'form-horizontal', 'autocomplete'=>'off'])!!}
                <div class="modal-body">
                    <div class="row" style="margin: 0 10px;">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important; margin-right: 3px;">
                                <input type="password" class="form-text" id="passwordA" name="passwordA" required >
                                <span class="bar"></span>
                                <label>Contraseña Actual</label>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="margin: 0 10px;">
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-right: 3px;">
                                <input type="password" class="form-text" id="password" name="password" required >
                                <span class="bar"></span>
                                <label>Nueva Contraseña</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-left: 3px;">
                                <input type="password" class="form-text" id="passwordC" name="passwordC" required>
                                <span class="bar"></span>
                                <label>Confirmar Contraseña</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div id="notifP" class="col-xs-12">


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Guardar contraseña',['class'=>'btn btn-primary']) !!}
                </div>
                {!!Form::close()!!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    {!!Html::script('plugins/bootstrapConfirmation/bootstrap-confirmation.min.js')!!}
    <script>
        var avatar= "{{Auth::user()->avatar}}";
        var id = "{{Auth::user()->id}}";
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
                    url: '{{route('editAdmin')}}',
                    data: formAddAdmin.serialize(),
                    success: function (data) {

                        var html = '<div class="alert alert-success alert-dismissable">'+
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                            '<strong>Perfecto!</strong> Tu información fue actualizada exitosamente'+
                            '</div>';
                        $("#notif").html(html);
                    },
                    error: function (data) {

                    }
                });
            });

            $(".thumbnail").each(function(){
                if($(this).data("avatar")==avatar)
                    $(this).addClass("avatar-select");

            });

            $(".thumbnail").click(function () {
                $(".thumbnail").removeClass("avatar-select");
                $(this).addClass("avatar-select");
                var avatarSelect = $(this).data("avatar");
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('actualizarAvatar')}}',
                    data: {"id":id,"avatar":avatarSelect},
                    success: function (data) {
                       $("#actAvatar").html("(Avatar actualizado)");
                        setTimeout(function(){
                            $("#actAvatar").html("");
                        }, 3000);
                    },
                    error: function (data) {
                    }
                });
            });


            $(".editarPass").click(function () {
                $("#modalEditPass").modal("show");
            });
            var formActualizarPass = $("#formEditarPass");
            formActualizarPass.submit(function(e){
                e.preventDefault();


                if($("#password").val()!=""){

                    if($("#password").val()==$("#passwordC").val()){
                        $("#alert").empty();
                        $(".passNueva").each(function (index, item) {
                            $(this).removeClass("has-error");
                        });

                        $.ajax({
                            type:"POST",
                            context: document.body,
                            url: '{{route('cambiarPassword')}}',
                            data:formActualizarPass.serialize(),
                            success: function(data){
                                if (data.bandera) {

                                    $("#notif").empty();
                                    $("#notif").append(alert("success","Perfecto",data.mensaje, 'fa-key'));
                                    $("#modalEditPass").modal("hide");
                                    //console.log("exito");
                                }
                                else {
                                    $("#notifP").empty();
                                    $("#notifP").append(alert("danger","Error" ,data.mensaje, 'fa-key'));
                                }
                            },
                            error: function(){
                                console.log('ok');
                            }
                        });
                    }else{
                        $("#notifP").empty();
                        $("#notifP").append(alert("danger","Error" ,"La contraseña no coinciden", 'fa-key'));

                        $(".passNueva").each(function (index, item) {
                            $(this).addClass("has-error");
                        })
                    }
                }
            });
        });

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

        function alert(tipo,estado,mensaje ,fontawesome) {
            html='<div class="alert alert-'+tipo+' text-center" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<i class="fa '+fontawesome+'" aria-hidden="true"></i><strong>'+estado+' :  </strong>'+mensaje+
                '</div>';

            return html;
        }

    </script>


@endsection