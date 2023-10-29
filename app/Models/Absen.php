<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'absen';

    // fungsi untuk menyambungkan relasi foreign id
    public function mapels()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function gurus()
    {
        return $this->belongsTo(Guru::class);
    }

    public function jurusans()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
