<?php

namespace App;

use App\Traits\RuleTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes, RuleTrait;

    public static function showModal($errors)
    {
        return $errors->has('name')
            || $errors->has('email')
            || $errors->has('password');
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected static $rules = [
        'name' => 'required | min:4 | max:191',
        'email' => 'required | email',
        'password' => [
            'required',
            'confirmed',
            'min:12',
            'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[-@#$%^&*()!?_=+;:,.]).{12,}$/',
        ],
    ];

    //region Relations
    public function cuentas()
    {
        return $this->belongsToMany(\App\Models\Cuenta::class, 'cuenta_user');
    }
    //endregion

    //region Getters
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }
    //endregion

    //region Setters
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower(trim($name));
    }

    public function setUserNameAttribute($name)
    {
        $this->attributes['user_name'] = strtolower(trim($name));
    }

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower(trim($email));
    }
    public function setPasswordAttribute($password)
    {
        // $this->attributes['password'] = bcrypt($password);
        $this->attributes['password'] = $password;
    }

    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new ResetPasswordNotification($token));
    // }

    public function clientes()
    {
        return $this->belongsToMany(\App\Models\Cuenta::class, 'cuenta_user');
    }

    public function carpetas()
    {
        return $this->hasMany(\App\Models\Carpeta::class, 'usuario_id');
    }


    //endregion
}
