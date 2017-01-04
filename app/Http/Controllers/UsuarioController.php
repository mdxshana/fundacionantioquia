<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class UsuarioController extends Controller
{
    /**@param Request $request
     * @return array
     */
    public function contacto(Request $request)
    {
        return view("usuario.contacto");
    }
}
