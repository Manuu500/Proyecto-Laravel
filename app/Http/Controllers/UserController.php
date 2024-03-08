<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistration;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;



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

    public function listarUsuarios()
    {
        $usuarios = User::paginate(3);

        return view('/admin/dashboard', ['usuarios' => $usuarios]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Tu lógica para eliminar el usuario
        $user->delete();

        return redirect()->route('/admin/dashboard')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function show(User $user)
    {
        try{
            return view('/admin/dashboard ', compact('user'));
        }catch(QueryException $e){
            Log::error('Error SQL: ' . $e->getMessage());
            return redirect()->route('error')->with('error_message', 'No se pudo encontrar a los usuarios');
        }
    }

}
