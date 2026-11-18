<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama",
        "email",
        "password",
        "nomorHp",
        "role"
    ];

    public function views(){
        return $this->hasMany(ViewWeb::class, 'idUser');
    }
}
