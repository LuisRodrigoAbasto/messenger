<?php

namespace App\Observers;

use App\Mensaje;
use App\Conversacione;
use App\Events\MensajeEnviado;

class MensajeObserver
{
    /**
     * Handle the Mensaje "created" event.
     *
     * @param  \App\Mensaje  $mensaje
     * @return void
     */
    public function created(Mensaje $mensaje)
    {
        $conversacion=Conversacione::where('user_id',$mensaje->from_id)
        ->where('contacto_id',$mensaje->to_id)->first();

        if($conversacion)
        {
            $conversacion->last_message="Tú: $mensaje->content";
            $conversacion->last_time=$mensaje->created_at;
            $conversacion->save();
        }
        $conversacion=Conversacione::where('contacto_id',$mensaje->from_id)
        ->where('user_id',$mensaje->to_id)->first();

        if($conversacion)
        {
            $conversacion->last_message="$conversacion->contacto_name: $mensaje->content";
            $conversacion->last_time=$mensaje->created_at;
            $conversacion->save();
        }
        event(new MensajeEnviado($mensaje));
    }

}