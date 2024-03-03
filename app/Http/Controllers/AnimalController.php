<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;


class AnimalController extends Controller


{
    //Método para devolver todos los animales que hayan en la base de datos
    public function mostrarAnimales()
{
    $datos = Animal::with('adoptadores')->get();
    return view('dashboard', ['datosAnimales' => $datos]);
}

}
