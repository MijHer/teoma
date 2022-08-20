<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store()
    {
    	$msg = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'subjet' => 'required',
    		'content' => 'required'
    	]);

        Mail::to('miher_xr@hotmail.com')->queue( new MessageReceived($msg));

    	return back()->with('status', 'Tu Mensaje fue recibido con exito');
    }
}
