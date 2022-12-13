<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function($comment){
          $comment->user_id=auth()->user()->id;
        });
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
