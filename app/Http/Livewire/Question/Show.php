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

    public function mount(Question $question)
    {
        $this->$question=$question;
    }
}
