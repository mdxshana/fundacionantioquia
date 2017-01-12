<?php

namespace App\Http\Controllers;

use App\Albun;
use App\Texto;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;

class UsuarioController extends Controller
{
    /**
     * @return array
     */
    public function home()
    {
        $texto = Texto::where('vista', '=', 'index')->get();
        $album = Albun::where('tipo', '=', 'S')->first();

        $arrayRutas = array();
        foreach($album->getImagenes as $imagen){
            $arrayRutas[]=$imagen->url;
        }


        $data['texto'] = $texto[0]->texto;
        $data['galeria'] = $arrayRutas;


        return view("welcome", $data);
    }

    /**@param Request $request
     * @return array
     */
    public function contacto(Request $request)
    {
        return view("usuario.contacto");
    }

    public static function getPDF()
    {


        $pdf = Texto::where('titulo', '=', 'pdf')->first()->texto;
        $data['pdf']=$pdf;

        $pdf = \PDF::loadView('pdf.info', $data);
        return $pdf->download('requisitos.pdf');
    }



}
