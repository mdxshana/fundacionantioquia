<?php

namespace App\Http\Controllers;

use App\Albun;
use App\Servicio;
use App\Texto;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Expr\Array_;

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

        $servicios = Servicio::where('nombre', '=', 'servicio')->get();
        $arrayServ = array();
        foreach ($servicios as $servicio) {
            $arrayServ[$servicio->descripcion]=$servicio->imagen;
        }

        $servicio = array();
        foreach (array_rand($arrayServ, 4) as $item){
            $servicio[$item] = $arrayServ[$item];
        };
        $data['servicios'] = $servicio;

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

    public function getServicios()
    {
        $textos = Texto::where('vista', '=', 'servicios')->get();
        $data = array();
        foreach ($textos as $texto){
            $data[$texto->titulo]=$texto->texto;
        }

        $imagen = Servicio::where('nombre', '=', 'vinculacion')->first();
        $data['imgVinculo'] = $imagen->imagen;

        $servicios = Servicio::where('nombre', '=', 'servicio')->get();
        $arrayServ = array();
        foreach ($servicios as $servicio) {
            $arrayServ[]=$servicio;
        }

        $data['servicio'] = $servicios[array_rand($arrayServ, 1)];

        return view('usuario.servicios', $data);
    }

    public function getGalerias()
    {
        return view('usuario.galerias');
    }
}
