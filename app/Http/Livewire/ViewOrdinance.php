<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;
class ViewOrdinance extends Component
{
    public $ordinance;

    public function mount(Ordinance $ordinance)
    {
        $this->ordinance = $ordinance;
    }
    

    public function render()
    {
        return view('livewire.view-ordinance');
    }
}
