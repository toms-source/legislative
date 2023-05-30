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
    
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->ordinances = Ordinance::where('title', 'like', $searchTerm)
            ->orWhere('ordinance_number', 'like', $searchTerm)
            ->get();
    }
    
    
    public function render()
    {
        return view('livewire.ordinance-list', ['ordinances' => $this->ordinances]);
    }
    
    
    
}
