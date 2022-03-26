<?php

namespace App\Models;

use App\Traits\RuleTrait;
use App\User;
use Chondal\ModelNotes\Traits\HasNotes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes, RuleTrait;
    use HasNotes;

    public static function showModal($errors)
    {
        return $errors->has('razon_social')
            || $errors->has('documento');
    }
    protected $guarded = ['id'];

    protected static $rules = [
        'razon_social' => 'required | max:191',
        'documento' => 'required | numeric | digits_between:7,11 | unique:cuentas,documento',
        'direccion' => 'nullable | max:191',
        'localidad_id' => 'nullable',
        'provincia_id' => 'nullable',
        'codigo_postal' => 'nullable | max:10',
        'telefono' => 'nullable | max:20',
        'email' => 'nullable | email | max:191',
        'heading_id' => 'nullable',
        'observaciones' => 'nullable | max:500',
    ];

    public function heading()
    {
        return $this->belongsTo(Heading::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
}
