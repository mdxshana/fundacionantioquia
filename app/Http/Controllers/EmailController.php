<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    /**
     * @return String
     */
    public function enviarMensaje(Request $request)
    {
        global  $email, $asunto;
        $email = $request->email;
        $asunto = $request->asunto;
        Mail::send("emails.contacto",$request->all(),function ($msj){
            global  $email,$asunto;
            $msj->subject($asunto);
            $msj->to("concacto@fundacionantioquia.com");
            $msj->replyTo($email, $name = null);

        });
        //Session::flash('message','Mensaje fue enviado correctamente');
        return "exito";
    }
}
