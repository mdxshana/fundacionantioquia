@extends('layouts.back-end.layout')

@section('style')
    {!!Html::style('plugins/bootstrapFileInput/css/fileinput.min.css')!!}
    {{--<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">--}}

    <!-- If you'd like to support IE8 -->
    {{--<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>--}}
    {{--{!!Html::style('back-end/css/plugins/mediaelementplayer.css')!!}--}}

    <style>
        .btn.btn-circle{
            width: 40px;
            height: 40px;
            padding: 10px;
            font-size: 18px;
        }
        textarea {
            resize: none;
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
    {{--<div class="panel box-shadow-none content-header">--}}
        {{--<div class="panel-body">--}}
            {{--<div class="col-md-12">--}}
                {{--<h3 class="animated fadeInLeft">Article v1</h3>--}}
                {{--<p class="animated fadeInDown">--}}
                    {{--Pages <span class="fa-angle-right fa"></span> Article v1--}}
                {{--</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="row" style="margin-top: 30px;">
            <div class="panel">
                <div class="panel-body">
                    <h4>Subir Videos</h4>
                    <div class="col-xs-12">
                        <input id='inputGalery' name='inputGalery[]' type='file'  multiple class='file-loading' accept='video/*'>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div id="videos" class="panel">
            <div class="col-xs-12" id="gridVideos">

                @foreach($videos as $video)

                    <div class="col-sm-6 col-md-3 video-v1" id="divVideo{{$video->id}}">
                        <div class="panel">
                                <video controls preload="auto">
                                    <source src="{{url('videos/'.$video->url)}}" type="video/mp4">
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video>
                            <div class="panel-body">

                                    <div class="col-md-12 video-v1-header">
                                        <div class="col-md-12">
                                            <h4><span class="fa fa-video-camera"></span> <span id="titulo{{$video->id}}">{{$video->titulo}}</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12 video-v1-content">
                                        <p id="descripcion{{$video->id}}">
                                            {{$video->descripcion}}
                                        </p>
                                    </div>
                                <div class="col-xs-12">
                                    <button class=" btn btn-circle ripple-infinite btn-primary editarVideo" value="primary" data-id="{{$video->id}}" data-titulo="{{$video->titulo}}" data-descripcion="{{$video->descripcion}}" data-toggle="tooltip" data-placement="bottom" title="" style="margin:5px;" data-original-title="Editar Información">
                                        <div>
                                            <span class="fa fa-pencil-square-o"></span>
                                        </div>
                                    </button>
                                    <button class=" btn btn-circle btn-gradient btn-danger pull-right removeVideo" value="primary" aria-hidden='true' data-id="{{$video->id}}" data-toggle='confirmation' data-singleton="true" data-placement='top' title='Eliminar video?' data-btn-ok-label="Si" data-btn-cancel-label="No">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </div>

                            </div>

                        </div>

                        <div></div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



    <div id="modalEditVideo" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                {!!Form::open(['id'=>'formEditarInfoVideo','class'=>'form-horizontal', 'autocomplete'=>'off'])!!}
                <div class="modal-body">
                    <div class="row" style="margin: 0 10px;">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important; margin-right: 3px;">
                                <input type="text" class="form-text" id="editTitulo" name="titulo" required>
                                <span class="bar"></span>
                                <label>Titulo</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important; margin-right: 3px;">
                                <div><h4>Descripción</h4></div>
                                <textarea id="editDescripcion" name="descripcion" rows="10" style="width: 100%"></textarea>

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
    {!!Html::script('plugins/bootstrapFileInput/js/plugins/canvas-to-blob.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/plugins/sortable.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/plugins/purify.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/fileinput.min.js')!!}
    {!!Html::script('plugins/bootstrapFileInput/js/locales/es.js')!!}
    {!!Html::script('back-end/js/plugins/mediaelement-and-player.min.js')!!}
    {!!Html::script('plugins/bootstrapConfirmation/bootstrap-confirmation.min.js')!!}
    {{--<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>--}}

    <script>

        $(function () {

            $("#inputGalery").fileinput({
                uploadAsync : true,
                uploadUrl : 'subirvideo',
                language: "es",
                maxFileCount: 6,
                showUpload: true,
                uploadExtraData : {},
                previewFileType: 'video',
                allowedFileTypes: ['video'],
                allowedFileExtensions: ['mp4', 'gif', 'png'],
                previewSettings:{ video: {width: "200px", height: "160px"}},

            }).on('fileuploaded', function(e, params) {

                var html = "<div class='col-sm-6 col-md-3 video-v1' id='divVideo"+params.response.id+"'>"+
                    "<div class='panel'>"+
                "<video controls preload='auto'>"+
                "<source src='/videos/"+params.response.url+"' type='video/mp4'>"+
                "<p class='vjs-no-js'>"+
                "To view this video please enable JavaScript, and consider upgrading to a web browser that"+
                "<a href='http://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>"+
                "</p>"+
                "</video>"+
                "<div class='panel-body'>"+

                "<div class='col-md-12 video-v1-header'>"+
                "<div class='col-md-12'>"+
                "<h4><span class='fa fa-video-camera'></span> <span id='titulo"+params.response.id+"'>"+params.response.titulo+"</span></h4>"+
                "</div>"+
                "</div>"+
                "<div class='col-md-12 video-v1-content'>"+
                "<p id='descripcion"+params.response.id+"'>"+params.response.descripcion+
                            "</p>"+
                "</div>"+
                "<div class='col-xs-12'>"+
                "<button class='btn btn-circle ripple-infinite btn-primary editarVideo' value='primary' data-id='"+params.response.id+"' data-titulo='"+params.response.titulo+"' data-descripcion='"+params.response.descripcion+"' data-toggle='tooltip' data-placement='bottom' title='' style='margin:5px;' data-original-title='Editar Información'>"+
                "<div>"+
                "<span class='fa fa-pencil-square-o'></span>"+
                "</div>"+
                "</button>"+
                "<button class='btn btn-circle btn-gradient btn-danger pull-right removeVideo' value='primary' aria-hidden='true' data-id='"+params.response.id+"' data-toggle='confirmation' data-singleton='true' data-placement='top' title='Eliminar video?' data-btn-ok-label='Si' data-btn-cancel-label='No'>"+
                "<span class='fa fa-trash'></span>"+
                "</button>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "<div></div>"+
                "</div>";

                $("#gridVideos").append(html);
                iniciarRemoveConfirm();
            });



            var formEditarInfoVideo = $("#formEditarInfoVideo");
            formEditarInfoVideo.submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('editInfoVideo')}}',
                    data: formEditarInfoVideo.serialize(),
                    success: function (data) {
                        if(data.estado){

                            var html = '<div class="alert alert-success alert-dismissable">'+
                                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                                '<strong>Perfecto!</strong> Los cambios fueron guardados satisfactoriamente.'+
                                '</div>';
                            $("#titulo"+$("#id").val()).html($("#editTitulo").val());
                            $("#descripcion"+$("#id").val()).html($("#editDescripcion").val());
                            $("#notifEdit").html(html);

                            setTimeout(function(){
                                $('#modalEditVideo').modal('hide');
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

            iniciarRemoveConfirm();
        });// FIN DE READY

        $("#videos").on("click",".editarVideo",function () {
            $("#id").val($(this).data("id"));
            $("#editTitulo").val($(this).data("titulo"));
            $("#editDescripcion").val($(this).data("descripcion"));
            $('#modalEditVideo').modal('show');
        });

        function removeVideo(id) {
            $.ajax({
                type: "POST",
                context: document.body,
                url: '{{route('removeVideo')}}',
                data: {id:id},
                success: function (data) {
                    if(data.estado){
                        $("#divVideo"+id).remove();
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
        }

        function iniciarRemoveConfirm() {
            $(".removeVideo").each(function(){
                $(this).confirmation({
                    onConfirm: function () {
                        removeVideo($(this).data("id"));
                    }
                });
            });
        }
    </script>


@endsection