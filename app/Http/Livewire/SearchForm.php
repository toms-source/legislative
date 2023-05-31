<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchForm extends Component
{
    public $searchTerm = '';
    
    public $dateTo='';
    public $dateFrom='';

    public function updatedSearchTerm()
    {
        $this->emit('searchTermUpdated', $this->searchTerm);
        
    }

    public function searchDates(){
        $this->emit('searchDate', [$this->dateFrom, $this->dateTo]);
    }

    public function render()
    {

        return view('livewire.search-form');
    }
}
