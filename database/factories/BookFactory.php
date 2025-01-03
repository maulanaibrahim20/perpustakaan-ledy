<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Judul buku acak
            'author' => $this->faker->name, // Nama penulis acak
            'publisher' => $this->faker->company, // Penerbit acak
            'published_date' => $this->faker->date(), // Tanggal terbit acak
            'isbn' => $this->faker->isbn13, // ISBN acak
            'price' => $this->faker->randomFloat(2, 10000, 500000), // Harga antara 10 ribu hingga 500 ribu
            'stock' => $this->faker->numberBetween(1, 100), // Stok antara 1-100
            'description' => $this->faker->paragraph(3), // Deskripsi acak
            'cover_image' => 'images/default_cover.jpg', // Atur default untuk testing
            'status' => $this->faker->randomElement(['active', 'non-active']), // Status acak
            'category_id' => null, // Isi dengan null atau sesuaikan dengan ID kategori
        ];
    }
}
