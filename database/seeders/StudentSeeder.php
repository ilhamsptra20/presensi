<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'nis' => "11907312",
            'name' => "ilham",
            'username' => "ilhaaam",
            'rombel_id' => 1,
            'rayon_id' => 1,
            'email' => 'ilham@email.com',
            'password' => bcrypt('123456789'),
        ]);

        User::create([
            'name'=> 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
