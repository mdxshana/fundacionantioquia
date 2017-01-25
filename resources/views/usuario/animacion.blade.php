<!doctype html>
<html lang="es">

<head>
    {!!Html::style('front-end/asset/css/bootstrap.min.css')!!}
    <style>
        .imagen{
            position: absolute;
        }
        #15{
            left: 0;
        }
    </style>
</head>

<body>
    {{--<div class="contenedor">--}}
        <img id="1" class="imagen" src="images/animacion/1.png" width="50%" height="100%" style="display: none">
        <img id="2" class="imagen" src="images/animacion/2.png" width="50%" height="100%" style="display: none">
        <img id="3" class="imagen" src="images/animacion/3.png" width="50%" height="100%" style="display: none">
        <img id="4" class="imagen" src="images/animacion/4.png" width="50%" height="100%" style="display: none">
        <img id="5" class="imagen" src="images/animacion/5.png" width="50%" height="100%" style="display: none">
        <img id="6" class="imagen" src="images/animacion/6.png" width="50%" height="100%" style="display: none">
        <img id="7" class="imagen" src="images/animacion/7.png" width="50%" height="100%" style="display: none">
        <img id="8" class="imagen" src="images/animacion/8.png" width="50%" height="100%" style="display: none">
        <img id="9" class="imagen" src="images/animacion/9.png" width="50%" height="100%" style="display: none">
        <img id="10" class="imagen" src="images/animacion/10.png" width="50%" height="100%" style="display: none">
        <img id="11" class="imagen" src="images/animacion/11.png" width="50%" height="100%" style="display: none">
        <img id="12" class="imagen" src="images/animacion/12.png" width="50%" height="100%" style="display: none">
        <img id="13" class="imagen" src="images/animacion/13.png" width="50%" height="100%" style="display: none">
        <img id="14" class="imagen" src="images/animacion/14.png" width="50%" height="100%" style="display: none">
        <img id="15" class="imagen" src="images/animacion/15.png" width="50%" height="100%" style="display: none">
    {{--</div>--}}
</body>

{!!Html::script('front-end/js/jquery-2.1.4.min.js')!!}
{!!Html::script('front-end/asset/js/bootstrap.min.js')!!}
<script>
    $(document).ready(function() {
        $(".contenedor").css('width', $(window).width() + "px");
        $(".contenedor").css('height', $(window).height() + "px");
        console.log($(window).width()+" x "+$(window).height());

        $("#1").fadeIn(2000);
        setTimeout(function(){
            $("#2").fadeIn(1900);
        },1300);
        setTimeout(function(){
            $("#1").fadeOut(1300);
        },2250);
        setTimeout(function(){
            $("#3").fadeIn(1800);
        },2500);
        setTimeout(function(){
            $("#2").fadeOut(1300);
        },3400);
        setTimeout(function(){
            $("#4").fadeIn(1700);
        },3600);
        setTimeout(function(){
            $("#3").fadeOut(1300);
        },4450);
        setTimeout(function(){
            $("#5").fadeIn(1600);
        },4600);
        setTimeout(function(){
            $("#4").fadeOut(1300);
        },5400);
        setTimeout(function(){
            $("#6").fadeIn(1500);
        },5500);
        setTimeout(function(){
            $("#5").fadeOut(1300);
        },6250);

        $("#15").animate({width:0},{duration:350});
//        setTimeout(function(){
//            $("#7").fadeIn(1400);
//        },6300);
//        setTimeout(function(){
//            $("#6").fadeOut(1500);
//        },7000);


    });
</script>

</html>