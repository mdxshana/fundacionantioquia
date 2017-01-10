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
        .bordered{
            border: solid 1px #040604;
            border-radius: 5px;
        }
        .contenedorFoto{
            padding-left: 0px;
            padding-right: 0px;
            margin-bottom: 5px;
        }
        .foto{
            margin-left: 2px;
            height: 100%;
            margin-right: 2px;
        }
        .eliminar{
            background-color: rgba(195, 195, 195, 0.46);
            border-radius: 50%;
            padding: 5px;
        }
        .eliminar:hover{
            background-color: rgb(251, 255, 255);
        }
        .manito {
            cursor: pointer;
        }
        @media (max-width: 445px){
            .contenedorFoto{
                height: 150px;
            }
        }
        @media (min-width: 446px) and (max-width: 767px) {
            #divFotoPerfil{
                margin-left: 25%;
                margin-right: 25%;
            }
        }
        @media (min-width: 446px) and (max-width: 851px) {
            .contenedorFoto{
                height: 190px;
            }
        }
        @media (min-width: 852px) and (max-width: 991px) {
            .galeria{
                margin-left: 5px;
                margin-right: 5px;
            }
            .contenedorFoto{
                height: 190px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            .galeria{
                margin-left: 5px;
                margin-right: 5px;
            }
            .contenedorFoto{
                height: 210px;
            }
        }
        @media (min-width: 1200px){
            .galeria{
                margin-left: 5px;
                margin-right: 5px;
            }
            .contenedorFoto{
                height: 180px;
            }
        }

        #divImagenes, .tema{
            margin-left: 20px;
            margin-right: 20px;
        }
        .btn-xs{
            padding: 4px 10px;
        }
        .popover-content {
            width: 125px;
        }
        .titulos, .textos{
            color: #83838a;
        }
        .mar-bot15{
            margin-bottom: 15px
        }

    </style>
@endsection

