<?php

namespace App\Http\Controllers;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;


class MessageController extends Controller
{

    public function store(){
    	// return request('email');
    	$message = request()->validate([
    		// Si dejas en blanco la pagina, te retorna nuevamente
    		'name'=> 'required', 
    		'email'=> 'required|email', //requerido y que sea de tipo email
    		'subject'=>'required',
    		'content'=>'required|min:3' //requerido y que sea mini 3 caracteres
    	], [
            // Si quiero que solo algunos se personalicen el mensaje de error
            'name.required' =>__('I need your name pelana')

        ]);


    	// Si cumple la valiadcion
    	// Envia email
        // Mail::to('mitnick117@gmail.com')->send(new MessageReceived($message));

        Mail::to('mitnick117@gmail.com')->queue(new MessageReceived($message));

       

        // return 'Mensaje enviado';
        // Para regresar a formulario, con back['llave de sesion', 'valor'] o redirect
        return back()->with('status','Recibimos tu mensaje perro jeje');
    } 
}
