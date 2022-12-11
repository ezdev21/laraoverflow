<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Answer extends Model
{
    use HasFactory,Searchable;
    protected $guarded=[];

    public function question()
    {
      return $this->belongsTo(Question::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function toSearchableArray()
    {
        return[
          'answer'=>$this->body
        ];
    }
}
