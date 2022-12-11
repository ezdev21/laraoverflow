<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function createdAtDiff($value):Attribute
    {
        return Attribute::make(
          get:fn ($value)=>$value->diffForHumans(),
        );
    }
}
