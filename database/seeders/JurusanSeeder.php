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
                'nama_jurusan' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama_jurusan' => 'Desain Komunikasi Visual'
            ],
            [
                'nama_jurusan' => 'Akutansi'
            ],
            [
                'nama_jurusan' => 'Bisnis Retail'
            ],
            [
                'nama_jurusan' => 'Manajemen Perkantoran'
            ]
        ]);
    }
}
