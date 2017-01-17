@extends('layouts.back-end.layout')

@section('style')
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
        #alertTexto{
            margin-top: 20px;
        }
        label{
            padding-top: 10px;
        }

        @media (max-width: 445px){
            #imagen{
                height: 215px;
            }
        }
        @media (min-width: 446px) and (max-width: 767px) {
            #imagen{
                height: 250px;
            }
        }
        @media (min-width: 768px) and (max-width: 851px) {
            #imagen{
                height: 325px;
            }
        }
        @media (min-width: 852px) and (max-width: 991px) {
            #imagen{
                height: 360px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            #imagen{
                max-height: 285px;
            }
        }
        @media (min-width: 1200px){
            #imagen{
                max-height: 260px;
            }
        }
    </style>
@endsection

@section('cabecera')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Administrar Servicios</h3>
                <p class="animated fadeInDown">
                    Admin <span class="fa-angle-right fa"></span> Servicios
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>Vinculación</b></h3></div>
                <div class="col-md-12">Edita el contenido que se presentará en la sección <b>proceso de vinculación</b>.</div>
            </div>

            <div class="row">
                {!!Form::open(['id'=>'vinculacion','files' => true,'autocomplete'=>'off'])!!}
                    <div class="col-md-6" style="padding: 0 15px">
                        <div class="text-center mar-bot15">
                            <label for="vinculo"><h3><b>Imagen</b></h3></label>
                        </div>
                        <div class="col-lg-10 col-lg-offset-1 mar-bot15" id="conteImg">
                            <img src="/images/{{$imagen->imagen}}" width="100%" id="imagen">
                        </div>
                        <div class="mar-bot15">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                            <span class="input-group-btn">
                                <!-- image-preview-clear button -->
                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                    <span class="glyphicon glyphicon-remove"></span> Cancelar
                                </button>
                                <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title">Cambiar</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="vinculo" id="vinculo"/>
                                </div>
                            </span>
                            </div><!-- /input-group image-preview [TO HERE]-->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center mar-bot15">
                            <label for="txtVinculo"><h3><b>Texto</b></h3></label>
                        </div>

                        <div class="mar-bot15">
                            <textarea id='txtVinculo' name='txtVinculo'>
                                {!! $vinculacion->texto !!}
                            </textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 text-center">
                        <button type='submit' class='btn btn-primary'>Guardar</button>
                    </div>
                {!!Form::close()!!}
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertTexto"></div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>Servicio de internado</b></h3></div>
                <div class="col-md-12">Edita el contenido que se presentará en la sección <b>Servicio de internado</b>.</div>
            </div>

            <form id="internado">
                <div class="row">
                    <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='txtInternado' name='txtInternado' rows='10' cols='30'>
                            {!! $internado->texto !!}
                        </textarea>
                    </div>
                </div>

                <div class="row mar-bot15">
                    <div class="col-xs-12 text-right">
                        <button type='submit' class='btn btn-primary'>Guardar</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertInternado"></div>
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
        var imageOld = '';
        $(function(){
            imageOld = JSON.stringify({ruta:'{{$imagen->imagen}}', id:'{{$imagen->id}}'});
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
                $(".image-preview-input-title").text("Cambiar");
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
                    $(".image-preview-input-title").text("Cambiar");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                };
                reader.readAsDataURL(file);
            });

            CKEDITOR.replace('txtVinculo', {
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
            CKEDITOR.instances.txtVinculo.on('key',function(event){
                var deleteKey = 46;
                var backspaceKey = 8;
                var keyCode = event.data.keyCode;
                if (keyCode === deleteKey || keyCode === backspaceKey)
                    return true;
                else
                {
                    var textLimit = 300;
                    var str = CKEDITOR.instances.txtVinculo.getData();
                    if (str.length >= textLimit)
                        return false;
                }
            });

            CKEDITOR.replace( 'txtInternado', {
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
            CKEDITOR.instances.txtInternado.on('key',function(event){
                var deleteKey = 46;
                var backspaceKey = 8;
                var keyCode = event.data.keyCode;
                if (keyCode === deleteKey || keyCode === backspaceKey)
                    return true;
                else
                {
                    var textLimit = 900;
                    var str = CKEDITOR.instances.txtInternado.getData();
                    if (str.length >= textLimit)
                        return false;
                }
            });
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

        $('#vinculacion').on('submit', function (e) {
            e.preventDefault();
            var contenido = (CKEDITOR.instances.txtVinculo.getData().split("\n").join("")).replace(/"/g,'\'').split("\t").join("");
            if (contenido != "") {
                var formData = new FormData($(this)[0]);
                formData.append('texto', JSON.stringify({id:'{{$vinculacion->id}}', texto:contenido}));
                formData.append('imgBorrar', imageOld);
                $.ajax({
                    type: "POST",
                    url: '{{route('editVinculo')}}',
                    data: formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success: function (data) {
                        var mensaje = '';

                        if(typeof(data.imagen) != "undefined"){
                            if(!data.imagen)
                                mensaje = '<li>'+data.mensajeImg+'</li>';
                            else {
                                $("#imagen").attr('src', '/images/' + data.nueva);
                                $('.image-preview').attr("data-content","").popover('hide');
                                $('.image-preview-filename').val("");
                                $('.image-preview-clear').hide();
                                $('.image-preview-input input:file').val("");
                                $(".image-preview-input-title").text("Cambiar");
                                imageOld = data.nueva;
                            }
                        }
                        else if (!data.texto){
                            mensaje = '<li>'+data.mensajeTexto+'</li>';
                        }

                        if(mensaje == '') {
                            $("#alertTexto").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
                                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                                    "<span aria-hidden='true'>&times;</span>" +
                                    "</button>" +
                                    "<strong>Correcto</strong> El contenido ha sido actualizado con exito." +
                                    "</div>");
                            setTimeout(function(){ $("#alertTexto").html(""); }, 4000);
                        }
                        else
                            $("#alertTexto").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
                                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                                    "<span aria-hidden='true'>&times;</span>" +
                                    "</button>" +
                                    "<strong>Error!</strong> Se deben corregir los siguientes errores:." +
                                    "<ul>"+mensaje+"</ul></div>");
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


        $('#internado').on('submit', function (e) {
            e.preventDefault();
            var contenido = encodeURIComponent((CKEDITOR.instances.txtInternado.getData().split("\n").join("")).replace(/"/g,'\'').split("\t").join(""));
            if (contenido != "") {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editTexto')}}',
                    data: "&internado=" + JSON.stringify({id:'{{$internado->id}}', texto:contenido}),
                    success: function (data) {
                        if (data == "exito"){
                            $("#alertInternado").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
                                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                                    "<span aria-hidden='true'>&times;</span>" +
                                    "</button>" +
                                    "<strong>Correcto!</strong> El contenido ha sido actualizado de forma exitosa.</div>");
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
    </script>
@endsection