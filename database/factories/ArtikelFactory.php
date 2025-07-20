<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // data dummy untuk artikel
            'judul' => $this->faker->sentence(mt_rand(3, 8)),
            'kategori_id' => mt_rand(1, 5),
            'konten' => implode("\n\n", $this->faker->paragraphs(150)),
            'gambar_artikel' => $this->faker->imageUrl(640, 480, 'animals', true),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->randomElement(['draft', 'published']),
        ];
    }
}
