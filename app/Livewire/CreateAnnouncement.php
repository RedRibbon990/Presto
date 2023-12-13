<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    public function store()
    {
        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        $this->cleanForm();
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}