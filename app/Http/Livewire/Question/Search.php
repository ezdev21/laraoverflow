<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Livewire\Component;

class Search extends Component
{
    public string $query='';
    public $questions;

    public function render()
    {
        return view('livewire.question.search');
    }

    public function mount()
    {
        $this->query=request()->query('query');
        $this->search();
    }

    public function search()
    {
       $this->questions=Question::search($this->query)->get();
    }
}
