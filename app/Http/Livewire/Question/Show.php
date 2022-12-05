<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Livewire\Component;

class Show extends Component
{
    public Question $question;

    public function render()
    {
        return view('livewire.question.show');
    }

    public function upVote()
    {
       $liked=$this->question->users()->where([['user_id',auth()->user()->id],['type','like']])->count();
       if($liked){
          $this->question->users()->detach(auth()->user()->id);
       }
       else{
          $this->question->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'like']]);
       }
    }

    public function downVote()
    {
       $disliked=$this->question->users()->where([['user_id',auth()->user()->id],['type','dislike']])->count();
       if($disliked){
          $this->question->users()->detach(auth()->user()->id);
       }
       else{
          $this->question->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'dislike']]);
       }
    }

}
