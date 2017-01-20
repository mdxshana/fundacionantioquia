@extends('layouts.back-end.layout')

@section('style')
    {!!Html::style('plugins/bootstrapFileInput/css/fileinput.min.css')!!}
    <style>

        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }
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
        .eliminar, .eliminar2{
            background-color: rgba(195, 195, 195, 0.46);
            border-radius: 50%;
            padding: 5px;
        }
        .eliminar:hover, .eliminar2:hover{
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
        @media (min-width: 768px) and (max-width: 851px) {
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
        .confirmation .popover-content {
            width: 125px;
        }
        .titulos, .textos{
            color: #83838a;
        }
        .el2{
            padding-bottom: 20px;
            padding-right: 18px;
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

    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>Servicios</b></h3></div>
                <div class="col-md-12 textos">Administra los servicios que aparecerán en la sección <b>servicios</b> de la pagina principal.</div>
            </div>

            <div class="row servicios">
                <div class="col-sm-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Agregar nuevo</b></div>
                        <div class="panel-body">
                            {!!Form::open(['id'=>'servicio','files' => true,'autocomplete'=>'off'])!!}
                                <div class="form-group col-sm-12">
                                    <label for="titulo">Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="fotoServicio">Imagen</label>
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title"></span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="fotoServicio" id="fotoServicio" required/>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <button type='submit' class='btn btn-primary'>Guardar</button>
                                </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
                @foreach($servicios as $servicio)
                    <div class="col-sm-3 col-md-3" data-id="{{$servicio->id}}" data-ruta="{{$servicio->imagen}}">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>{{$servicio->descripcion}}</b></div>
                            <div class="panel-body">
                                <div class="editProfPic el2">
                                    <i class='fa fa-trash fa-2x eliminar2 manito' aria-hidden='true' data-toggle='confirmation' data-singleton="true" data-placement='top' title='Eliminar?' data-btn-ok-label="Si" data-btn-cancel-label="No"></i>
                                </div>
                                <img src="/images/{{$servicio->imagen}}" width="100%" height="176px" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    {!!Html::script('plugins/ckeditor/ckeditor.js')!!}

    <script>
        var totalGaleria = 0;
        var imagesCargadas = 0;
        var totalServicios = 0;
        $(function(){
            var closebtn = $('<button/>', {
                type:"button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;'
            });
            closebtn.attr("class","close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger:'manual',
                html:true,
                title: "<strong>Vista previa</strong>"+$(closebtn)[0].outerHTML,
                content: "There's no image",
                placement:'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function(){
                $('.image-preview').attr("data-content","").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function (){
                var img = $('<img/>', {
                    id: 'dynamic',
                    width:250,
                    height:200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                };
                reader.readAsDataURL(file);
            });

            CKEDITOR.replace('infoAdicional', {
                toolbar: [
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript','Superscript'] },
                    { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                    { name: 'styles', items: [ 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                    { name: 'insert', items: [ 'Table' ] },
                    { name: 'editing', items: [ 'Scayt' ] }
                ],
                height: 200
            }).config.resize_enabled = false;
            CKEDITOR.instances.infoAdicional.on('key',function(event){
                var deleteKey = 46;
                var backspaceKey = 8;
                var keyCode = event.data.keyCode;
                if (keyCode === deleteKey || keyCode === backspaceKey)
                    return true;
                else
                {
                    var textLimit = 300;
                    var str = CKEDITOR.instances.infoAdicional.getData();
                    if (str.length >= textLimit)
                        return false;
                }
            });

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

            totalServicios = "{{count(($servicios))}}";
            $(".eliminar2").each(function(){
                $(this).confirmation({
                    onConfirm: function () {
                        ajaxEliminarServicio($(this).parent().parent().parent().parent());
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


        $(".servicios").on('click', '.eliminar2', function(){
            $(this).confirmation({
                onConfirm: function () {
                    ajaxEliminarServicio($(this).parent().parent().parent().parent());
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

        function ajaxEliminarServicio(elemento) {
            console.log(elemento);
            if(totalServicios > 4){
                $.ajax({
                    type:"POST",
                    context: document.body,
                    url: '{{route('deleteServicio')}}',
                    data: "&id=" + elemento.attr('data-id') + "&ruta=" + elemento.attr('data-ruta'),
                    success: function(data){
                        if (data.estado){
                            elemento.remove();
                            totalServicios = parseInt(totalServicios)-1;
                        }
                        else {
                            $("#modalTitulo").html("Error!");
                            $("#modalCuerpo").html(data.mensaje);
                            $("#modalNotif").modal();
                        }
                    },
                    error: function(data){
                    }
                });
            }
            else{
                $("#modalTitulo").html("Error!");
                $("#modalCuerpo").html("No se permitirá tener menos de 4 servicios registrados!");
                $("#modalNotif").modal();
            }
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
            var contenido = encodeURIComponent((CKEDITOR.instances.infoAdicional.getData().split("\n").join("")).replace(/"/g,'\'').split("\t").join(""));
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
                            setTimeout(function(){ $("#alertTexto").html(""); }, 4000);
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

        $(document).on('click', '#close-preview', function(){
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                    function () {
                        $('.image-preview').popover('show');
                    },
                    function () {
                        $('.image-preview').popover('hide');
                    }
            );
        });

        $('#servicio').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: '{{route('insertServicio')}}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if(data.estado){
                        $(".servicios").append("<div class='col-sm-3 col-md-3' data-id='"+data.id+"' data-ruta='"+data.nueva+"'>" +
                                                    "<div class='panel panel-default'>" +
                                                        "<div class='panel-heading text-center'><b>"+data.titulo+"</b></div>" +
                                                        "<div class='panel-body'>" +
                                                            "<div class='editProfPic el2'>" +
                                                                "<i class='fa fa-trash fa-2x eliminar2 manito' aria-hidden='true' data-toggle='confirmation' data-singleton='true' data-placement='top' title='Eliminar?' data-btn-ok-label='Si' data-btn-cancel-label='No'></i>" +
                                                            "</div>" +
                                                            "<img src='/images/"+data.nueva+"' width='100%' height='176px'>" +
                                                        "</div>" +
                                                    "</div>" +
                                                "</div>");
                        $('.image-preview').attr("data-content","").popover('hide');
                        $('.image-preview-filename').val("");
                        $('.image-preview-clear').hide();
                        $('.image-preview-input input:file').val("");
                        $(".image-preview-input-title").text("Cambiar");
                        $("#titulo").val("");
                        totalServicios = parseInt(totalServicios)+1;
                    }
                    else {
                        $("#modalTitulo").html("Error!");
                        $("#modalCuerpo").html(data.mensaje);
                        $("#modalNotif").modal();
                    }
//
                },
                error: function () {
                    console.log('error en la concexción');
                }
            });

        });



    </script>
@endsection