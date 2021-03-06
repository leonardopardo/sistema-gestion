<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Heading extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static $rules = [
        'name' => 'required | max:191',
        'description' => 'nullable | max:191',
    ];
}
