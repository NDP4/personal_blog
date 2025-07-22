<?php

namespace App\Livewire;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArtikelEdit extends Component
{
    use WithFileUploads;
    public $kategori, $artikel, $judul, $konten, $kategori_id, $gambar_artikel, $status, $is_trending;
    public $oldImage;

    public function mount($slug)
    {
        $this->artikel = Artikel::where('slug', $slug)->first();
        $this->kategori = Kategori::all();
        $this->judul = $this->artikel->judul;
        $this->konten = $this->artikel->konten;
        $this->kategori_id = $this->artikel->kategori_id;
        // Tidak set $this->gambar_artikel karena itu akan diisi oleh input file
        $this->status = $this->artikel->status;
        $this->is_trending = $this->artikel->is_trending;
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

    public function handleSubmit()
    {
        $this->validate();

        // Debug informasi
        logger("Upload gambar: " . ($this->gambar_artikel ? "Ada file" : "Tidak ada file"));

        // Ambil data artikel yang akan diedit
        $artikel = Artikel::find($this->artikel->id);

        // Default gunakan gambar yang lama
        $fileName = $artikel->gambar_artikel;

        // Cek apakah ada upload file baru
        if ($this->gambar_artikel) {
            // Hapus file lama jika ada
            if ($fileName && Storage::disk('public')->exists('artikel/' . $fileName)) {
                Storage::disk('public')->delete('artikel/' . $fileName);
            }

            // Simpan file baru dengan nama unik
            $fileName = 'artikel_' . time() . '_' . Str::random(10) . '.' . $this->gambar_artikel->getClientOriginalExtension();

            // Upload file baru
            $this->gambar_artikel->storeAs('artikel', $fileName, 'public');
        }

        // Update data artikel
        $artikel->judul = $this->judul;
        $artikel->slug = Str::slug($this->judul);
        $artikel->konten = $this->konten;
        $artikel->kategori_id = $this->kategori_id;
        $artikel->gambar_artikel = $fileName;
        $artikel->status = $this->status;
        $artikel->is_trending = $this->is_trending;

        // Jika status berubah menjadi published, update tanggal publish
        if ($artikel->status == 'published' && $this->artikel->status != 'published') {
            $artikel->tanggal_publish = now();
        }

        $artikel->save();

        session()->flash('success', 'Artikel berhasil diperbarui!');
        return redirect()->route('artikel');
    }

    public function updatedGambarArtikel()
    {
        // Method ini akan dipanggil saat file gambar diupload
        logger('File gambar baru diupload: ' . $this->gambar_artikel->getClientOriginalName());
    }

    public function render()
    {
        return view('livewire.artikel-edit');
    }
}
