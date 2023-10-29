<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapels')->insert([
            [
                'mapel' => 'Bahasa Indonesia'
            ],
            [
                'mapel' => 'Pjok'
            ],
            [
                'mapel' => 'Matematika'
            ],
            [
                'mapel' => 'Basis Data'
            ],
            [
                'mapel' => 'Pendidikan Agama & Budi Pekerti'
            ]
        ]);
    }
}
