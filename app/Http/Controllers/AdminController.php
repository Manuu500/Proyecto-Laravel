<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserRegistration;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function dashboard()
{
        try {
            $usuarios = User::paginate(3);
            return view('admin.dashboard-admin', compact('usuarios'));
        } catch (QueryException $e) {
            dd($e);
        }

}

public function redirigirCrearUsuario()
{
    return view('admin.dashboard-admin');
}

 public function redirectDashboard(Request $request)
{
    return  view('admin.dashboard-admin');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //     try {
    //         $usuarios = User::paginate(3);
    //         return view('admin.dashboard-admin', ['usuarios' => $usuarios]);
    //     } catch (QueryException $e) {
    //         dd($e);
    //     }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegistration $request)
    {
    try {
        $usuario = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'tipo' => $request->tipo,
            'password' => $request->password,
        ]);

        $usuario->save();
        //$usuarios = User::paginate(3);
        return redirect()->route('dashboard-admin')->with("status", "Usuario insertado correctamente");


    } catch (QueryException $e) {
        dd($e);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserEditRequest $request, string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequest $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
