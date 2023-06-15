<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Ordinance;
use App\Models\OrdinanceFile;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;


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
    public $imagesDataUrls = [];


    protected $listeners = [
        'qrCodeFound' => 'createOrdinanceFromQr',
        'imagesCaptured' => 'createPdfFromImages'
    ];
    public function uploadImage($imageData)
    {
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

        $path = 'temp/' . uniqid() . '.jpg';
        Storage::put($path, $imageData);

        $this->imagesDataUrls[] = $path;
    }

    public function createPdfFromImages()
    {
        // Create a new PDF
        $pdf = new \FPDF();

        foreach ($this->imagesDataUrls as $path) {
            $pdf->AddPage();
            $pdf->Image(Storage::path($path), 10, 10, 190);
            Storage::delete($path);
        }
        $this->ordinance_number = 'ORD-' . rand(1000, 9999) . '-' . now()->format('y');
        // Save the PDF to a file

        $directoryPath = 'public/files';

        // If the directory doesn't exist, create it
        if (!Storage::exists($directoryPath)) {
            Storage::makeDirectory($directoryPath);
        }

        $pdfFilePath = $directoryPath . '/' . $this->ordinance_number . '.pdf';
        $pdf->Output('F', storage_path('app/' . $pdfFilePath));

        // Create an Ordinance record in the database
        $ordinance = Ordinance::create([
            'ordinance_number' => $this->ordinance_number,
            'title' => $this->title,
            'tracking_level' => $this->tracking_level,
            'date' => $this->date,
            'author' => $this->author,
            'keywords' => $this->keywords,
        ]);

        // Create an associated File record for the Ordinance
        $ordinance->files()->create([
            'file_path' => $pdfFilePath,
            'version' => 1,  // initial version
            'last_action' => $this->last_action,
            'last_action_date' => now(),
        ]);

        // Reset all the public properties after form submission
        $addedOrdinanceNumber = $this->ordinance_number;
        $this->reset(['imagesDataUrls', 'title', 'author', 'tracking_level', 'last_action', 'date', 'keywords', 'ordinance_number']);
        $this->emit('ordinanceAdded', $addedOrdinanceNumber, $ordinance->id);
    }


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
