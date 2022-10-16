<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Question extends Model
{
    use HasFactory,Searchable;

    protected $guarded=[];

    public function answers()
    {
      return $this->hasMany(Answer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function toSearchableArray()
    {
        return[
          'title'=>$this->title,
          'description'=>$this->description
        ];
    }
}
