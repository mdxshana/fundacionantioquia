<?php

namespace App\Http\Controllers;

use App\Albun;
use App\Servicio;
use App\Texto;
use App\Video;
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

    /**
     * @return array
     */
    public function contacto()
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
    
    /**
     * @return array
     */
    public function somos()
    {

        $textos = Texto::whereIn("titulo",["somos","vision","mision"])->get();
        $data = array();

        $images = Servicio::whereIn("nombre",["servicio","somos"])->get();



        $data["somos"] = $textos->whereIn("titulo",["somos"])->first();
        $data["vision"] = $textos->whereIn("titulo",["vision"])->first();
        $data["mision"] = $textos->whereIn("titulo",["mision"])->first();

        $data["images"]=$images->whereIn("nombre",["servicio"]);
        $data["imageSomos"]=$images->whereIn("nombre",["somos"])->first();


        return view("usuario.somos",$data);
    }


    public function getGalerias()
    {
        return view('usuario.galerias');
    }

    public function getVideos()
    {
        $videos = Video::all();

        $data["videos"]=$videos;
        return view('usuario.videos',$data);
    }

}
