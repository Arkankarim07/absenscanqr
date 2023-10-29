<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kelas';

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
