<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Team extends Model
{
    use HasFactory,Searchable;


    public function users()
    {
       return $this->belongsToMany(User::class);
    }

    public function toSearchableArray()
    {
        return[
          'answer'=>$this->name
        ];
    }
}
