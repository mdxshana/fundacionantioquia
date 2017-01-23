<div class="navbar navbar-default navbar-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-bars"></i> </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="index.html"><img alt="" src="img/logo.png" style="border: solid 3px #2f5529; border-radius: 0 0 10px 10px;"></a>
        </div>
        <div class="navbar-collapse collapse">
            <!-- Stat Search -->
{{--            <div class="search-side"> <a class="show-search"><i class="fa fa-search"></i></a>
                <div class="search-form">
                    <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                        <input type="text" value="" name="s" id="s" placeholder="Search the site..."> </form>
                </div>
            </div>--}}
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{route("home")}}">Inicio</a>
                </li>
                <li>
                    <a href="{{route("somos")}}">Nosotros</a>
                </li>
                <li>
                    <a href="{{route("getServicios")}}">Servicios</a>
                </li>
                <li>
                    <a href="{{route("getGalerias")}}">Galeria</a>
                </li>
                <li>
                    <a href="{{route("getVideos")}}">Videos</a>
                </li>
                <li>
                    <a href="{{route('contacto')}}">Contacto</a>
                </li>
            </ul>
            <!-- End Navigation List -->
        </div>
    </div>

    <!-- Mobile Menu Start -->
    <ul class="wpb-mobile-menu">
        <li>
            <a href="{{route("home")}}">Inicio</a>
        </li>
        <li>
            <a href="{{route("somos")}}">Nosotros</a>
        </li>
        <li>
            <a href="{{route("getServicios")}}">Servicios</a>
        </li>
        <li>
            <a href="{{route("getGalerias")}}">Galeria</a>
        </li>
        <li>
            <a href="{{route("getVideos")}}">Videos</a>
        </li>
        <li>
            <a href="{{route('contacto')}}">Contacto</a>
        </li>


    </ul>
    <!-- Mobile Menu End -->

</div>