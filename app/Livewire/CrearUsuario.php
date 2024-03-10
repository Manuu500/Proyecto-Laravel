<?php

namespace App\Livewire;

use Livewire\Component;

class CrearUsuario extends Component
{
    public $mostrar;
    public function render()
    {
        return view('livewire.create-usuario');
    }

    public function mostrarForm(){
        $this->mostrar = !$this->mostrar;
    }
}
