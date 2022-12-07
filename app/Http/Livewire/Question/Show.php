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
        $this->answers=$this->question->answers()->get();
        if(auth()->user())
        {
            foreach ($this->answers as $answer) {
                $answer->liked=$answer->users()->where([['user_id',auth()->user()->id],['type','like']])->count();
                $answer->disliked=$answer->users()->where([['user_id',auth()->user()->id],['type','dislike']])->count();;
            }
        }
        $this->question->views++;
        //$this->question->save();
        $this->question->voting=false;
    }

    public function render()
    {
        return view('livewire.question.show');
    }

    public function upVoteQuestion()
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

    public function downVoteQuestion()
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

    public function upVoteAnswer($answerId)
    {
       if(auth()->user())
       {
            $answer=$this->answers->find($answerId);
            $liked=$answer->users()->where([['user_id',auth()->user()->id],['type','like']])->count();
            if($liked){
            $answer->users()->detach(auth()->user()->id);
            $answer->liked=false;
            }
            else{
            $answer->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'like']]);
            if($answer->disliked){
                $answer->disliked=false;
            }
            $answer->liked=true;
            }
       }
       else{
        $this->question->voting=true;
       }
    }

    public function downVoteAnswer($answerId)
    {
       if(auth()->user())
       {
            $answer=$this->answers->find($answerId);
            $disliked=$answer->users()->where([['user_id',auth()->user()->id],['type','dislike']])->count();
            if($disliked){
              $answer->users()->detach(auth()->user()->id);
              $answer->disliked=false;
            }
            else{
              $answer->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'dislike']]);
              if($answer->liked){
                $answer->liked=false;
              }
              $answer->disliked=true;
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

    public function totalVote($answerId)
    {
        $answer=Answer::find($answerId);
        $totalUpvote=$answer->users()->where('type','like')->count();
        $totalDownvote=$answer->users()->where('type','dislike')->count();
        $netVote=$totalUpvote-$totalDownvote;
        return $netVote;
    }
}
