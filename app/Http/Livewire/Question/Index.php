<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $questions;

    public function mount()
    {
      $this->questions=Question::latest()->limit(100)->withCount('answers')->paginate(10);
    }

    public function render()
    {
        return view('livewire.question.index',['questions'=>$this->questions]);
    }
}
