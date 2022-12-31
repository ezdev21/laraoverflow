<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;

class Create extends Component
{
    public $team=['title'=>'','description'=>''];

    public function render()
    {
        return view('livewire.team.create');
    }

    public function create()
    {
       Team::create([
        'user_id'=>auth()->user()->id,
        'name'=>$this->team['title'],
        'description'=>$this->team['description'],
       ]);
       return redirect()->route('teams.index')->with('message','team created successfully');
    }
}
