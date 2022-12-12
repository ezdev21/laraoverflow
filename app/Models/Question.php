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
    public function askedAt():Attribute
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
        if(auth()->user()){
            return $this->users()->where([['user_id',auth()->user()->id],['type','like']])->count();
        }
        else{
            return false;
        }
    }

    public function getDislikedAttribute()
    {
        if(auth()->user()){
            return $this->users()->where([['user_id',auth()->user()->id],['type','dislike']])->count();
        }
        else{
            return false;
        }
    }

    public static function unAnsweredQuestions():int
    {
        // return static::query()->where(function($query){
        //     return $query->where('question.answers',0)->count();
        // })->count();
        return Question::withCount('answers')->get()->where('answers_count',0)->count();
    }
}
