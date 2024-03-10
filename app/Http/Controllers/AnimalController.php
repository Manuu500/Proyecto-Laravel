<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnimalRegisterRequest;
use App\Models\Animal;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Models\Raza;
use Illuminate\Support\Facades\Storage;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */


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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $razas = Raza::all();


        return view('livewire.create-animal', compact('razas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRegisterRequest $request)
    {

        try {
            $animal = Animal::create([
                'id_usu' => null,
                'nombre' => $request->nombre,
                'foto' => $request->foto,
                'adoptado' => 0,
            ]);

            if ($request->hasFile('foto')) {
                $nombreFoto = time() . "-" . $request->file('foto')->getClientOriginalName();
                $animal->foto = $nombreFoto;

                $request->file('foto')->storeAs('public/img_car', $nombreFoto);
            }

            $animal->save();

            if ($request->has('razas')) {
                $animal->razas()->sync($request->razas);
            }

            return redirect()->route('dashboard')->with("status", "Animal insertado correctamente");

        } catch (QueryException $e) {
            dd($e);
        }
    }

    public function animalAdoptado(Request $request){
        $animalId = $request->input('animal_id');
        try{
            $animal = Animal::findOrFail($animalId);
            $animal->update([
                'adoptado' => 1,
                'id_usu' => auth()->user()->id,
            ]);
            return redirect()->route('dashboard')->with("status", "¡Felicidades! Has adoptado un nuevo amigo :)");
        }catch(QueryException $e){
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
    public function edit(string $id)
    {
        //dd($id);
        $animal = Animal::findOrFail($id);
        return view('editanimal')->with('animal', $animal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalRegisterRequest $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'adoptado' => 'required|boolean',
        ]);

        try {
            $animal = Animal::findOrFail($id);

            if($request->adoptado == "0"){
                $animal->id_usu = null;
            }

            if ($request->hasFile('foto')) {
                if ($animal->foto) {
                    Storage::delete($animal->foto);
                }

                $nombreFoto = time() . $request->file('foto')->getClientOriginalName();

                $rutaAlmacenada = $request->file('foto')->storeAs('public/img_car', $nombreFoto);

                $animal->foto = $nombreFoto;
            }

            $animal->update($request->except('foto'));

            return redirect()->route('dashboard')->with("status", "Animal editado correctamente");
        } catch (QueryException $e) {
            dd($e);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $animal = Animal::find($id);
            $animal->delete();
            return redirect()->route('dashboard')->with("status", "Animal borrado correctamente");
        }catch(QueryException $e){
            dd($e);
        }
    }
}

