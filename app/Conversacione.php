<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversacione extends Model
{
    protected $appends =['contacto_name','contacto_image'];

    public function getContactoImageAttribute()
    {
        return '/images/users/'.$this->contacto()->first(['image'])->image;
    }

    public function getContactoNameAttribute()
    {
        return $this->contacto()->first(['name'])->name;
    }

    public function contacto()
    {
        return $this->belongsTo(User::class);
    }
}
