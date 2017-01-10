@extends('layouts.front-end.layout')

@section('style')
    <title>Fundación Antioquía</title>
    <style>
        #content{
            padding: 0;
        }
        @media (max-width: 450px) {
            .carousel-inner>.item>img {
                height: 300px;!important;
            }
        }
        @media (min-width:451px) and (max-width: 800px){
            .carousel-inner>.item>img {
                height: 400px;!important;
            }
        }
        @media (min-width:801px) and (max-width: 991px){
            .carousel-inner>.item>img {
                height: 450px;!important;
            }
        }
        @media (min-width:992px) and (max-width: 1199px){
            .carousel-inner>.item>img {
                height: 500px;!important;
            }
        }
        @media (min-width: 1200px){
            .carousel-inner>.item>img {
                height: 600px;!important;
            }
        }
        p{
            font-size: 16px;
            color: #101010;
            line-height: 25px;
        }
        .big-title h1 strong{
            font-weight: 700;!important;
        }
    </style>
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
                        <img class="fotoSlider" src="images/{{$foto}}" alt="slider" style="max-height: 600px; min-height: 200px">
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
                    </div>
                @endforeach
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

    <div class=" section pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Start Big Heading -->
                    <div class="big-title text-center">
                        <h1> <strong>Filosofía</strong></h1>
                    </div>
                    <!-- End Big Heading -->

                    <!-- Text -->

                    <p class="text-justify">
                        {!!$texto!!}
                    </p>

                    {{--<p class="text-center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!!Html::script('front-end/js/owl.carousel.min.js')!!}

@endsection