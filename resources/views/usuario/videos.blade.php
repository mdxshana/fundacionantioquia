@extends('layouts.front-end.layout')

@section('style')
    <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
    {!!Html::style('front-end/css/video-js.css')!!}

    <!-- If you'd like to support IE8 -->
    {!!Html::script('front-end/js/video-js-ie8.min.js')!!}
    <style>
        .video-js {
             width: auto;
            height: 200px;
        }
    </style>
@endsection

@section('encabezado')
    <div class="page-banner" style="padding:40px 0; background: url(images/slide-02-bg.jpg) center #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Videos</h2>

                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Inicio</a></li>
                        <li>Videos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="page-content">
                <div class="row">
                    @foreach($videos as $video)
                        <!-- Start Image Service Box 1 -->
                        <div class="col-sm-6 col-md-4 image-service-box">
                            <video id="my-video" class="video-js" controls preload="auto"
                                    data-setup="{}">
                                <source src="{{url('videos/'.$video->url)}}" type="video/mp4">
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                            </video>
                            <h4>{{$video->titulo}}</h4>
                            <p style="height: 100px;">{{$video->descripcion}}</p>
                        </div>
                        <!-- End Image Service Box 1 -->
                    @endforeach
                </div>
        </div>
    </div>
@endsection

@section('script')
    {!!Html::script('front-end/js/video.js')!!}

@endsection