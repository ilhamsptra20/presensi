<?php

namespace Database\Seeders;

use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Database\Seeder;

class GroupStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rayon::create([
            'name' => 'tajur1',
            'slug' => 'tajur1',
            'mentor' => 'saya',
        ]);

        Rombel::create([
            'name' => 'RPL',
            'slug' => 'rpl',
        ]);
    }
}
