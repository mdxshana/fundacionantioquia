@extends('layouts.front-end.layout')

@section('style')
@endsection

@section('encabezado')
    <div class="page-banner" style="padding:40px 0; background: url(images/slide-02-bg.jpg) center #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Nosotros</h2>

                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Inicio</a></li>
                        <li>Nosotros</li>
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

                <div class="col-md-7">

                    <!-- Classic Heading -->
                    <h4 class="classic-title"><span>Quienes Somos</span></h4>

                    <!-- Some Text -->
                    {!! $somos->texto !!}

                </div>

                <div class="col-md-5">

                    <!-- Start Touch Slider -->
                    <div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
                        @foreach($images as $image)
                        <div class="item"><img alt="" src="images/{{$image->imagen}}"></div>
                        @endforeach
                    </div>
                    <!-- End Touch Slider -->

                </div>

            </div>
            <div class="row" style="margin: 30px 0;">
                <img alt="" src="images/{{$imageSomos->imagen}}">
            </div>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:50px;"></div>

            <div class="row">

                <div class="col-md-6">

                    <!-- Classic Heading -->
                    <h4 class="classic-title"><span>Misión</span></h4>

                    <!-- Some Text -->
                    {!! $mision->texto !!}

                </div>

                <div class="col-md-6">

                    <!-- Classic Heading -->
                    <h4 class="classic-title"><span>Visión</span></h4>

                    <!-- Some Text -->
                    {!! $vision->texto !!}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection