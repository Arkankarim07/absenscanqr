<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gurus')->insert([
            [
                'guru' => 'Henny Susilowati'
            ],
            [
                'guru' => 'Abdul Wahid'
            ],
            [
                'guru' => 'Farah Yuniar Sanger'
            ],
            [
                'guru' => 'Nugro N Agung Pribadi'
            ],
            [
                'guru' => 'Ade Putra Primadani'
            ],
        ]);
    }
}
