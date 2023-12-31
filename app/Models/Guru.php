<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'gurus';

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
