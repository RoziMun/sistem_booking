<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewWeb extends Model
{
    protected $fillable = [
        "idKost",
        "idUser",
        "visited_at"
    ];

    public function users(){
        return $this->belongsTo(Users::class, 'idUser');
    }

    public function kost(){
        return $this->belongsTo(Kost::class, 'idKost');
    }
}
