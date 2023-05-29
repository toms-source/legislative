<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;

class OrdinanceList extends Component
{
     
    protected $listener = ['ordinanceAdded'=>'render'];
    public $ordinanceS = '';


    public function render()
    {
        $ordinanceS = '%' . $this->ordinanceS . '%'; //%%
        $ordinances = Ordinance::where('title','like', $ordinanceS)->orWhere('ordinance_number','like',$ordinanceS)->get();
        return view('livewire.ordinance-list', ['ordinances' => $ordinances]);
    }
}
