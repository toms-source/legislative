<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;


class Userview extends Component
{
    public $ordinance;
    public $searchTerm = '';
    public $ordinances;

    protected $listeners = ['searchTermUpdated' => 'search', 'ordinanceAdded' => 'refreshList', 'searchDate' => 'searchDateBetween'];

    //pass id to another components
    public function editOrdinance($ordinanceId)
    {
        $this->emit('editOrdinance', $ordinanceId);
    }

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
            ->orWhere('tracking_level', 'like', $searchTerm)
            ->orWhere('keywords', 'like', $searchTerm)
            ->orWhere('author', 'like', $searchTerm)
            ->get();
    }

    public function searchDateBetween($searchDate)
    {
        $searchDF = $searchDate[0];
        $searchDT = $searchDate[1];

        $this->ordinances = Ordinance::whereBetween('date', [$searchDF, $searchDT])
            ->get();

    }
    public function render()
    {
        return view('livewire.userview');
    }
}
