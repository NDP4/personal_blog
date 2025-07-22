<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;
use Illuminate\Support\Str;

class ListArtikel extends Component
{
    public $artikel;

    public function mount()
    {
        // query menampilkan artikel hanya 6 buah dengan status published
        $this->artikel = Artikel::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get()->map(function($item){
                $item->tanggal_publish = $item->updated_at ?
                    $item->updated_at->locale('id')->translatedFormat('l, d F Y H:i') :
                    '-';
                $item->konten = Str::limit($item->konten, 150, '...');
                return $item;
            });
    }

    public function render()
    {
        return view('livewire.list-artikel');
    }
}
