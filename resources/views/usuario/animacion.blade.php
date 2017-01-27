<!doctype html>
<html lang="es">

<head>
    {!!Html::style('front-end/asset/css/bootstrap.min.css')!!}
    <style>
        #cinta, .imagen{
            position: absolute;
        }
        #cinta{
            right: 0;

        }
        @media (max-width: 768px) {
            .imagen{
                width: 100%;
            }
            #texto{
                display: none;
            }
        }
    </style>
</head>

<body>

    <audio src="videos/audio.mp3" preload="auto" autoplay></audio>

    <img id="cinta" src="images/animacion/cinta.png" width="100%" height="100%" style="display: none">
    <img id="1" class="imagen" src="images/animacion/1.png" width="40%" height="100%" style="display: none">
    <img id="2" class="imagen" src="images/animacion/2.png" width="40%" height="100%" style="display: none">
    <img id="3" class="imagen" src="images/animacion/3.png" width="40%" height="100%" style="display: none">
    <img id="4" class="imagen" src="images/animacion/4.png" width="40%" height="100%" style="display: none">
    <img id="5" class="imagen" src="images/animacion/5.png" width="40%" height="100%" style="display: none">
    <img id="6" class="imagen" src="images/animacion/6.png" width="40%" height="100%" style="display: none">
    <img id="7" class="imagen" src="images/animacion/7.png" width="40%" height="100%" style="display: none">

    <img id="texto" class="imagen" src="images/animacion/letras.png" width="60%" height="100%" style="margin-left: 40%; display: none">

    {{--</div>--}}
</body>
{!!Html::script('front-end/js/jquery-2.1.4.min.js')!!}
{!!Html::script('back-end/js/jquery.ui.min.js')!!}
{!!Html::script('front-end/asset/js/bootstrap.min.js')!!}
<script>
    $(document).ready(function() {
        $(".contenedor").css('width', $(window).width() + "px");
        $(".contenedor").css('height', $(window).height() + "px");


        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        if(isMobile.any()){
            $(".imagen").attr('width', '100%');
        }

        $("#1").fadeIn(2000);
        setTimeout(function () {
            $("#2").fadeIn(1900);
        }, 1300);
        setTimeout(function () {
            $("#1").fadeOut(1300);
        }, 2250);
        setTimeout(function () {
            $("#3").fadeIn(1800);
        }, 2500);
        setTimeout(function () {
            $("#2").fadeOut(1300);
        }, 3400);
        setTimeout(function () {
            $("#4").fadeIn(1700);
        }, 3600);
        setTimeout(function () {
            $("#3").fadeOut(1300);
        }, 4450);
        setTimeout(function () {
            $("#5").fadeIn(1600);
        }, 4600);
        setTimeout(function () {
            $("#4").fadeOut(1300);
        }, 5400);
        setTimeout(function () {
            $("#6").fadeIn(1500);
        }, 5500);
        setTimeout(function () {
            $("#5").fadeOut(1300);
        }, 6250);

        $("#cinta").show("slide", {
            direction: 'right'
        }, 7500);
            //

        if ($(window).width()>=768 && !isMobile.any()) {
            setTimeout(function () {
                $("#texto").show("clip", 3000);
            }, 6300);
        }

        setTimeout(function () {
            window.location = '{{route('home')}}';
        }, 15000);




    });
</script>

</html>