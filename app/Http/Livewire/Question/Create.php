<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use App\Models\Tag;
use Livewire\Component;

class Create extends Component
{
    public $question=['title'=>'','description'=>'','category_id'=>'0'];
    public $tag='';
    public $tags=[];
    public $maxTagError=false;

    public function render()
    {
        return view('livewire.question.create');
    }

    public function addTag()
    {
       if(count($this->tags)<5 && $this->tag){
          array_push($this->tags,$this->tag);
          $this->tag='';
       }
       else{
        $this->maxTagError=true;
       }
    }

    public function removeTag(int $index)
    {
      unset($this->tags[$index]);
    }

    public function ask()
    {
        $question=Question::create([
        'user_id'=>auth()->user()->id,
        'category_id'=>$this->question['category_id'],
        'title'=>$this->question['title'],
        'description'=>$this->question['description'],
       ]);
       foreach ($this->tags as $tag) {
         $tag=Tag::create(['name'=>$tag]);
         $question->tags()->attach($tag->id);
       }
       return redirect()->route('questions.index')->with('message','question created successfully');
    }
}
