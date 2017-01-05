<?php

namespace App\Http\Controllers;

use App\Albun;
use App\Imagen;
use App\Texto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function editHome()
    {
        $texto = Texto::where('vista', '=', 'index')->get();
        $album = Albun::where('tipo', '=', 'S')->first();
        $album->getImagenes;

        $data['texto'] = $texto[0]->texto;
        $data['galeria'] = $album;
        return view('admin.index', $data);
    }

    public function subirImagen(Request $request)
    {
        $fotos = $request->file('inputGalery');

        if ($fotos != null) {
            $fotos = $fotos[0];
            $sitio = str_replace(' ', '', $request->sitio);

            $extension = explode(".", $fotos->getClientOriginalName());
            $cantidad = count($extension) - 1;
            $extension = $extension[$cantidad];
            $nombre = $sitio . time() . $request->file_id . "." . $extension;

            $fotos->move('images', utf8_decode($nombre));

            $galeria = new Galeria();
            $galeria->id_sitio = $request->id;
            $galeria->foto = $nombre;
            $galeria->save();

            return json_encode(array('ruta' => $nombre, 'id' => $galeria->id));
        } else
            return json_encode(array('error' => 'Archivo no permitido'));
    }
}
