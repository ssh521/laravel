<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Livewire\Books;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();

        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'title' => fake()->sentence, 
                'price' => fake()->randomNumber(3), 
                'author' => fake()->name, 
                'editor' => fake()->company,
            ]);
        }
    }
}
