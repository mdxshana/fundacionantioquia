@extends('layouts.back-end.layout')

@section('style')
    {!!Html::style('plugins/bootstrapFileInput/css/fileinput.min.css')!!}
    <style>
        .editProfPic{
            position:absolute;
            bottom:0;
            z-index:1;
            text-align: right;
            padding-bottom: 9px;
            color: #0c0c0c;
            right: 0;
            padding-right: 15px;
        }
        .eliminar{
            background-color: rgba(195, 195, 195, 0.46);
            border-radius: 50%;
            padding: 5px;
        }
        .eliminar:hover{
            background-color: rgb(251, 255, 255);
            cursor: pointer;
        }
        .confirmation .popover-content {
            width: 125px;
        }
        .btn-xs{
            padding: 4px 10px;
        }
    </style>
@endsection

@section('cabecera')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Administrar Álbum</h3>
                <p class="animated fadeInDown">
                    Admin <span class="fa-angle-right fa"></span> Galerias <span class="fa-angle-right fa"></span> Álbum
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot-15">
                <div class="col-xs-6 text-center">
                    <div style="padding:15px; border: dashed 2px #c3bbbb">
                        <form class="form-inline" id="formNombre">
                            <div class="form-group">
                                <label for="nombre" style="padding: 0 15px; font-size: 15px"><b>Nombre:</b></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$album->nombre}}" style="padding: 0 15px" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary">Actualizar <span class="hidden listo"><i class="fa fa-check"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>Agregar Imagenes</b></h3></div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <input id='inputGalery' name='inputGalery[]' type='file'  multiple class='file-loading' accept='image/*'>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12" id="fotos">
            @foreach($album->getImagenes as $foto)
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" data-imagen="{{$foto->id}}" data-ruta="{{$foto->url}}">
                    <div class="panel">
                        <div class="panel-body" style="padding: 7px;">
                            <center>
                                <div class="editProfPic">
                                    <i class='fa fa-trash fa-2x eliminar manito' aria-hidden='true' data-toggle='confirmation' data-singleton="true" data-placement='top' title='Eliminar?' data-btn-ok-label="Si" data-btn-cancel-label="No"></i>
                                </div>
                                <img src="/images/{{$foto->url}}" width="100%" height="230px">
                            </center>    
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div id="modalNotif" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header alert-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modalTitulo">Modal Header</h4>
                </div>
                <div class="modal-body" id="modalCuerpo">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Entendido!</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    {!!Html::script('plugins/bootstrapConfirmation/bootstrap-confirmation.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/plugins/canvas-to-blob.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/plugins/sortable.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/plugins/purify.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/fileinput.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/locales/es.js')!!}
    <script>
        var totalGaleria;
        $(function(){

            totalGaleria = "{{count($album->getImagenes)}}";
            $(".eliminar").each(function(){
                $(this).confirmation({
                    onConfirm: function () {
                        ajaxEliminarImagen($(this).parent().parent().parent().parent().parent());
                    }
                });
            });

            $("#inputGalery").fileinput({
                uploadAsync : true,
                uploadUrl : "{{route('subirImagen')}}",
                language: "es",
                maxFileCount: 10,
                showUpload: true,
                uploadExtraData : {album:"{!!$album->id!!}"},
                previewFileType: 'image',
                allowedFileTypes: ['image'],
                allowedFileExtensions: ['jpg', 'gif', 'png'],
                previewSettings:{ image: {width: "200px", height: "160px"}},
                minImageWidth: 500,
                minImageHeight: 500,
                maxFileSize: 2048
            }).on('fileuploaded', function(e, params) {
                $("#fotos").append("<div class='col-xs-6 col-sm-6 col-md-4 col-lg-3' data-imagen='"+params.response.id+"' data-ruta='"+params.response.ruta+"'>" +
                                        "<div class='panel'>" +
                                            "<div class='panel-body' style='padding: 7px;'>" +
                                                "<center>" +
                                                    "<div class='editProfPic'>" +
                                                        "<i class='fa fa-trash fa-2x eliminar manito' aria-hidden='true' data-toggle='confirmation' data-singleton='true' data-placement='top' title='Eliminar?' data-btn-ok-label='Si' data-btn-cancel-label='No'></i>" +
                                                    "</div>" +
                                                    "<img src='/images/"+params.response.ruta+"' width='100%' height='230px'>"+
                                                "</center>" +
                                            "</div>" +
                                        "</div>" +
                                    "</div>");
                totalGaleria++;
            });
        });

        $("#fotos").on('click', '.eliminar', function(){
            $(this).confirmation({
                onConfirm: function () {
                    ajaxEliminarImagen($(this).parent().parent().parent().parent().parent());
                }
            });
        });

        function ajaxEliminarImagen(elemento) {
            if (totalGaleria > 1) {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('deleteImage')}}',
                    data: "&id=" + elemento.data('imagen') + "&ruta=" + elemento.data('ruta'),
                    success: function (data) {
                        if (data.estado) {
                            elemento.remove();
                            totalGaleria--;
                        }
                        else{
                            $("#modalTitulo").html("Error!");
                            $("#modalCuerpo").html(data.mensaje);
                            $("#modalNotif").modal();
                        }
                    },
                    error: function (data) {
                    }
                });
            }
            else {
                $("#modalTitulo").html("Error!");
                $("#modalCuerpo").html("El álbum no puede quedar sin imagenes.");
                $("#modalNotif").modal();
            }
        }

        $('#formNombre').on('submit', function (e) {
            e.preventDefault();
            if($("#nombre").val() != ""){
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('updateAlbum')}}',
                    data: $(this).serialize() + "&id=" + '{{$album->id}}',
                    success: function (data) {
                        if (data== "exito") {
                            $(".listo").removeClass('hidden');
                        }
                        else{
                            $("#modalTitulo").html("Error!");
                            $("#modalCuerpo").html(data+"<br>Por favor inténtalo de nuevo.");
                            $("#modalNotif").modal();
                        }
                    },
                    error: function (data) {
                    }
                });
            }
            else {
                $("#modalTitulo").html("Error!");
                $("#modalCuerpo").html("El nombre del álbum no puede ser vacio.");
                $("#modalNotif").modal();
            }
        });
    </script>
@endsection