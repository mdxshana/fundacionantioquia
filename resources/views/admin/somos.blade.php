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
    </style>
@endsection

@section('cabecera')

@endsection

@section('content')


    <div class="col-md-12">
        <div class="col-md-12">

            <div class="col-md-12 tabs-area">

                <ul id="tabs-demo6" class="nav nav-tabs nav-tabs-v6" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tabs-demo7-area1" id="tabs-demo6-1" role="tab" data-toggle="tab" aria-expanded="true">Quienes Somos</a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#tabs-demo7-area2" role="tab" id="tabs-demo6-2" data-toggle="tab" aria-expanded="false">Misión</a>
                    </li>
                    <li role="presentation">
                        <a href="#tabs-demo7-area3" id="tabs-demo6-3" role="tab" data-toggle="tab" aria-expanded="false">Visión</a>
                    </li>
                    <li role="presentation">
                        <a href="#tabs-demo7-area4" id="tabs-demo6-4" role="tab" data-toggle="tab" aria-expanded="false">Modelo de Atención</a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#tabs-demo7-area5" role="tab" id="tabs-demo6-5" data-toggle="tab" aria-expanded="false">Imagenes</a>
                    </li>
                </ul>
                <div id="tabsDemo6Content" class="tab-content tab-content-v6 col-md-12">
                    {{--tab 1--}}
                    <div role="tabpanel" class="tab-pane fade active in" id="tabs-demo7-area1" aria-labelledby="tabs-demo7-area1">
                        <div class="row mar-bot15">
                            <div class="col-md-12 textos">Edita el texto que aparece en la seccion de quienes somos</div>
                        </div>
                        <form id="textoSomos">
                            <div class="row">
                                <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='infoSomos' name='infoSomos' rows='10' cols='30' style='height:440px'>
                            {!! $somos->texto !!}
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
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertTextoSomos"></div>
                        </div>

                    </div>
                    {{--tab 2--}}
                    <div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area2" aria-labelledby="tabs-demo7-area2">
                        <div class="row mar-bot15">
                            <div class="col-md-12 textos">Edita el texto que aparece en la seccion de Misión</div>
                        </div>
                        <form id="textoMision">
                            <div class="row">
                                <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='infoMision' name='infoMision' rows='10' cols='30' style='height:440px'>
                                {!! $mision->texto !!}
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
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertTextoMision"></div>
                        </div>
                    </div>
                    {{--tab 3--}}
                    <div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area3" aria-labelledby="tabs-demo7-area3">
                        <div class="row mar-bot15">
                            <div class="col-md-12 textos">Edita el texto que aparece en la seccion de Visión</div>
                        </div>
                        <form id="textoVision">
                            <div class="row">
                                <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='infoVision' name='infoVision' rows='10' cols='30' style='height:440px'>
                            {!! $vision->texto !!}
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
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertTextoVision"></div>
                        </div>
                    </div>
                    {{--tab 4--}}
                    <div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area4" aria-labelledby="tabs-demo7-area4">
                        <div class="row mar-bot15">
                            <div class="col-md-12 textos">Edita el texto que aparece en la seccion de <b>Modelo de Atención</b> </div>
                        </div>
                        <form id="textoModelo">
                            <div class="row">
                                <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='infoModelo' name='infoModelo' rows='10' cols='30' style='height:440px'>
                                {!! $modelo->texto !!}
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
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertTextoModelo"></div>
                        </div>
                    </div>
                    {{--tab 5--}}
                    <div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area5" aria-labelledby="tabs-demo7-area5">
                        <div class="row" style="margin: 30px 0;">
                            <h2>Imagen actual en la sección de Nosotros</h2>
                            <img id="imgsomos" alt="" src="/images/{{$imageSomos->imagen}}" style="max-width: 100%;
    height: auto;">
                        </div>
                        {!!Form::open(['id'=>'formImgSomos','files' => true,'class'=>'form-horizontal','autocomplete'=>'off'])!!}
                        <h3>Cambiar Imagen</h3>
                        <div class="input-group image-preview">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                                 <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                                </button>
                                            <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title">Browse</span>
                                    <input type="file" id="file" accept="image/png, image/jpeg, image/gif" name="file"/> <!-- rename it -->
                                </div>
                            </span>
                        </div><!-- /input-group image-preview [TO HERE]-->
                        <div class="row" style="margin-top: 25px;">
                            <div id="alertImg" class="col-xs-12">

                            </div>
                        </div>
                        <div class="row hidden" style="margin-top: 15px;" id="btnCambiarImg">
                            <div class="col-xs-12 text-right">
                                <button type="submit" class="btn btn-info">Guardar Cambios</button>
                            </div>
                        </div>

                        {!!Form::close()!!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    {!!Html::script('plugins/ckeditor/ckeditor.js')!!}

    <script>
        $(function () {
            CKEDITOR.replace('infoSomos', {
                toolbar: [
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript','Superscript'] },
                    { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                    { name: 'styles', items: [ 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                    { name: 'insert', items: [ 'Table' ] },
                    { name: 'editing', items: [ 'Scayt' ] }
                ]

            }).config.resize_enabled = false;

            CKEDITOR.instances.infoSomos.on('key',function(event){
                var deleteKey = 46;
                var backspaceKey = 8;
                var keyCode = event.data.keyCode;
                if (keyCode === deleteKey || keyCode === backspaceKey)
                    return true;
                else
                {
                    var textLimit = 400;
                    var str = CKEDITOR.instances.infoSomos.getData();
                    if (str.length >= textLimit)
                        return false;
                }
            });

            CKEDITOR.replace('infoMision', {
                toolbar: [
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript','Superscript'] },
                    { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                    { name: 'styles', items: [ 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                    { name: 'insert', items: [ 'Table' ] },
                    { name: 'editing', items: [ 'Scayt' ] }
                ]

            }).config.resize_enabled = false;

            CKEDITOR.instances.infoMision.on('key',function(event){
                var deleteKey = 46;
                var backspaceKey = 8;
                var keyCode = event.data.keyCode;
                if (keyCode === deleteKey || keyCode === backspaceKey)
                    return true;
                else
                {
                    var textLimit = 400;
                    var str = CKEDITOR.instances.infoMision.getData();
                    if (str.length >= textLimit)
                        return false;
                }
            });

            CKEDITOR.replace('infoVision', {
                toolbar: [
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript','Superscript'] },
                    { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                    { name: 'styles', items: [ 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                    { name: 'insert', items: [ 'Table' ] },
                    { name: 'editing', items: [ 'Scayt' ] }
                ]

            }).config.resize_enabled = false;

            CKEDITOR.instances.infoVision.on('key',function(event){
                var deleteKey = 46;
                var backspaceKey = 8;
                var keyCode = event.data.keyCode;
                if (keyCode === deleteKey || keyCode === backspaceKey)
                    return true;
                else
                {
                    var textLimit = 400;
                    var str = CKEDITOR.instances.infoVision.getData();
                    if (str.length >= textLimit)
                        return false;
                }
            });

            CKEDITOR.replace('infoModelo', {
                toolbar: [
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript','Superscript'] },
                    { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                    { name: 'styles', items: [ 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                    { name: 'insert', items: [ 'Table' ] },
                    { name: 'editing', items: [ 'Scayt' ] }
                ]

            }).config.resize_enabled = false;

            CKEDITOR.instances.infoModelo.on('key',function(event){
                var deleteKey = 46;
                var backspaceKey = 8;
                var keyCode = event.data.keyCode;
                if (keyCode === deleteKey || keyCode === backspaceKey)
                    return true;
                else
                {
                    var textLimit = 400;
                    var str = CKEDITOR.instances.infoModelo.getData();
                    if (str.length >= textLimit)
                        return false;
                }
            });



            // Create the close button
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
                title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                content: "There's no image",
                placement:'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function(){
                $("#btnCambiarImg").addClass("hidden");
                $('.image-preview').attr("data-content","").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse");
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
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                };
                reader.readAsDataURL(file);
            });

            $("#file").change(function () {
                if($(this).val!=null){
                    console.log("con");
                    $("#btnCambiarImg").removeClass("hidden")
                }else{
                    console.log("sin");
                    $("#btnCambiarImg").addClass("hidden")
                }
            });


            var formImgSomos = $("#formImgSomos");
            formImgSomos.submit(function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                e.preventDefault();
                $.ajax({
                    url: "{!! route('updateImagSomos') !!}",
                    type: "POST",
                    data: formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success: function (result) {

                        if(result.estado){
                            $("#imgsomos").attr("src","/images/"+result.url);
                        }
                        $("#alertImg").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
                            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                            "<span aria-hidden='true'>&times;</span>" +
                            "</button>" +
                            "<strong>Correcto!</strong> La imagen fue actualizada.</div>");
                        $('.image-preview-clear').trigger("click");

                    },
                    error: function (error) {
//                        alert("danger","Ups","algo salio mal por favor intentar nuevamente","<i class='fa fa-ban' aria-hidden='true'></i>");
                        console.log(error);
                    }
                });
            });

        });

        $('#textoSomos').on('submit', function (e) {
            e.preventDefault();
            var contenido = encodeURIComponent(CKEDITOR.instances.infoSomos.getData().split("\n").join(""));
            if (contenido != "") {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editTexto')}}',
                    data: "&inicio=" + JSON.stringify({id:'{{$somos->id}}', texto:contenido}),
                    success: function (data) {
                        if (data == "exito"){
                            $("#alertTextoSomos").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
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
                $("#alertTextoSomos").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                    "<span aria-hidden='true'>&times;</span>" +
                    "</button>" +
                    "<strong>Error!</strong> Debes ingresar algún texto para mostrar en la página principal.</div>");
            }
        });

        $('#textoMision').on('submit', function (e) {
            e.preventDefault();
            var contenido = encodeURIComponent(CKEDITOR.instances.infoMision.getData().split("\n").join(""));
            if (contenido != "") {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editTexto')}}',
                    data: "&inicio=" + JSON.stringify({id:'{{$mision->id}}', texto:contenido}),
                    success: function (data) {
                        if (data == "exito"){
                            $("#alertTextoMision").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
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
                $("#alertTextoMision").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                    "<span aria-hidden='true'>&times;</span>" +
                    "</button>" +
                    "<strong>Error!</strong> Debes ingresar algún texto para mostrar en la página principal.</div>");
            }
        });

        $('#textoVision').on('submit', function (e) {
            e.preventDefault();
            var contenido = encodeURIComponent(CKEDITOR.instances.infoVision.getData().split("\n").join(""));
            if (contenido != "") {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editTexto')}}',
                    data: "&inicio=" + JSON.stringify({id:'{{$vision->id}}', texto:contenido}),
                    success: function (data) {
                        if (data == "exito"){
                            $("#alertTextoVision").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
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
                $("#alertTextoVision").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                    "<span aria-hidden='true'>&times;</span>" +
                    "</button>" +
                    "<strong>Error!</strong> Debes ingresar algún texto para mostrar en la página principal.</div>");
            }
        });

        $('#textoModelo').on('submit', function (e) {
            e.preventDefault();
            var contenido = encodeURIComponent((CKEDITOR.instances.infoModelo.getData().split("\n").join("")).replace(/"/g,'\'').split("\t").join(""));
            if (contenido != "") {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editTexto')}}',
                    data: "&inicio=" + JSON.stringify({id:'{{$modelo->id}}', texto:contenido}),
                    success: function (data) {
                        if (data == "exito"){
                            $("#alertTextoModelo").html("<div class='alert alert-success alert-dismissible' role='alert'>" +
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
                $("#alertTextoModelo").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
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
    </script>

@endsection