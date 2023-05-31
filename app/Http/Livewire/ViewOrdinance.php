<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;
class ViewOrdinance extends Component
{
    public $ordinance;
    public $ordinance_id;
    

    protected $listeners = ['viewOrdinance' => 'viewOrdinance'];

    public function viewOrdinance($ordinanceId)
    {
        $this->ordinance_id = $ordinanceId;
        $this->mount();
    }

    public function mount()
    {
        $this->ordinance = Ordinance::with('files')->find($this->ordinance_id);
    }

    public function render()
    {
        return view('livewire.view-ordinance');
    }
}
