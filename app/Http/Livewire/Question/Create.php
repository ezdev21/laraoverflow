<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $question=['title'=>'','description'=>''];

    public function render()
    {
        return view('livewire.question.create');
    }

    public function ask()
    {
       Question::create([
        'user_id'=>auth()->user()->id,
        'title'=>$this->question['title'],
        'descirption'=>$this->question['description'],
       ]);
       return redirect()->route('home');
    }
}
