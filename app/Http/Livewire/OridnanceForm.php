<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Ordinance;


class OridnanceForm extends Component
{
    use WithFileUploads;
    public $ordinance_number;
    public $title;
    public $tracking_level;
    public $date;
    public $last_action;
    public $author;
    public $keywords;
    public $file;
    public $last_action_date;

    public function save(){
        $this->validate([
            'ordinance_number' => 'required|unique:ordinances,ordinance_number',
            'title' => 'required',
            'tracking_level' => 'required|in:priority,of_interest,graveyard,passed',
            'date' => 'required|date',
            'last_action' => 'required',
            'file' => 'file|max:10024', // 1MB Max
            'author' => 'required',
            'keywords' => 'nullable',
        ]);

        if($this->file){
            $filePath = $this->file->store('files', 'public');
        } else {
            $filePath = null;
        }
        

        $last_action_date = now();
        
        Ordinance::create([
            'ordinance_number' => $this->ordinance_number,
            'title' => $this->title,
            'tracking_level' => $this->tracking_level,
            'date' => $this->date,
            'last_action' => $this->last_action,
            'last_action_date' => $last_action_date,
            'file_path' => $filePath,
            'author' => $this->author,
            'keywords' => $this->keywords,
        ]);

        $this->reset(['ordinance_number', 'title', 'tracking_level', 'date', 'last_action', 'last_action_date', 'file', 'author', 'keywords']);

        $this->emit('ordinanceAdded');
    }

    public function render()
    {
        return view('livewire.oridnance-form');
    }
}
