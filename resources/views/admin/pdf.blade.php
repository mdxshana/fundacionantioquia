@extends('layouts.back-end.layout')

@section('style')
    <style>
        .mar-bot15{
            margin-bottom: 15px
        }
        textarea{
            resize: none;
        }
    </style>
@endsection

@section('cabecera')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Administrar Requisitos</h3>
                <p class="animated fadeInDown">
                    Admin <span class="fa-angle-right fa"></span> PDF Requisitos
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>PDF</b></h3></div>
                <div class="col-md-12">Edita la información que obtendran los usuarios al descargar el PDF de <b>requisitos de ingreso a la fundación</b>.</div>
            </div>
            <form id="requisitos">
                <div class="row">
                    <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='textoReq' name='textoReq' rows='10' cols='30' style='height:440px'>
                            {!! $pdf->texto !!}
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
    <script charset="UTF-8">
        $(function() {
            CKEDITOR.replace( 'textoReq', {
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
                height: 500
            }).config.resize_enabled = false;
        });

        $('#requisitos').on('submit', function (e) {
            e.preventDefault();
            var contenido = encodeURIComponent((CKEDITOR.instances.textoReq.getData().split("\n").join("")).replace(/"/g,'\'').split("\t").join(""));
//            console.log();
            if (contenido != "") {
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editTexto')}}',
                    data: "&inicio=" + JSON.stringify({id:'{{$pdf->id}}', texto:contenido}),
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
    </script>
@endsection