<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $casts=[
        'escrito'=>'boolean'
    ];
}
