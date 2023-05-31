<?php

namespace App\Http\Livewire;

use App\Models\Ordinance;
use App\Models\OrdinanceFile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;


class OrdinanceEdit extends Component
{
    use WithFileUploads;

    public $ordinance_id;
    public $ordinance_number;
    public $title;
    public $tracking_level;
    public $date;
    public $last_action;
    public $author;
    public $keywords;
    public $file;
    public $last_action_date;
    public $version;
    public $file_id;

    protected $listeners = [
        'editOrdinance' => 'editOrdinance'
    ];

    public function editOrdinance($ordinanceId)
    {
        $this->ordinance_id = $ordinanceId;
        $this->mount();
    }
    // public function editversion($version)
    // {
    //     $this->version= $version;
    //     $this->mount();
    // }

    public function mount()
    {
        $data = Ordinance::find($this->ordinance_id);

        

        if ($data) {

            $file = $data->files()->latest('version')->first(); // find the file with the latest version for this ordinance

            $this->ordinance_number = $data->ordinance_number;
            $this->title = $data->title;
            $this->tracking_level = $data->tracking_level;
            $this->date = $data->date;
            $this->last_action = $data->last_action;
            $this->author = $data->author;
            $this->keywords = $data->keywords;
            $this->last_action_date = $data->last_action_date;

            if ($file) {
                $this->version = $file->version; // Get the file version from the file
            }
        }
    }

    public function save()
    {

        
        $this->validate([
            'ordinance_number' => 'required|unique:ordinances,ordinance_number,' . $this->ordinance_id,
            'title' => 'required',
            'tracking_level' => 'required|in:priority,of_interest,graveyard,passed',
            'date' => 'required|date',
            'last_action' => 'required',
            'author' => 'required',
            'keywords' => 'nullable',
        ]);

        $ordinance = Ordinance::find($this->ordinance_id);

        if (!$ordinance) {
            // Handle the case where the ordinance is not found
            return;
        }

        $ordinance->ordinance_number = $this->ordinance_number;
        $ordinance->title = $this->title;
        $ordinance->tracking_level = $this->tracking_level;
        $ordinance->date = $this->date;
        $ordinance->last_action = $this->last_action;
        $ordinance->last_action_date = now();
        $ordinance->author = $this->author;
        $ordinance->keywords = $this->keywords;

        if ($this->file) {
            $filePath = $this->file->store('files', 'public');


            $ordinance->files()->create([
                'file_path' => $filePath,
                'version' => $this->version,
            ]);
        }

        $ordinance->save();

        $this->reset(['ordinance_number', 'title', 'tracking_level', 'date', 'last_action', 'last_action_date', 'file', 'author', 'keywords']);

        $this->emit('ordinanceAdded');
    }



    public function render()
    {
        return view('livewire.ordinance-edit');
    }
}
