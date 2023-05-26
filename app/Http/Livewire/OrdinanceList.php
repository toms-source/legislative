<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;

class OrdinanceList extends Component
{
     
    protected $listener = ['ordinanceAdded'=>'render'];
    
    public function render()
    {
        $ordinances = Ordinance::all();
        return view('livewire.ordinance-list', ['ordinances' => $ordinances]);
    }
}
