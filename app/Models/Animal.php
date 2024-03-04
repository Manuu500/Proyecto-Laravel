<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Raza;

class Animal extends Model
{
    protected $table = 'animal';
    use HasFactory;


    public function razas()
    {
        return $this->belongsToMany(Raza::class, 'tiene', 'id_animal', 'id_raza');
    }

}
