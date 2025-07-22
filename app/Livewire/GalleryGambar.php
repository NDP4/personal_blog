<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class GalleryGambar extends Component
{
    public $artikel, $gambar;
    public function mount()
    {
        // ambil gambar dari artikel yang memiliki gambar_artikel hanya 6 gambar dari artikel secara random
        $this->gambar = Artikel::whereNotNull('gambar_artikel')->inRandomOrder()->limit(6)->get();
    }
    public function render()
    {
        return view('livewire.gallery-gambar')->layout('layouts.blog');
    }
}
