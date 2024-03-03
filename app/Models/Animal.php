<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';
    use HasFactory;

    public function adoptadores()
    {
        return $this->belongsToMany(User::class, 'adoptar', 'id_animal', 'id_usuario')
            ->withPivot('fecha_adopcion');
    }


}
