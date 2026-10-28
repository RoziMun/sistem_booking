<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kost extends Model
{
    use HasFactory;
    protected $fillable = [
        "namaKost",
        "deskripsi",
        "alamat",
        "kote",
        "provinsi",
        "jenisKost",
        "status"
    ];
}
