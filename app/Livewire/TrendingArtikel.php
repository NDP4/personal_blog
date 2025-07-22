<?php

namespace App\Livewire;

use App\Models\Artikel;
use Illuminate\Support\Carbon;
use Livewire\Component;

class TrendingArtikel extends Component
{
    public $artikel;
    public function mount()
    {
        // Initialize any properties or perform actions when the component is mounted
        $this->artikel = Artikel::where('status','published')->where('is_trending', true)->limit(5)->get()->map(function ($item) {
            $item->tanggal_publish = Carbon::parse($item->updated_at)->locale('id')->translatedFormat('l, d F Y');
            return $item;
        });
    }
    public function render()
    {
        return view('livewire.trending-artikel')->layout('layouts.blog');
    }
}
