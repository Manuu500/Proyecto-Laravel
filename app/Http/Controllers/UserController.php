<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistration;

class UserController extends Controller
{
    public function register(UserRegistration $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }
}
