<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;
use Livewire\WithPagination;

class Userview extends Component
{
    public $searchTerm = '';
    public $sortField;
    public $sortDirection='asc';
    public $searchDF;
    public $searchDT;
    
    protected $listeners = ['searchTermUpdated' => 'search', 'ordinanceAdded' => 'refreshList', 'searchDate' => 'searchDateBetween'];
    use WithPagination;
    
    public function editOrdinance($ordinanceId)
    {
        $this->emit('editOrdinance', $ordinanceId);
    }

    public function refreshList()
    {
        // We don't need to fetch all the ordinances here anymore
    }

    public function search($searchTerm)
    {
        $this->searchTerm = $searchTerm;

        $searchTerm = '%' . $this->searchTerm . '%';
        $this->resetPage(); // Reset the pagination
    }

    public function searchDateBetween($searchDate)
    {
        $this->searchDF = $searchDate[0];
        $this->searchDT = $searchDate[1];
        
        $this->render(); // Reset the pagination
    }

    public function sortBy($field)
    {
        if ($field == $this->sortField) {
            $this->sortDirection =  $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->resetPage(); // Reset the pagination
    }

    public function render()
    {
        $query = Ordinance::query();

        // Add searching functionality
        
        if (!empty($this->searchTerm)) {
            if (!empty($this->searchDF)) {
                $searchTerm = '%' . $this->searchTerm . '%';
                $query = $query->whereBetween('date',[$this->searchDF,$this->searchDT])
                               ->orWhere('title', 'like', $searchTerm)
                               ->orWhere('ordinance_number', 'like', $searchTerm)
                               ->orWhere('tracking_level', 'like', $searchTerm)
                               ->orWhere('keywords', 'like', $searchTerm)
                               ->orWhere('author', 'like', $searchTerm);
            }else{
                $searchTerm = '%' . $this->searchTerm . '%';
                $query = $query->where('title', 'like', $searchTerm)
                           ->orWhere('ordinance_number', 'like', $searchTerm)
                           ->orWhere('tracking_level', 'like', $searchTerm)
                           ->orWhere('keywords', 'like', $searchTerm)
                           ->orWhere('author', 'like', $searchTerm);
            }
            
        }else if (!empty($this->searchDF)) {
            
            if (!empty($this->searchTerm)) {
                $searchTerm = '%' . $this->searchTerm . '%';
                $query = $query->whereBetween('date',[$this->searchDF,$this->searchDT])
                               ->orWhere('title', 'like', $searchTerm)
                               ->orWhere('ordinance_number', 'like', $searchTerm)
                               ->orWhere('tracking_level', 'like', $searchTerm)
                               ->orWhere('keywords', 'like', $searchTerm)
                               ->orWhere('author', 'like', $searchTerm);
            }else{
                $query = $query->whereBetween('date',[$this->searchDF,$this->searchDT]);
            }
        }

        // Add sorting functionality
        if (!empty($this->sortField)) {
            $query = $query->orderBy($this->sortField, $this->sortDirection);
        }

        

        return view('livewire.userview', [
            'ordinances' => $query->paginate(5),
        ]);
    }
}
