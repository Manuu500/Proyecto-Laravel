<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    protected $table = 'raza';
    use HasFactory;

    public function animales()
    {
        return $this->belongsToMany(Animal::class, 'tiene', 'id_raza', 'id_animal');
    }
}
