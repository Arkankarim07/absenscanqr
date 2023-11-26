<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arkan',
            'nis' => '123456',
            'kelas_id' => 1,
            'jurusan_id' => 1,
            'password' => 'password'
        ]);

        User::create([
            'name' => 'Putra',
            'nis' => '212121',
            'kelas_id' => 1,
            'jurusan_id' => 1,
            'password' => 'password'
        ]);

        User::create([
            'name' => 'Pak Arkan',
            'kelas_id' => 1,
            'jurusan_id' => 1,
            'password' => 'password',
            'role' => 'guru'
        ]);

        $this->call([
            MapelSeeder::class,
            GuruSeeder::class,
            JurusanSeeder::class,
            KelasSeeder::class,
        ]);
    }
}
