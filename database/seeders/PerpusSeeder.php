<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Database\Seeder;

class PerpusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create([
            'name' => 'PT. Diggie',
            'slug' => 'pt-diggie',
        ]);

        Writer::create([
            'name' => 'Muhamad Ilham Saputra',
            'slug' => 'muhamad-ilham-saputra',
        ]);

        Book::create([
            'title' => 'Buku ku',
            'publisher_id' => 1,
            'writer_id' => 1,
            'thumbnail' => null,
            'slug' => 'buku-ku',
        ]);
    }
}
