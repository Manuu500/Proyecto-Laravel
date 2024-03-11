<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContrasenaRequest;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\UserRegistration;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Models\Animal;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function register(UserRegistration $request)
    {
         $request->validate([
             'nombre' => 'required|string|max:255',
             'apellidos' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'telefono' => 'required|string|max:255',
             'password' => 'required|string|min:8|confirmed',
         ]);
     }


    public function store(UserRegistration $request){

    }

    public function redirectProfile(){
        $user = Auth::user();
        return view('perfil', ['user' => $user]);
    }

    public function listarUsuarios()
    {
        try {
            $usuarios = User::paginate(3);
            return view('admin.dashboard-admin', compact('usuarios'));
        } catch (QueryException $e) {
            Log::error('Error SQL: ' . $e->getMessage());
            return redirect()->route('error')->with('error_message', 'No se pudo encontrar a los animales');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(string $id)
     {
         try {
             $usuario = User::findOrFail($id);
             $usuario->animales()->update(['id_usu' => null]);
             Animal::where('id_usu', $id)->where('adoptado', true)->update(['adoptado' => false]);
             $usuario->delete();
             DB::commit();

             // Fetch the updated list of animals
             $animales = Animal::paginate(3);

            $usuarios = User::paginate(3); // Adjust the pagination value as needed
            return redirect()->route('dashboard-admin')->with("status", "Usuario borrado correctamente");

         } catch (QueryException $e) {
             return response()->json(['success' => false, 'error' => $e->getMessage()]);
         }
     }

    public function edit(string $id)
    {
        //dd($id);
        $usuario = User::findOrFail($id);
        return view('editausuario')->with('usuario', $usuario);
    }

    public function create()
    {
        $usuarios = User::paginate(3);
        return view('admin.dashboard-admin', ['usuarios' => $usuarios]);
    }
    public function update(UserEditRequest $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|string',
            'telefono' => 'required|string|max:9',

        ]);

        try {
            //dd($request->all());
            $usuario = User::findOrFail($id);
            $usuario->update($request->all());

            return redirect()->route('dashboard-admin')->with("status", "Usuario actualizado con éxito");
        } catch (QueryException $e) {
            dd($e);
        }
    }

    public function updateProfile(ProfileEditRequest $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|string',
            'telefono' => 'required|string|max:9',

        ]);

        try {
            //dd($request->all());
            $usuario = User::findOrFail($id);
            $usuario->update($request->except('password'));

            return redirect()->route('dashboard')->with("status", "Usuario actualizado con éxito");
        } catch (QueryException $e) {
            dd($e);
        }
    }

    public function updateContrasena(ContrasenaRequest $request, string $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',

        ]);

        try {
            //dd($request->all());
            $usuario = User::findOrFail($id);
            $usuario->update($request->all());

            return redirect()->route('dashboard')->with("status", "Contraseña actualizada con éxito");
        } catch (QueryException $e) {
            dd($e);
        }
    }

     public function show(User $user)
     {

     }

}
