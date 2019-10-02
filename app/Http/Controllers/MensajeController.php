<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;
use DB;

class MensajeController extends Controller
{
    public function index()
    {
        $user=auth()->id();
        $data=Mensaje::select('id',
        DB::raw("if(`from_id`=$user,true,false) as escrito"),'created_at','content')
        ->get();
        return $data;
    }

    public function store(Request $request)
    {
        $mensaje=new Mensaje();
        $mensaje->from_id= auth()->id();
        $mensaje->to_id= $request->to_id;
        $mensaje->content= $request->content;
        $saved=$mensaje->save();

        $data=[];
        $data['success']=$saved;
        return $data;

    }
}
