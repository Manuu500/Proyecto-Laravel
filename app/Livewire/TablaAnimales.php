<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Animal;
use Livewire\WithPagination;



class TablaAnimales extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.tabla-animales', [
            'animales' => Animal::paginate(3),
        ]);
    }

}
