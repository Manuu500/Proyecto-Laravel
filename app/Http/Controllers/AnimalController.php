<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;


class AnimalController extends Controller
{
    public function listarAnimales()
    {
        $animales = Animal::with('razas')->paginate(3);

        return view('dashboard', ['animales' => $animales]);
    }

}
