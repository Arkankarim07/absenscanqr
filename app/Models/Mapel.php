<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'mapels';

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
