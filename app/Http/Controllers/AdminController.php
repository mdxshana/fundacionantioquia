<?php

namespace App\Http\Controllers;

use App\Albun;
use App\Imagen;
use App\Texto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function editHome()
    {
        $texto = Texto::where('vista', '=', 'index')->get();
        $album = Albun::where('tipo', '=', 'S')->first();
        $album->getImagenes;

        $data['texto'] = $texto;
        $data['galeria'] = $album;
//        dd($data);
        return view('admin.index', $data);
    }

    public function subirImagen(Request $request)
    {
        $fotos = $request->file('inputGalery');

        if ($fotos != null) {
            $fotos = $fotos[0];

            $extension = explode(".", $fotos->getClientOriginalName());
            $cantidad = count($extension) - 1;
            $extension = $extension[$cantidad];
            $nombre = time() . $request->file_id . "." . $extension;

            $fotos->move('images', utf8_decode($nombre));

            $imagen = new Imagen();
            $imagen->albun_id = $request->album;
            $imagen->url = $nombre;
            $imagen->save();

            return json_encode(array('ruta' => $nombre, 'id' => $imagen->id));
        } else
            return json_encode(array('error' => 'Archivo no permitido'));
    }

    public function deleteImage(Request $request)
    {
        $affectedRows = Imagen::where('id', $request->input('id'))->delete();
//        Galeria::destroy($request->input('id'));
        if ($affectedRows > 0) {
            unlink('images/' . utf8_decode($request->input('ruta')));
            return "exito";
        } else {
            return "error";
        }
    }

    public function editTexto(Request $request)
    {
        foreach ($request->all() as $texto){
            $arrayTexto = json_decode($texto);
            $texto = Texto::find($arrayTexto->id)->update(['texto'=>$arrayTexto->texto]);
        }
        return 'exito';
    }

    public function editServicios()
    {
        $pdf = Texto::where('titulo', '=', 'pdf')->first();

        $data['pdf'] = $pdf;
        return view('admin.servicios', $data);
    }

    /**
     * @return array
     */
    public function nuevoAdmin()
    {
        $users = User::where("rol","admin")->get();
        $data["users"]=$users;
        return view('superAdmin.addAdmin',$data);
    }


    /**
     * @return string
     */
    public function addAdmin(Request $request)
    {

        $user = new User($request->all());
        $user->password=bcrypt($request->telefono);
        $user->avatar="avatar";
        $user->rol="admin";
        $user->save();

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $request->_token, 'created_at' => Carbon::now()]
        );


        return "exito";
    }

}
