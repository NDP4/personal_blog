<?php

namespace App\Livewire;

use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class ArtikelPage extends Component
{
    /**
     * The component's mount method.
     */
    public $artikel;
    public function mount()
    {
        $this->artikel = Artikel::with('kategori')->orderBy('created_at', 'desc')->get()->map(function ($item) {
            // Pastikan konten yang kita tampilkan adalah string, bukan array
            if (is_array($item->konten)) {
                $item->konten = json_encode($item->konten);
            }

            // Format tanggal publish jika status published
            $item->tanggal_publish = $item->updated_at ?
                Carbon::parse($item->updated_at)->locale('id')->translatedFormat('l, d F Y H:i') :
                '-';

            return $item;
        });
    }

    /**
     * The component's render method.
     */

    public function render()
    {
        return view('livewire.artikel-page');
    }
}
