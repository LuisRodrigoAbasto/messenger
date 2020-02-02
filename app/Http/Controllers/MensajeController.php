<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;
use DB;

class MensajeController extends Controller
{
    public function index(Request $request)
    {
        $user=auth()->id();
        $contacto=$request->contacto_id;
        $data=Mensaje::select('id',
        DB::raw("if(`from_id`=$user,true,false) as escrito"),'created_at','content')
        ->where(function ($query) use($user,$contacto)
        {
            $query->where('from_id',$user)
            ->where('to_id',$contacto);
        })->orWhere(function ($query) use($user,$contacto)
        {
            $query->where('from_id',$contacto)
            ->where('to_id',$user);
        })->get();
        return $data;
    }

    public function store(Request $request)
    {
        $mensaje=new Mensaje();
        $mensaje->from_id= \auth()->id();
        $mensaje->to_id= $request->to_id;
        $mensaje->content= $request->content;
        $saved=$mensaje->save();

        $data=[];
        $data['success']=$saved;
        $data['mensaje']=$mensaje;
        return $data;

    }
}
