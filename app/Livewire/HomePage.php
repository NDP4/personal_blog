<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Artikel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class HomePage extends Component
{
    public $artikel;
    
    public function mount()
    {
        // Get the latest published article
        $article = Artikel::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->first();
            
        if ($article) {
            // Format the data directly on the model instance
            $article->tanggal_publish = Carbon::parse($article->updated_at)->locale('id')->translatedFormat('l, d F Y');
            $article->judul = Str::limit($article->judul, 50, '...');
        }
        
        $this->artikel = $article;
    }
    
    public function render()
    {
        return view('livewire.home-page')->layout('layouts.blog');
    }
}