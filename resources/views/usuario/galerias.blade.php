@extends('layouts.front-end.layout')

@section('style')
    {!!Html::style('plugins/viewer/viewer.css')!!}
    {!!Html::style('plugins/viewer/css/main.css')!!}
    <style>
        div[class="portfolio-thumb text-center"]{
            margin-bottom: 0;
        }
        @media (max-width: 479px) {
            .portadaAlbum{
                width: 90%;
                height: 200px;
            }
        }
        @media (min-width: 480px) and (max-width: 768px) {
            .portadaAlbum{
                width: 100%;
                height: 200px;
            }
        }
        @media (min-width: 769px) and (max-width: 1199px) {
            .portadaAlbum{
                width: 100%;
                height: 180px;
            }
        }
        @media (min-width: 1200px){
            .portadaAlbum{
                width: 100%;
                height: 180px;
            }
        }
        .mar-bot15{
            margin-bottom: 15px
        }
        .portfolio-border{
            cursor: pointer;
        }
        .selected{
            border: solid #6f6fb7 !important;
            border-radius: 10px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container mar-bot15">
        <div class="page-content">
            <div class="row mar-bot15">
                <div class="col-md-12">
                    <h3 class="classic-title"><span>Galerías disponibles</span></h3>
                    <div class="projects-carousel touch-carousel">
                        @foreach($albums as $key=>$album)
                            @if($album->cantImgs > 0)
                                <div class="portfolio-item item">
                                    <div class="portfolio-border {{($key==0)?'selected':''}}" data-album="{{$album->id}}">
                                        <div class="portfolio-thumb text-center">
                                            <div class="thumb-overlay"><i class="fa fa-eye"></i></div>
                                            <img alt="" src="/images/{{$album->portada->url}}" class="portadaAlbum"/>
                                        </div>
                                        <div class="portfolio-details">
                                            <h4>{{$album->nombre}}</h4>
                                            <span>{{$album->cantImgs}} {{($album->cantImgs==1)?'Imagen':'Imagenes'}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 40px; padding: 0 15px">
        <div class="row" id="fotos">
            <div class="docs-galley">
                <ul class="docs-pictures clearfix" id="images">
                    @foreach($albums[0]->getImagenes as $imagen)
                        <li>
                            <img data-original="images/{{$imagen->url}}" src="images/thumbs/{{$imagen->url}}">
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!!Html::script('front-end/js/owl.carousel.min.js')!!}
    {!!Html::script('plugins/viewer/viewer.js')!!}
    {{--{!!Html::script('plugins/viewer/js/main.js')!!}--}}
    <script>
        var viewer;
        $(function(){
            iniciarViewer();
            $(".portfolio-border").on('click', function(){
                var element = $(this);
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('getImgsAlbum')}}',
                    data: "&id=" + $(this).data('album'),
                    success: function (data) {
                        if (data != "Error de conexion.") {
                            var content = '';
                            for (var i=0; i<data.imagenes.length; i++){
                                content = content + "<li><img data-original='images/"+data.imagenes[i].url+"' src='images/thumbs/"+data.imagenes[i].url+"'></li>"
                            }
                            $("#images").html(content);
                            viewer.destroy();
                            iniciarViewer();

                            $(".portfolio-border").removeClass('selected');
                            element.addClass('selected');
                        }
                        else{
//                            $("#modalTitulo").html("Error!");
//                            $("#modalCuerpo").html(data.mensaje);
//                            $("#modalNotif").modal();
                        }
                    },
                    error: function (data) {
                    }
                });
            });
        });

        function iniciarViewer(){
            viewer = new Viewer(document.getElementById('images'), {
                url: 'data-original',
                navbar:2,
                title:false,
                movable:false,
                zoomable:false,
                rotatable:false,
                scalable:false,
                fullscreen: true,
                zIndex: 11111111,
                show:  function (e) {
                    $("body").addClass("modal-open");
                },
                hide:  function (e) {
                    $("body").removeClass("modal-open");
                }
            });
        }

    </script>
@endsection