<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversacione;

class ConversacioneController extends Controller
{
    public function index(Request $request)
    {
        $data=Conversacione::where('user_id',auth()->id())->get([
            'id',
            'user_id',
            'contacto_id',
            'last_message',
            'last_time',
            'lista_notificaciones',
            'blockeado'
        ]);
        return $data;
    }
}
