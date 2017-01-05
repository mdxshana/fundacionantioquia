@extends('layouts.back-end.layout')

@section('style')
    {!!Html::style('plugins/ceindetecFileInput/css/ceindetecFileInput.css')!!}
    <style>
        .feature-grid {
            padding: 0 1em 0 1em;
        }
        .feature-grid img {
            padding: 0;
        }
        @media (max-width: 320px) {
            .feature-grid img {
                height: 155px;
                padding-bottom: 10px;
            }
        }

        @media (min-width: 321px) and (max-width: 585px) {
            .feature-grid img {
                height: 150px;
                padding-bottom: 10px;
            }
        }

        @media (min-width: 586px) and (max-width: 640px) {
            .feature-grid img {
                height: 200px;
                padding-bottom: 10px;
            }
        }

        @media (min-width: 641px) and (max-width: 768px) {
            .feature-grid img {
                height: 150px;
                padding-bottom: 10px;
            }
        }

        @media (min-width: 769px) {
            .feature-grid img {
                height: 200px;
                padding-bottom: 10px;
            }
        }
        .manito {
            cursor: pointer;
        }

        .popover-content {
            width: 125px;
        }
    </style>
@endsection

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h2 class="page-title">Administración de inicio <small></small></h2>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span10 offset1">
            <section class="widget">
                <header>
                    <h4>Galería<small></small></h4>
                </header>
                <div class="body">
                    <blockquote>
                        Edita el contenido que aparecerá en el visualizador de imágenes de la página principal
                    </blockquote>
                    <div class="row-fluid">
                        <div class="span10">
                            {!!Form::open(['id'=>'formGaleria','files' => true,'class'=>'form-horizontal','autocomplete'=>'off'])!!}

                            <div class="span12">
                                <div id="imgsSliders" class="feature-grids">
                                    @for($i=0;$i<count($galeria->getImagenes);$i++)
                                        <div class="span3 feature-grid"
                                             data-id={{$galeria->getImagenes[$i]->id}} data-ruta={{$galeria->getImagenes[$i]->ruta}}>
                                            <div class="editProfPic">
                                                <i class='fa fa-trash fa-2x eliminar eliminarS manito' aria-hidden='true'
                                                   data-toggle='confirmation' data-popout="true" data-placement='top'
                                                   title='Eliminar?' data-btn-ok-label="Si" data-btn-cancel-label="No"></i>
                                            </div>
                                            <img src="images/admin/{{$galeria->getImagenes[$i]->ruta}}" alt="">
                                        </div>
                                    @endfor
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="span6 offset3" id="divImagen">
                                    <input type="file" id="files" name="files[]" required style="width: 200px; height: 35px;"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="offset2 span8">
                                    <button type="submit" class="btn btn-info center-block" id="submit">Actualizar Imagen</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>


                {{--<textarea id='infoAdicional' name='infoAdicional' rows='10' cols='30' style='height:440px'></textarea>--}}
            </section>
        </div>


    </div>
@endsection

@section('script')
    {!!Html::script('plugins/ceindetecFileInput/js/ceindetecFileInput.js')!!}
    {!!Html::script('plugins/ckeditor/ckeditor.js')!!}

    <script>
        var totalGaleria = 0;
        var imagesCargadas = 0;
        $(function(){

            $("#files").inputFileImage({
                maxlength: 1,
                width: 120,
                height: 140,
                maxWidthImage:800,
                maxHeightImage:600,
                minType: ["png","jpeg"],
                maxfilesize: 1024
            });
//            CKEDITOR.replace('infoAdicional', {removeButtons:'Image'});


//            validarUpload(totalGaleria);

//            $(".eliminar").each(function(){
//                $(this).confirmation({
//                    onConfirm: function () {
//                        ajaxEliminarImagen($(this).parent().parent());
//                        totalGaleria--;
//                        validarUpload(totalGaleria);
//                    }
//                });
//            });


        });


    </script>
@endsection