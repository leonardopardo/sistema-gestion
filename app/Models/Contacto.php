<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{

    protected $guarded = [];

    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cuenta::class);
    }


    //region Getters
    public function getFullNameAttribute()
    {
        return $this->name .' '. $this->lastname;
    }
    //endregion
}
