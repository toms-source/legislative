<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;

class OrdinanceList extends Component
{

    public $searchTerm = '';


    protected $listeners = ['searchTermUpdated' => 'search'];

    public function search($searchTerm)
    {
        $this->searchTerm = $searchTerm;

        // Perform your search here and update the list of ordinances
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $ordinances = Ordinance::where('title', 'like', $searchTerm)
            ->orWhere('ordinance_number', 'like', $searchTerm)
            ->get();

        return view('livewire.ordinance-list', ['ordinances' => $ordinances]);
    }
}
