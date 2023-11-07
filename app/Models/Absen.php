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
    public function siswa()
    {
        return $this->belongsTo(User::class, 'nis_id', 'nis');
    }

    public function mapels()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }

    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
