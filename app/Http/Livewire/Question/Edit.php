<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Illuminate\Http\Request;
use Livewire\Component;

class Edit extends Component
{
    public Question $question;

    public function render()
    {   
        return view('livewire.question.edit');
    }

    public function mount(Question $question)
    {
        $this->$question=$question;
    }

    public function update()
    {
       $this->question->update([
        'category_id'=>$this->question['category_id'],
        'title'=>$this->question['title'],
        'description'=>$this->question['description'],
       ]);
       return redirect()->route('question.index')->with('message','question edited successfully');
    }
}