@section('cabecera')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Administración de inicio</h3>
                <p class="animated fadeInDown">
                    Admin <span class="fa-angle-right fa"></span> Inicio
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>Galería</b></h3></div>
                <div class="col-md-12">Edita las imágenes de la página principal <small>(max. 6)</small></div>
            </div>

            <div class="row" id="divImagenes" style="padding: 10px;">
                <div class="galeria" id="galeria">
                    @for($i=0;$i<count($galeria->getImagenes);$i++)
                        <div class="col-xs-6 col-md-4 col-lg-2 contenedorFoto" data-id={{$galeria->getImagenes[$i]->id}} data-ruta={{$galeria->getImagenes[$i]->url}}>
                            <div class="editProfPic">
                                <i class='fa fa-trash fa-2x eliminar manito' aria-hidden='true' data-toggle='confirmation' data-singleton="true" data-placement='top' title='Eliminar?' data-btn-ok-label="Si" data-btn-cancel-label="No"></i>
                            </div>
                            <div class="foto bordered">
                                <img class="img-rounded img-responsive" src="/images/{{$galeria->getImagenes[$i]->url}}" style="height: 100%; width:100%">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="row mar-bot15">
                <div class="col-xs-12" id="divUploadImages"></div>
            </div>

            <div class="row">
                <div class="col-xs-12" id="alertImg"></div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>Texto</b><span style="color: red;">*</span></h3></div>
                <div class="col-md-12 textos">Edita el texto que aparece en la descripción de la página principal</div>
            </div>
            <form id="textoInicio">
                <div class="row">
                    <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='infoAdicional' name='infoAdicional' rows='10' cols='30' style='height:440px'>
                            {!! $texto[0]->texto !!}
                        </textarea>
                    </div>
                </div>

                <div class="row mar-bot15">
                    <div class="col-sm-6 col-sm-offset-6 text-right" style="color: red;"><b>*Atencion: </b>Estos cambios se reflejan directamente en la página principal, edita apropiadamente esta sección.</div>
                </div>

                <div class="row mar-bot15">
                    <div class="col-xs-12 text-right">
                        <button type='submit' class='btn btn-primary'>Guardar</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertTexto"></div>
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
    {!!Html::script('plugins/ckeditor/ckeditor.js')!!}

    <script>
        var totalGaleria = 0;
        var imagesCargadas = 0;
        $(function(){
            CKEDITOR.replace('infoAdicional', {removeButtons:'Image'});

            totalGaleria = "{!!count($galeria->getImagenes)!!}";
            validarUpload(totalGaleria);

            $(".eliminar").each(function(){
                $(this).confirmation({
                    onConfirm: function () {
                        ajaxEliminarImagen($(this).parent().parent());
                        totalGaleria--;
                        validarUpload(totalGaleria);
                    }
                });
            });
        });

        $(".galeria").on('click', '.eliminar', function(){
            $(this).confirmation({
                onConfirm: function () {
                    ajaxEliminarImagen($(this).parent().parent());
                    totalGaleria--;
                    validarUpload(totalGaleria);
                }
            });
        });

        function ajaxEliminarImagen(elemento) {
            $.ajax({
                type:"POST",
                context: document.body,
                url: '{{route('deleteImage')}}',
                data: "&id=" + elemento.attr('data-id') + "&ruta=" + elemento.attr('data-ruta'),
                success: function(data){
                    if (data == "exito"){
                        elemento.remove();
                    }
                },
                error: function(data){
                }
            });
        }

        function validarUpload($cantImagenes) {
            if($cantImagenes != 6) {
                $("#divUploadImages").html("<div class='tema'>" +
                        "<label class='control-label'>Agregar nuevas</label>" +
                        "<input id='inputGalery' name='inputGalery[]' type='file'  multiple class='file-loading' accept='image/*'>" +
                        "</div>");
                imagesUploaded=0;
                $("#inputGalery").fileinput({
                    uploadAsync : true,
                    uploadUrl : 'subirimagen',
                    language: "es",
                    maxFileCount: 6-(totalGaleria),
                    showUpload: true,
                    uploadExtraData : {album:"{!!$galeria->id!!}"},
                    previewFileType: 'image',
                    allowedFileTypes: ['image'],
                    allowedFileExtensions: ['jpg', 'gif', 'png'],
                    previewSettings:{ image: {width: "200px", height: "160px"}},
                    minImageWidth: 500,
                    minImageHeight: 500,
                    maxFileSize: 2048
                }).on('fileuploaded', function(e, params) {
                    imagesUploaded++;
                    $(".galeria").append("<div class='col-xs-6 col-md-4 col-lg-2 contenedorFoto' data-id='"+params.response.id+"' data-ruta='"+params.response.ruta+"'>" +
                            "<div class='editProfPic'>" +
                            "<i class='fa fa-trash fa-2x eliminar manito' aria-hidden='true' data-toggle='tooltip confirmation' data-popout='true' data-placement='top' title='Eliminar?' data-btn-ok-label='Si' data-btn-cancel-label='No'></i>" +
                            "</div>" +
                            "<div class='foto bordered'>"+
                            "<img class='img-rounded img-responsive' src='/images/"+params.response.ruta+"' style='height: 100%; width:100%'>" +
                            "</div>" +
                            "</div>");
                    if (imagesUploaded == params.files.length){
                        totalGaleria = parseInt(totalGaleria) + parseInt(imagesUploaded);
                        validarUpload(totalGaleria);
                    }
                });
            }
            else
                $("#divUploadImages").html("");
        }

        $('#textoInicio').on('submit', function (e) {
            e.preventDefault();
            var contenido = encodeURIComponent(CKEDITOR.instances.infoAdicional.getData().split("\n").join(""));
            if (contenido != "") {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editTexto')}}',
                    data: "&inicio=" + JSON.stringify({id:'{{$texto[0]->id}}', texto:contenido}),
                    success: function (data) {
                        if (data == "exito"){
                            $("#alertTexto").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
                                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                                        "<span aria-hidden='true'>&times;</span>" +
                                    "</button>" +
                                    "<strong>Correcto!</strong> El contenido de la pagina de inicio ha sido actualizado con exito.</div>");
                        }
                    },
                    error: function () {
                        console.log('error en la concexción');
                    }
                });
            }
            else {
                $("#alertTexto").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                        "<span aria-hidden='true'>&times;</span>" +
                        "</button>" +
                        "<strong>Error!</strong> Debes ingresar algún texto para mostrar en la página principal.</div>");
            }
        });


    </script>
@endsection