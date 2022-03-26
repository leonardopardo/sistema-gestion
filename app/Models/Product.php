<?php

namespace App\Models;

use App\Traits\RuleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, RuleTrait, SoftDeletes;

    protected $guarded = ['id'];

    protected static $rules = [
        'category_id' => 'required',
        'title' => 'required | max:191',
        'description' => 'required | max:191',
        'image' => 'nullable | max:191'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
