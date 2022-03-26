<?php

namespace App\Models;

use App\Traits\RuleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, RuleTrait, SoftDeletes;

    protected $guarded = ['id'];

    protected static $rules = [
        'name' => 'required | max:191',
        'description' => 'nullable | max:191'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
