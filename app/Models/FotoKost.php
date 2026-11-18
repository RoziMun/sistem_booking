<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoKost extends Model
{
    use HasFactory;
    protected $fillable = [
        "idKamar",
        "foto",
        "keterangan"
    ];

    public function kamar(){
        return $this->hasMany(Kamar::class, 'idKamar');
    }
}
