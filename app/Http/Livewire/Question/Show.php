<?php

namespace App\Http\Livewire\Question;

use App\Models\Answer;
use App\Models\Question;
use Livewire\Component;

class Show extends Component
{
    public Question $question;
    public $answer="";

    public function mount()
    {
        $this->question->views++;
        //$this->question->save();
        $this->question->voting=false;
    }
    public function render()
    {
        return view('livewire.question.show');
    }

    public function upVote()
    {
       if(auth()->user())
       {
            $liked=$this->question->users()->where([['user_id',auth()->user()->id],['type','like']])->count();
            if($liked){
            $this->question->users()->detach(auth()->user()->id);
            }
            else{
            $this->question->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'like']]);
            }
       }
       else{
        $this->question->voting=true;
       }
    }

    public function downVote()
    {
       if(auth()->user())
       {
            $disliked=$this->question->users()->where([['user_id',auth()->user()->id],['type','dislike']])->count();
            if($disliked){
            $this->question->users()->detach(auth()->user()->id);
            }
            else{
            $this->question->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'dislike']]);
            }
       }
       else{
        $this->question->voting=true;
       }
    }

    public function closeModal()
    {
        $this->question->voting=false;
    }

    public function answer()
    {
      Answer::create([
        'user_id'=>auth()->user()->id,
        'question_id'=>$this->question->id,
        'body'=>$this->answer
      ]);
    }

    public function getFirstChar()
    {
       return strtoupper(substr(auth()->user()->name, 0, 1));
    }
}
