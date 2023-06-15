<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordinance;
use Livewire\WithPagination;
class OrdinanceList extends Component
{

    public $searchTerm = '';
    public $idDelete = '';
    // public $ordinances;

    public $sortField;
    public $sortDirection='asc';
    public $searchDF;
    public $searchDT;

    protected $listeners = ['searchTermUpdated' => 'search', 'ordinanceAdded' => 'refreshList', 'searchDate' => 'searchDateBetween'];
    use WithPagination;
    
    //pass id to another components
    public function editOrdinance($ordinanceId)
    {
        $this->emit('editOrdinance', $ordinanceId);
    }
    

    // public function mount()
    // {
    //     $this->ordinances = Ordinance::all();
    // }

    public function refreshList()
    {
        // We don't need to fetch all the ordinances here anymore
        $this->searchTerm = '';
        $this->idDelete = '';
        $this->sortField = null;
        $this->sortDirection = 'asc';
        $this->searchDF = null;
        $this->searchDT = null;
    
        $this->resetPage();
    }


    // public function search($searchTerm)
    // {
    //     $this->searchTerm = $searchTerm;
    
    //     $searchTerm = '%' . $this->searchTerm . '%';
    //     $this->ordinances = Ordinance::where('title', 'like', $searchTerm)
    //         ->orWhere('ordinance_number', 'like', $searchTerm)
    //         ->orWhere('tracking_level', 'like', $searchTerm)
    //         ->orWhere('keywords', 'like', $searchTerm)
    //         ->orWhere('author', 'like', $searchTerm)
    //         ->get();
    // }
    public function search($searchTerm){
        $this->searchTerm = $searchTerm;

        $searchTerm = '%' . $this->searchTerm . '%';
        $this->resetPage(); // Reset the pagination
    }
    
    // public function searchDateBetween($searchDate){
    //     $searchDF = $searchDate[0];
    //     $searchDT = $searchDate[1];
        
    //     $this->ordinances = Ordinance::whereBetween('date', [$searchDF, $searchDT])
    //     ->get();
       
    //     // $searchDF1 = Carbon::parse($this->$searchDF);
    //     // $searchDT1 = Carbon::parse($this->$searchDT);
       
        
    // }
    public function searchDateBetween($searchDate)
    {
        $this->searchDF = $searchDate[0];
        $this->searchDT = $searchDate[1];
        
        $this->render(); // Reset the pagination
    }


    public function deleteForm($id){
        $this->emit('ordinanceDelete', $id);
        $this->idDelete = $id;
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


    public function deleteOrdinance(){
        $query = Ordinance::query();
       
        $id = '%' . $this->idDelete . '%';
        $query  = Ordinance::where('id', 'like', $id)->delete();
        $query  = Ordinance::with('files')->where('id', 'like', $id)->delete();
        
        $this->render();

    }

    public function render()
    {
        $query = Ordinance::query();

        // Add searching functionality
        
        if (!empty($this->searchTerm)) {
            if (!empty($this->searchDF)) {
                $searchTerm = '%' . $this->searchTerm . '%';
                $query = $query->whereBetween('date', [$this->searchDF, $this->searchDT])
                        ->where(function ($query) use ($searchTerm) {
                            $query->where('title', 'like', $searchTerm)
                            ->orWhere('ordinance_number', 'like', $searchTerm)
                            ->orWhere('tracking_level', 'like', $searchTerm)
                            ->orWhere('keywords', 'like', $searchTerm)
                            ->orWhere('author', 'like', $searchTerm);
                });
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
                $query = $query->whereBetween('date', [$this->searchDF, $this->searchDT])
                        ->where(function ($query) use ($searchTerm) {
                            $query->where('title', 'like', $searchTerm)
                            ->orWhere('ordinance_number', 'like', $searchTerm)
                            ->orWhere('tracking_level', 'like', $searchTerm)
                            ->orWhere('keywords', 'like', $searchTerm)
                            ->orWhere('author', 'like', $searchTerm);
                });
            }else{
                $query = $query->whereBetween('date',[$this->searchDF,$this->searchDT]);
            }
        }

        // Add sorting functionality
        if (!empty($this->sortField)) {
            $query = $query->orderBy($this->sortField, $this->sortDirection);
        }

        

        return view('livewire.ordinance-list', [
            'ordinances' => $query->paginate(5),
        ]);

        // return view('livewire.ordinance-list', ['ordinances' => $this->ordinances]);
    }
    // HEllo this is a new comment
    // Testing Comming

}
