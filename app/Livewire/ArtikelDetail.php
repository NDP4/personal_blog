<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class ArtikelDetail extends Component
{

    public $slug , $artikel;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->artikel = Artikel::where('slug', $this->slug)->first();
        $this->artikel->tanggal_publish = $this->artikel->updated_at->locale('id')->translatedFormat('l, d F Y H:i');
    }
    public function render()
    {
        return view('livewire.artikel-detail');
    }
}
