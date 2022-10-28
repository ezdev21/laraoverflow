<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory,Searchable;

    protected $guarded=[];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function toSearchableArray()
    {
        return[
          'name'=>$this->name
        ];
    }
}
