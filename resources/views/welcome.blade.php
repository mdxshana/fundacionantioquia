@extends('layouts.front-end.layout')

@section('style')
@endsection



@section('content')
    <section id="home">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for($i=0; $i<count($galeria); $i++)
                    <li data-target="#main-slide" data-slide-to="{{$i}}" {{($i==0)?'class=active':''}}></li>
                @endfor
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                @foreach($galeria as $clave => $foto)
                    <div class="item {{($clave==0)?'active':''}}">
                        <img class="img-responsive" src="images/{{$foto}}" alt="slider" style="max-height: 500px; min-height: 200px">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h2 class="animated2">
                                    <span>Welcome to <strong>Margo</strong></span>
                                </h2>
                                <h3 class="animated3">
                                    <span>The ultimate aim of your business</span>
                                </h3>
                                <p class="animated4"><a href="#" class="slider btn btn-system btn-large">Check Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{--<div class="item active">--}}
                    {{--<img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">--}}
                    {{--<div class="slider-content">--}}
                        {{--<div class="col-md-12 text-center">--}}
                            {{--<h2 class="animated2">--}}
                                {{--<span>Welcome to <strong>Margo</strong></span>--}}
                            {{--</h2>--}}
                            {{--<h3 class="animated3">--}}
                                {{--<span>The ultimate aim of your business</span>--}}
                            {{--</h3>--}}
                            {{--<p class="animated4"><a href="#" class="slider btn btn-system btn-large">Check Now</a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!--/ Carousel item end -->--}}
                {{--<div class="item">--}}
                    {{--<img class="img-responsive" src="images/slider/bg2.jpg" alt="slider">--}}
                    {{--<div class="slider-content">--}}
                        {{--<div class="col-md-12 text-center">--}}
                            {{--<h2 class="animated4">--}}
                                {{--<span><strong>Margo</strong> for the highest</span>--}}
                            {{--</h2>--}}
                            {{--<h3 class="animated5">--}}
                                {{--<span>The Key of your Success</span>--}}
                            {{--</h3>--}}
                            {{--<p class="animated6"><a href="#" class="slider btn btn-system btn-large">Buy Now</a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!--/ Carousel item end -->--}}
                {{--<div class="item">--}}
                    {{--<img class="img-responsive" src="images/slider/bg3.jpg" alt="slider">--}}
                    {{--<div class="slider-content">--}}
                        {{--<div class="col-md-12 text-center">--}}
                            {{--<h2 class="animated7 white">--}}
                                {{--<span>The way of <strong>Success</strong></span>--}}
                            {{--</h2>--}}
                            {{--<h3 class="animated8 white">--}}
                                {{--<span>Why you are waiting</span>--}}
                            {{--</h3>--}}
                            {{--<div class="">--}}
                                {{--<a class="animated4 slider btn btn-system btn-large btn-min-block" href="#">Get Now</a><a class="animated4 slider btn btn-default btn-min-block" href="#">Live Demo</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!--/ Carousel item end -->
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
@endsection

@section('script')
    {!!Html::script('front-end/js/owl.carousel.min.js')!!}

@endsection