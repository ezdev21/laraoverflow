<?php

namespace App\Http\Livewire\Question;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Tag;
use Livewire\Component;

class Show extends Component
{
    public Question $question;
    public $answer="";
    public $answers;
    public $relatedQuestions;
    public $tags;

    public function mount()
    {
        $this->answers=$this->question->answers()->get();
        $this->tags=$this->question->tags()->get();
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
        $this->getRelatedQuestions();
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
            }
            else{
              $answer->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'like']]);
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
            }
            else{
              $answer->users()->syncWithoutDetaching([auth()->user()->id=>['type'=>'dislike']]);
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

    public function getRelatedQuestions()
    {
        $relatedQuestions=collect();
        $tags=$this->question->tags()->get();
        foreach ($tags as $tag) {
          $tag->questions()->latest()->limit(10)->withCount('answers')->each(function($tagQuestion) use($relatedQuestions){
            $relatedQuestions->push($tagQuestion);
          });
        }
        $this->relatedQuestions=$relatedQuestions->shuffle()->take(10);
    }
}
