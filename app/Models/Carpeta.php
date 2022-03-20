<?php

namespace App\Models;

use App\Contracts\ShowModalContract;
use App\Traits\RuleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Carpeta extends Model implements ShowModalContract
{
    use SoftDeletes, RuleTrait;

    protected $guarded = [
        'id'
    ];

    public static function showModal($errors)
    {
        return $errors->has('cuenta_id')
            || $errors->has('usuario_id')
            || $errors->has('fuero_id')
            || $errors->has('juzgado_id')
            || $errors->has('numero');
    }

    protected static $rules = [
        'cuenta_id' => 'required',
        'usuario_id' => 'required',
        'juzgado_id' => 'nullable',
        'tipo_carpeta_id' => 'required',
        'fecha_inicio' => 'required',
        'numero' => 'required',
        'caratula'=> 'required | max:500',
        'descripcion' => 'required',
        'observaciones' => 'required'
    ];

    public function responsable()
    {
        return $this->belongsTo(\App\User::class, 'usuario_id', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoCarpeta::class);
    }

    public function tipo()
    {
        return $this->belongsTo(TipoCarpeta::class, 'tipo_carpeta_id');
    }

    public function juzgados()
    {
        return $this->belongsToMany(Juzgado::class, 'carpetas_juzgados', 'juzgado_id', 'carpeta_id')
            ->withTimestamps();
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class)->orderByDesc('fecha_presentacion');
    }

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function getCaratulaAttribute($value)
    {
        return ucwords($value);
    }

    public function scopeActivas($query)
    {
        return $query->where('archivada', false);
    }

    public function scopeArchivo()
    {
        return $this->where('archivada', true);
    }

    public function scopeConfidenciales()
    {
        return $this->where('confidencial', true);
    }

    public function scopePublicas()
    {
        return $this->where('publica', true);
    }
}
