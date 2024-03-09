<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Raza;
use App\Models\Animal;


class CreateAnimal extends Component
{
    public $mostrar = false;
    public $razas;
    public $selectedRazas;


    public function render()
    {
        return view('livewire.create-animal');
    }

    public function mount()
    {
        $this->razas = Raza::all();
        $this->selectedRazas = [];

    }

    public function mostrarForm(){
        $this->mostrar = !$this->mostrar;
    }
}
