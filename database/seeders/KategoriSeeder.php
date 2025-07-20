<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = ['teknologi', 'coding', 'web development', 'mobile development', 'software engineering', 'cybersecurity', 'data science', 'cloud computing', 'artificial intelligence', 'machine learning'];

        foreach ($kategori as $item) {
            Kategori::create([
                'nama_kategori' => $item,
            ]);
        }
    }
}
