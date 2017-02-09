@extends('layouts.back-end.layout')

@section('style')
    <style>
        .pointer{
            cursor: pointer;
        }
        .panel-album, .nuevo{
            -webkit-transition:all .9s ease; /* Safari y Chrome */
            -moz-transition:all .9s ease; /* Firefox */
            -o-transition:all .9s ease; /* IE 9 */
            -ms-transition:all .9s ease;
        }
        .panel-album:hover, .nuevo:hover{
            -webkit-transform:scale(1.13);
            -moz-transform:scale(1.13);
            -ms-transform:scale(1.13);
            -o-transform:scale(1.13);
            transform:scale(1.13);
            z-index: 1000000;
        }
        .nuevo:hover{
            color: blue;
        }
        .editProfPic{
            position:absolute;
            top:15px;
            z-index:1;
            text-align: right;
            /*padding-top: 9px;*/
            color: #a10000;
            right: 10px;
            /*margin-right: 20px;*/
        }
        .eliminar{
            background-color: white;
            border-radius: 50%;
            padding: 5px;
        }
        .eliminar:hover{
            background-color: rgb(251, 255, 255);
            cursor: pointer;
        }
        .panel-album{
            position: relative;
        }
        .confirmation .popover-content {
            width: 180px;
        }
        .btn-xs{
            padding: 4px 10px;
        }
        .confirmation-content{
            color: #0c0c0c;
            font-size: 13px;
        }
    </style>
@endsection

@section('cabecera')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Administrar galerias</h3>
                <p class="animated fadeInDown">
                    Admin <span class="fa-angle-right fa"></span> Galerias
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12" id="albums">
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2" id="padreNuevo">
                <div class="panel pointer nuevo">
                    <div class="panel-body" style="padding: 70px 0;">
                        <center>
                            <i class="fa fa-plus-square fa-4x"></i>
                            <div style="padding-top: 5px">Agregar Álbum</div>
                        </center>
                    </div>
                </div>
            </div>

            @foreach($albums as $album)
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                    <div class="panel pointer panel-album" data-album="{{$album->id}}">
                        <div class="editProfPic">
                            <i class='fa fa-trash fa-2x eliminar manito' aria-hidden='true' data-toggle='confirmation' data-singleton="true" data-placement='top' title='Atencion!'  data-content="El álbum y sus imágenes se borrarán, ¿Continuar?:" data-btn-ok-label="Si" data-btn-cancel-label="No"></i>
                        </div>
                        <div class="album">
                            <div class="panel-body" style="padding: 0;">
                                <center>
                                    @if($album->portada != null)
                                        <img src="/images/{{$album->portada->url}}" width="100%" height="158px">
                                    @else
                                        <img src="/images/noImage.png" width="100%" height="158px">
                                    @endif
                                </center>
                            </div>
                            <div class="panel-footer">
                                <b>{{$album->nombre}}</b><br>
                                <b>{{$album->cantImgs}}</b>
                                {{($album->cantImgs==1)?'Imagen':'Imagenes'}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="modalNotif" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header alert-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modalTitulo"></h4>
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
    <script>
        var totalAlbums;
        $(function(){
            $(".album").click(function(){
//                console.log($(this));
                window.location="/admin/album/"+$(this).parent().data('album');
            });

            totalAlbums = '{{count($albums)}}';
            $(".eliminar").each(function(){
                $(this).confirmation({
                    onConfirm: function (e) {
                        ajaxEliminarAlbum($(this).parents('.panel-album'));

                    }
                });
            });
        });

        function ajaxEliminarAlbum(elemento, e) {
            if (totalAlbums > 1) {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('deleteAlbum')}}',
                    data: "&id=" + elemento.data('album'),
                    success: function (data) {
                        if (data.estado) {
                            elemento.parent().remove();
                            totalAlbums--;
                        }
                        else{
                            $("#modalTitulo").html("Error!");
                            $("#modalCuerpo").html(data.mensaje+"<br>Por favor inténtalo de nuevo.");
                            $("#modalNotif").modal();
                        }
                    },
                    error: function (data) {
                    }
                });

            }
            else {
                $("#modalTitulo").html("Error!");
                $("#modalCuerpo").html("La seccion <b>\"Galería\"</b> Debe contener al menos un álbum para mostrar.");
                $("#modalNotif").modal();
            }
        }

        $("#albums").on('click', '.eliminar', function(){
            $(this).confirmation({
                onConfirm: function () {
                    ajaxEliminarAlbum($(this).parent().parent().parent().parent().parent());
                }
            });
        });

        $("#padreNuevo").on('click', '.nuevo', function(){
            $(this).parent().removeClass('col-md-3 col-lg-2').addClass('col-md-4 col-lg-3');
            $(this).parent().append("<div class='panel'>" +
                                        "<div class='panel-body' style='padding: 56px 10px;'>" +
                                            "<form id='formNuevo' action='{{route('subirAlbum')}}' method='POST'>" +
                                                "<input type='hidden' name='_token' value='{{csrf_token()}}'>" +
                                                "<div class='form-group'>" +
                                                    "<label for='nombre'><b>Nombre Álbum</b></label>" +
                                                    "<input type='text' class='form-control' id='nombre' name='nombre' required>" +
                                                "</div>" +
                                                "<div class='text-center'>" +
                                                    "<button type='submit' class='btn btn-primary'>Guardar</button>" +
                                                "</div>" +
                                            "</form>" +
                                        "</div>" +
                                    "</div>");
            $(this).remove();
        });
    </script>
@endsection