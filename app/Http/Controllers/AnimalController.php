<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

use App\Models\Animal;


class AnimalController extends Controller
{
    public function listarAnimales()
    {
        try {
            $animales = Animal::with('razas')->paginate(3);
            return view('dashboard', compact('animales'));
        } catch (QueryException $e) {
            Log::error('Error SQL: ' . $e->getMessage());
            return redirect()->route('error')->with('error_message', 'No se pudo encontrar a los animales');
        }
    }

}
