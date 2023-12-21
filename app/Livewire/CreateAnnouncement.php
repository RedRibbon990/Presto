<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $announcement;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'image|mimes:avif,avi,jpeg|max:2024',
        'temporary_images.*' => 'image|mimes:avif,avi,jpeg|max:2024',
    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto.',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute deve essere un numero',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 2mb',
        'images.image' => 'L\'immagine dev\'essere un\'immagine',
        'images.max' => 'L\'immagine dev\'essere massimo di 2mb',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:2024',
            ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
{
    try {
        // Validazione dei dati
        $validatedData = $this->validate();

        // Creazione dell'annuncio
        $this->announcement = Category::find($validatedData['category'])
            ->announcements()
            ->create($validatedData);

        // Caricamento e ridimensionamento delle immagini
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                // Ridimensionamento dell'immagine
                dispatch(new ResizeImage($newImage->path, 400, 300));
            }

            // Eliminazione della directory temporanea di Livewire
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        // Associazione dell'annuncio all'utente autenticato
        Auth::user()->announcements()->save($this->announcement);

        // Messaggio di successo e pulizia del form
        session()->flash('message', 'Annuncio inserito con successo, sarà pubblicato dopo la revisione');
        $this->cleanForm();

    } catch (\Exception $e) {
        // Gestione delle eccezioni
        session()->flash('error', 'Si è verificato un errore durante l\'inserimento dell\'annuncio.');
    }
}
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
