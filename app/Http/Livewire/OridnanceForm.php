<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Ordinance;
use App\Models\OrdinanceFile;


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
    public $addedOrdinanceNumber;


    protected $listeners = [
        'qrCodeFound' => 'createOrdinanceFromQr'
    ];
    public function generateOrdinanceNumber()
    {
        $this->ordinance_number = 'ORD-' . rand(1000, 9999) . '-' . now()->format('y');
    }

    public function createOrdinanceFromQr($data)
    {

        $qrData = json_decode($data);


        $this->ordinance_number = 'ORD-' . rand(1000, 9999) . '-' . now()->format('y');


        // Fill other fields
        $this->title = $qrData->title;
        $this->tracking_level = $qrData->tracking_level;
        $this->author = $qrData->author;
        $this->keywords = $qrData->keywords;
        $this->date = $qrData->date;



        $this->save();
    }
    public function save()
    {
        $this->validate([
            'ordinance_number' => 'required|unique:ordinances,ordinance_number',
            'title' => 'required',
            'tracking_level' => 'required|in:priority,of_interest,graveyard,passed',
            'author' => 'required',
            'keywords' => 'nullable',
        ]);

        if ($this->file) {
            $filePath = $this->file->store('files', 'public');
        } else {
            $filePath = null;
        }

        $last_action_date = now();

        $ordinance = Ordinance::create([
            'ordinance_number' => $this->ordinance_number,
            'title' => $this->title,
            'tracking_level' => $this->tracking_level,
            'date' => $this->date,
            'author' => $this->author,
            'keywords' => $this->keywords,
        ]);



        $ordinance->files()->create([
            'file_path' => $filePath,
            'version' => 1, // initial version
            'last_action' => $this->last_action,
            'last_action_date' => $last_action_date,
        ]);
        $addedOrdinanceNumber = $this->ordinance_number;
        $this->reset(['ordinance_number', 'title', 'tracking_level', 'date', 'last_action', 'last_action_date', 'file', 'author', 'keywords']);

        $this->emit('ordinanceAdded', $addedOrdinanceNumber, $ordinance->id);
    }


    public function render()
    {
        return view('livewire.oridnance-form');
    }
}
