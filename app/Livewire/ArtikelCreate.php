<?php

namespace App\Livewire;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArtikelCreate extends Component
{
    /**
     * The properties for the component.
     */
    use WithFileUploads;

    public $kategori, $judul, $konten, $kategori_id, $gambar_artikel, $status;

    public function mount()
    {
        // Initialize any properties or perform actions when the component is mounted
        $this->kategori = Kategori::all();
    }
    public function render()
    {
        return view('livewire.artikel-create');
    }

    public function rules()
    {
        return [
            'judul' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar_artikel' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional image validation
            'status' => 'required|in:draft,published', // Assuming status can be draft or published
        ];
    }
    public function messages()
    {
        return [
            'judul.required' => 'Judul artikel harus diisi.',
            'konten.required' => 'Konten artikel harus diisi.',
            'kategori_id.required' => 'Kategori artikel harus dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'gambar_artikel.image' => 'File yang diunggah harus berupa gambar.',
            'gambar_artikel.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg.',
            'gambar_artikel.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'status.required' => 'Status artikel harus dipilih.',
            'status.in' => 'Status artikel harus berupa draft atau published.',
        ];
    }
    /**
     * Handle the form submission.
     */
    public function handleSubmit()
    {
        // Handle the form submission logic here
        // Validate the input data, save the article, etc.
        // $this->validate([
        //     'judul' => 'required|string|max:255',
        //     'slug' => 'required|string|max:255|unique:artikels,slug',
        //     'konten' => 'required|string',
        //     'kategori_id' => 'required|exists:kategoris,id',
        //     'gambar_artikel' => 'nullable|image|max:2048', // Optional image validation
        //     'status' => 'required|in:draft,published', // Assuming status can be draft or published
        // ]);

        // // Save the article logic here...

        // session()->flash('message', 'Artikel berhasil dibuat!');
        // return redirect()->route('artikel');
        $this->validate();
        $file = $this->gambar_artikel;
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('artikel', $file, $fileName);

        // Save the article logic here...
        Artikel::create([
            'judul' => $this->judul,
            'slug' => Str::slug($this->judul),
            'konten' => $this->konten,
            'kategori_id' => $this->kategori_id,
            'gambar_artikel' => $fileName,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Artikel berhasil dibuat!');
        return redirect()->route('artikel');
    }
}
