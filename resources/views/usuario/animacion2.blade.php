<!doctype html>
<html lang="es">

<head>
    {!!Html::style('front-end/asset/css/bootstrap.min.css')!!}
    <style>
        #cinta, .imagen {
            position: absolute;
        }

        body{
            background: #31582b;
        }

        #cinta {
            right: 0;

        }
        .mano1{
            position: absolute;
            left: 2000px;
            z-index: 5;
        }

        .mano2{
            position: absolute;
            width: 100%;
            z-index: 10;
        }

        .mano3{
            position: absolute;
            transform: rotate(120deg);
            width: 100%;
            z-index: 15;
        }
        .logo{
            width: 100%;
            position: absolute;
            left: 2000px;
        }

        .prueba{
            -webkit-transition: width 1s ease-in;
            -moz-transition: width 1s ease-in;
            -o-transition: width 1s ease-in;
            transition: width 1s ease-in;
            width: 100%;
        }

        @media (max-width: 768px) {
            .imagen {
                width: 100%;
            }

            #texto {
                display: none;
            }
        }
    </style>
</head>

<body>

{{--<audio src="videos/audio.mp3" preload="auto" autoplay></audio>--}}

<img src="images/animacion2/mano1.png" class="mano1">
<img src="images/animacion2/mano2.png" class="mano2" style="display: none">
<img src="images/animacion2/mano3.png" class="mano3"  style="display: none">
<img src="images/animacion2/logofinal.png" class="logo" style="display: none">
{{--</div>--}}
</body>
{!!Html::script('front-end/js/jquery-2.1.4.min.js')!!}
{!!Html::script('back-end/js/jquery.ui.min.js')!!}
{!!Html::script('front-end/asset/js/bootstrap.min.js')!!}
<script>
    var alto;
    var ancho;
    $(document).ready(function () {
        audio = new Audio();
        audio.src ="images/animacion2/audio.mp3";
        audio.play();
        alto = $(window).height();
        ancho = $(window).width();
        $('img.mano1').width(ancho * 0.34);
        animatemano1();
        setTimeout(function () {
            $('img.mano2').show();
            $('img.mano2').animate({
                width:ancho * 0.26,
            },{
                duration:500,
                step: function (now) {
                    $('img.mano2').css({top:$('img.mano1').height()-$('img.mano2').height()})
                }
            });
            $('img.mano2').css({left:$('img.mano1')[0].offsetLeft, top:$('img.mano1')[0].offsetTop})

        }, 1000)

        setTimeout(function () {
            $('img.mano3').show();
            $('img.mano3').animate({
                width:ancho * 0.19,
                deg: 360
            },{
                duration:500,
                step: function (now, fx) {
                    $('img.mano3').css({top:$('img.mano1').height()-$('img.mano3').height()});
                    if(fx.prop == "deg"){
                        $('img.mano3').css({transform: 'rotate(' + now + 'deg)'})
                    }
                }
            });
            $('img.mano3').css({left:$('img.mano1')[0].offsetLeft})
        }, 1500)

        setTimeout(function () {
            $("img.logo").show();
            $("img.logo").animate({
                left: 0
            },500);
            $("img.logo").css({top:$('img.mano1')[0].offsetTop+$('img.mano1').height()});
        },2000);


        setTimeout(function () {
            $("img.logo").animate({
                algo:300
            },{
                duration:200,
                step:function (now) {
                    $("img.mano1").width((ancho * 0.34)+now)
                    $("img.mano2").width((ancho * 0.26)+now)
                    $("img.mano3").width((ancho * 0.19)+now)
                }
            })
        }, 3500)

        setTimeout(function () {
            $("img.logo").animate({
                algo:0
            },{
                duration:300,
                step:function (now) {
                    $("img.mano1").width((ancho * 0.34)+now)
                    $("img.mano2").width((ancho * 0.26)+now)
                    $("img.mano3").width((ancho * 0.19)+now)
                }
            })
        }, 3800)

        setTimeout(function () {
            window.location = '{{route('home')}}';
        }, 9800);

    });

    function animatemano1() {
        console.log($(".mano1").width()/2);
        $(".mano1").animate({
            left: (ancho/2)-($(".mano1").width()/2)
        },1000);
    }

</script>

</html>