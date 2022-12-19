<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Question extends Model
{
    use HasFactory,Searchable;

    protected $guarded=[];

    protected $appends=['totalUpVote','totalDownVote','liked','disliked'];

    public static function boot()
    {
        parent::boot();
        self::creating(function($question){
          $question->user_id=auth()->user()->id;
        });
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

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
    public function createdAtDiff():Attribute
    {
        return Attribute::make(
            get:fn () =>$this->created_at->diffForHumans()
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getTotalUpVoteAttribute()
    {
        return $this->users()->where('type','like')->count();
    }

    public function getTotalDownVoteAttribute()
    {
        return $this->users()->where('type','dislike')->count();
    }

    public function getLikedAttribute()
    {
        return auth()->user()? $this->users()->where([['user_id',auth()->user()->id],['type','like']])->exists() : false;
    }

    public function getDislikedAttribute()
    {
        return auth()->user()? $this->users()->where([['user_id',auth()->user()->id],['type','dislike']])->exists() : false;
    }

    public static function unAnsweredQuestions():int
    {
        return Question::withCount('answers')->get()->where('answers_count',0)->count();
    }
}
