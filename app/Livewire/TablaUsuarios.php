<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class TablaUsuarios extends Component
{
    public function render()
    {
        return view('livewire.tabla-usuarios', [
            'usuarios' => User::paginate(3),
        ]);
    }
}
