<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = [
        "namaNomorKamar",
        "luasKamar",
        "hargaBulanan",
        "idFasilitas",
        "status"
    ];

    public function fasilitas(){
        return $this -> hasMany(Fasilitas::class, 'idFasilitas');
    }

    public function fotoKost(){
        return $this->hasMany(FotoKost::class, 'idKamar');
    }
}
