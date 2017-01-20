@extends('layouts.front-end.layout')

@section('style')
    <style>
        .post-content ol{
            list-style-type: decimal;
        }
        .blog-post{
            border: 0;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        @media(max-width: 445px){
            #imagenServicio{
                height: 230px;
            }
        }
        @media(min-width: 446px) and (max-width: 703px){
            #imagenServicio{
                height: 300px;
            }
        }
        @media(min-width: 704px) and (max-width: 991px){
            #imagenServicio{
                height: 350px;
            }
        }
        @media(min-width: 992px) and (max-width: 1199px){
            #imagenServicio{
                height: 380px;
            }
        }
        @media(min-width: 1200px){
            #imagenServicio{
                height: 350px;
            }
        }
        .pdf{
            margin-bottom: 25px;
            cursor: pointer;
            padding: 5px;
            padding-top: 8px;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
        }
        .pdf:hover{
            color: #000;
            -webkit-box-shadow:0 1px 5px 0 #000;
            -moz-box-shadow:0 1px 5px 0 #000;
            box-shadow:0 1px 5px 0 #000;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
@endsection

@section('encabezado')
    <div class="page-banner" style="padding:40px 0; background: url(images/slide-02-bg.jpg) center #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Servicios</h2>
                    {{--<p>We Are Professional</p>--}}
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Inicio</a></li>
                        <li>Servicios</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="container">
        <div class="page-content">
            <div class="row mar-bot15">
                <div class="col-md-10">
                    <h3 class="classic-title"><span>Proceso de vinculación</span></h3>
                </div>
                <div class="col-md-8 col-md-offset-2 blog-box">
                    <div class="blog-post image-post">
                        <div class="post-head">
                            <a class="lightbox" title="Proceso de vinculación" href="images/{{$imgVinculo}}">
                                <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                                <img alt="" src="images/{{$imgVinculo}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <h3 class="classic-title"><span>Servicio de internado</span></h3>
                </div>
                <div class="col-md-6">
                    {!! $internado !!}<br>
                    <p><b>¿Deseas obtener mas informacion?:</b></p>
                    <div class="text-center pdf col-md-4 col-md-offset-4" data-toggle="tooltip" data-placement="bottom" title="Descargar archivo!">
                        <div>
                            <i class="fa fa-file-pdf-o fa-3x" style="color: red"></i>
                            <i class="fa fa-download" style="color: #0000cc"></i>
                        </div>
                        <div  style="margin-top: 5px">
                            <b> Requisitos de Ingreso</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="blog-post image-post">
                        <div class="post-head text-center">
                            <a class="lightbox" title="{{$servicio->descripcion}}" href="images/{{$servicio->imagen}}">
                                <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                                <img src="images/{{$servicio->imagen}}" id="imagenServicio">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $(".pdf").click(function(){
                window.open('/pdf', '_blank');
            });
        });
    </script>
@endsection