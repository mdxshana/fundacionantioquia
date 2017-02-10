
@extends('layouts.front-end.layout')

@section('style')
    <style>
        .cargando{
            font-size: 16px;
        }
    </style>

@endsection
{{------end style--}}

@section('encabezado')
    <!-- Start Map 4.1349238,-73.6261258 -->
    <div id="map" data-position-latitude="4.1349238" data-position-longitude="-73.6261258"></div>
    {{--<script>--}}
        {{--(function($) {--}}
            {{--$.fn.CustomMap = function(options) {--}}

                {{--var posLatitude = $('#map').data('position-latitude'),--}}
                    {{--posLongitude = $('#map').data('position-longitude');--}}

                {{--var settings = $.extend({--}}
                    {{--home: {--}}
                        {{--latitude: posLatitude,--}}
                        {{--longitude: posLongitude--}}
                    {{--},--}}
                    {{--text: '<div class="map-popup"><h4>Fundacion Social Antioquía</h4><p>Ven y visitanos</p></div>',--}}
                    {{--icon_url: $('#map').data('marker-img'),--}}
                    {{--zoom: 15--}}
                {{--}, options);--}}

                {{--var coords = new google.maps.LatLng(settings.home.latitude, settings.home.longitude);--}}

                {{--return this.each(function() {--}}
                    {{--var element = $(this);--}}

                    {{--var options = {--}}
                        {{--zoom: settings.zoom,--}}
                        {{--center: coords,--}}
                        {{--mapTypeId: google.maps.MapTypeId.ROADMAP,--}}
                        {{--mapTypeControl: false,--}}
                        {{--scaleControl: false,--}}
                        {{--streetViewControl: false,--}}
                        {{--panControl: true,--}}
                        {{--disableDefaultUI: true,--}}
                        {{--zoomControlOptions: {--}}
                            {{--style: google.maps.ZoomControlStyle.DEFAULT--}}
                        {{--},--}}
                        {{--overviewMapControl: true,--}}
                    {{--};--}}

                    {{--var map = new google.maps.Map(element[0], options);--}}

                    {{--var icon = {--}}
                        {{--url: settings.icon_url,--}}
                        {{--origin: new google.maps.Point(0, 0)--}}
                    {{--};--}}

                    {{--var marker = new google.maps.Marker({--}}
                        {{--position: coords,--}}
                        {{--map: map,--}}
                        {{--icon: icon,--}}
                        {{--draggable: false--}}
                    {{--});--}}

                    {{--var info = new google.maps.InfoWindow({--}}
                        {{--content: settings.text--}}
                    {{--});--}}

                    {{--google.maps.event.addListener(marker, 'click', function() {--}}
                        {{--info.open(map, marker);--}}
                    {{--});--}}
                {{--});--}}

            {{--};--}}
        {{--}(jQuery));--}}

        {{--jQuery(document).ready(function() {--}}
            {{--jQuery('#map').CustomMap();--}}
        {{--});--}}
    {{--</script>--}}
@endsection


@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <!-- Classic Heading -->
                <h4 class="classic-title"><span>Contactenos</span></h4>

                <!-- Start Contact Form -->
                <form role="form" class="contact-form" id="contact-form" method="post">
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" placeholder="Nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="email" class="email" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" class="requiredField" placeholder="Asunto" name="asunto" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="controls">
                            <textarea rows="7" placeholder="Mensaje" name="mensaje" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1" id="notif">

                        </div>
                    </div>
                    <button type="submit" id="enviar" class="btn-system btn-large">Enviar <i class="fa fa-spinner fa-pulse fa-3x fa-fw cargando hidden"></i>
                        <span class="sr-only">Loading...</span></button>
                    <div id="success" style="color:#34495e;"></div>
                </form>
                <!-- End Contact Form -->

            </div>

            <div class="col-md-4">

                <!-- Classic Heading -->
                <h4 class="classic-title"><span>Información</span></h4>

                <!-- Some Info -->


                <!-- Divider -->
                <div class="hr1" style="margin-bottom:10px;"></div>

                <!-- Info - Icons List -->
                <ul class="icons-list">
                    <li><i class="fa fa-globe">  </i> <strong>Dirección:</strong> Km 12 Vía Acacías, Vereda la Union, Sector Naturalia, Finca El Paraiso</li>
                    <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> concacto@fundacionantioquia.com</li>
                    <li><i class="fa fa-mobile"></i> <strong>Phone:</strong> 311 480 8110 - 310 858 9044 - 318 313 8472</li>
                </ul>

                <!-- Divider -->
                <div class="hr1" style="margin-bottom:15px;"></div>

                <!-- Classic Heading -->
                <h4 class="classic-title"><span>Horario</span></h4>

                <!-- Info - List -->
                <ul class="list-unstyled">
                    <li><strong>Lunes - viernes</strong> - 8am a 6pm</li>
                    <li><strong>Sabado</strong> - 9am a 2pm</li>
                    <li><strong>Domingo</strong> - Visitas 1pm a 5pm</li>
                </ul>

            </div>

        </div>

    </div>

@endsection
{{------end content--}}

@section('script')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA1AUmEiXssHdvD3yAjE4VTh_pWQENfNUM&sensor=true"></script>
    {!!Html::script('front-end/js/gmaps.js')!!}

    <script>
        $(function () {
            map = new GMaps({
                el: '#map',
                lat: 4.074491, 
                lng: -73.712583
            });
            map.addMarker({
                lat: 4.074491,
                draggable: false,
                lng: -73.712583,
                infoWindow: {
                    content: '<h4>Fundacion Social Antioquía</h4><p>Ven y visitanos</p>'
                }

            });

            var formcontacto = $("#contact-form");
            formcontacto.submit(function (e) {
                e.preventDefault();
                $(".cargando").removeClass("hidden");

                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('enviarMensaje')}}',
                    data: formcontacto.serialize(),
                    success: function (data) {
                        if(data == "exito"){
                            $("#notif").html("<div class='alert alert-success alert-dismissible'>" +
                                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                                "<span aria-hidden='true'>&times;</span>" +
                                "</button>" +
                                "<p>" +
                                "<b>Perfecto!</b> Su mensaje fue enviado satisfactoriamente." +
                                "</p>" +
                                "</div>");
                            $(".cargando").addClass("hidden");
                            $("#contact-form").reset();
                        }
                    },
                    error: function (data) {
                    }
                });
            });

        });
    </script>
@endsection
{{------end script--}}