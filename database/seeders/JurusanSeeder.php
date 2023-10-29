<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusans')->insert([
            [
                'jurusan' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'jurusan' => 'Desain Komunikasi Visual'
            ],
            [
                'jurusan' => 'Akutansi'
            ],
            [
                'jurusan' => 'Bisnis Retail'
            ],
            [
                'jurusan' => 'Manajemen Perkantoran'
            ]
        ]);
    }
}
