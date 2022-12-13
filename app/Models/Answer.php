<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Answer extends Model
{
    use HasFactory,Searchable;
    protected $guarded=[];

    public static function boot()
    {
        parent::boot();
        self::creating(function($answer){
          $answer->user_id=auth()->user()->id;
        });
    }

    public function question()
    {
      return $this->belongsTo(Question::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
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
