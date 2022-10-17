<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Livewire\Component;

class Index extends Component
{
    public $questions;

    public function mount()
    {
      $this->questions=Question::latest()->limit(100)->withCount('answers')->paginate(16);
    }

    public function render()
    {
        return view('livewire.question.index');
    }
}
