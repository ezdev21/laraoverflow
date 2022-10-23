<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $question=['title'=>'','description'=>'','category_id'=>'0'];

    public function render()
    {
        return view('livewire.question.create');
    }

    public function ask()
    {
       Question::create([
        'user_id'=>auth()->user()->id,
        'category_id'=>$this->question['category_id'],
        'title'=>$this->question['title'],
        'description'=>$this->question['description'],
       ]);
       return redirect()->route('question.index')->with('message','question created successfully');
    }
}
