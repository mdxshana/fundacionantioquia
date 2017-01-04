<!DOCTYPE html>
<html>
<head>
    <title>Light Blue - Admin Template</title>
    {!!Html::style('back-end/css/application.min.css')!!}

    {{--<link href="css/application.min.css" rel="stylesheet"/>--}}
    {{--<link rel="shortcut icon" href="img/favicon.png" />--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body class="background-dark">
<div class="logo">
    <h4><a href="index.html">Light <strong>Blue</strong></a></h4> </div>
    @include('layouts.back-end.menu-side')
<div class="wrap">
    <header class="page-header">
        @include('layouts.back-end.menu-top')
    </header>
    <div class="content container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h2 class="page-title">Responsive Grid <small>Fully responsive layout</small></h2>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 offset3">
                <section class="widget tiny">
                    <header>
                        <h4>

                            Span8 widget
                        </h4>
                    </header>
                    <div class="body">
                        <blockquote>
                            Looks great with <code>.offset2</code>
                        </blockquote>
                    </div>
                </section>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span10 offset1">
                <section class="widget tiny">
                    <header>
                        <h4>
                            The same with 10
                        </h4>
                    </header>
                    <div class="body">
                        <blockquote>
                            Looks great with <code>.offset1</code>
                        </blockquote>
                    </div>
                </section>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span5">
                <section class="widget tiny-x2">
                    <header>
                        <h4>
                            Span5
                        </h4>
                    </header>
                    <div class="body">
                    </div>
                </section>
            </div>
            <div class="span4">
                <section class="widget tiny">
                    <header>
                        <h4>
                            Span4
                        </h4>
                    </header>
                    <div class="body">
                    </div>
                </section>
                <section class="widget tiny">
                    <header>
                        <h4>
                            Span4
                        </h4>
                    </header>
                    <div class="body">
                    </div>
                </section>
            </div>
            <div class="span3">
                <section class="widget tiny">
                    <header>
                        <h4>
                            Span3
                        </h4>
                    </header>
                    <div class="body">
                    </div>
                </section>
                <section class="widget tiny">
                    <header>
                        <h4>
                            Span3
                        </h4>
                    </header>
                    <div class="body">
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- jquery and friends -->
{!!Html::script('back-end/lib/jquery/jquery.1.9.0.min.js')!!}
{!!Html::script('back-end/lib/jquery/jquery-migrate-1.1.0.min.js')!!}
{{--<script src="lib/jquery/jquery.1.9.0.min.js"> </script>--}}
{{--<script src="lib/jquery/jquery-migrate-1.1.0.min.js"> </script>--}}

<!-- jquery plugins -->

{{--<script src="lib/jquery-maskedinput/jquery.maskedinput.js"></script>--}}
{{--<script src="lib/parsley/parsley.js"> </script>--}}
{{--<script src="lib/uniform/js/jquery.uniform.js"></script>--}}
{{--<script src="lib/select2.js"></script>--}}

<!--backbone and friends -->
{!!Html::script('back-end/lib/backbone/underscore-min.js')!!}
{{--<script src="lib/backbone/underscore-min.js"></script>--}}

<!-- bootstrap default plugins -->
{!!Html::script('back-end/js/bootstrap/bootstrap-transition.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-collapse.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-alert.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-tooltip.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-popover.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-button.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-dropdown.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-modal.js')!!}
{!!Html::script('back-end/js/bootstrap/bootstrap-tab.js')!!}
{{--<script src="js/bootstrap/bootstrap-transition.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-collapse.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-alert.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-tooltip.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-popover.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-button.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-dropdown.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-modal.js"></script>--}}
{{--<script src="js/bootstrap/bootstrap-tab.js"> </script>--}}

<!-- basic application js-->
{!!Html::script('back-end/js/app.js')!!}
{!!Html::script('back-end/js/settings.js')!!}
{{--<script src="js/app.js"></script>--}}
{{--<script src="js/settings.js"></script>--}}




</body></html>