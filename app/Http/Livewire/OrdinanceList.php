<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;

class OrdinanceList extends Component
{

    public $searchTerm = '';
    public $ordinances;

    protected $listeners = ['searchTermUpdated' => 'search', 'ordinanceAdded' => 'refreshList'];

    public function mount()
    {
        $this->ordinances = Ordinance::all();
    }

    public function refreshList()
    {
        $this->ordinances = Ordinance::all();
    }

    public function search($searchTerm)
    {
        $this->searchTerm = $searchTerm;

        // Perform your search here and update the list of ordinances
    }

    public function render()
    {
        return view('livewire.ordinance-list', ['ordinances' => $this->ordinances]);
    }
}
