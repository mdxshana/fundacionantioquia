@extends('layouts.back-end.layout')

@section('style')
@endsection

@section('cabecera')

@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
            <div class="row mar-bot15">
                <div class="col-md-12 article-v1-title titulos"><h3><b>Texto</b><span style="color: red;">*</span></h3></div>
                <div class="col-md-12 textos">Edita el texto que aparece en la descripción de la página principal</div>
            </div>
            <form id="textoInicio">
                <div class="row">
                    <div class="col-xs-12" style="margin-bottom: 15px">
                        <textarea id='infoSomos' name='infoAdicional' rows='10' cols='30' style='height:440px'>

                        </textarea>
                    </div>
                </div>

                <div class="row mar-bot15">
                    <div class="col-sm-6 col-sm-offset-6 text-right" style="color: red;"><b>*Atencion: </b>Estos cambios se reflejan directamente en la página principal, edita apropiadamente esta sección.</div>
                </div>

                <div class="row mar-bot15">
                    <div class="col-xs-12 text-right">
                        <button type='submit' class='btn btn-primary'>Guardar</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="alertTexto"></div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    {!!Html::script('plugins/ckeditor/ckeditor.js')!!}

    <script>
        $(function () {
            CKEDITOR.replace('infoAdicional', {removeButtons:'Image'});
        });
    </script>

@endsection