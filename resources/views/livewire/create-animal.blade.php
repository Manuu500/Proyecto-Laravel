
<div>
    @if ($mostrar == false)
    <button type="button" wire:click='mostrarForm()'
        class="text-white mt-3 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Añadir
        animal</button>
    @else
    <button type="button" wire:click='mostrarForm()'
        class="text-white mt-3 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Ocultar
        formulario</button>
    @endif

    <hr>
    @if ($mostrar == true)
    <div class="card-body d-flex flex-column align-items-center justify-content-center">
        <form method="POST" action="{{ route('animales.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- <input type="hidden" name="id_animal" value="{{ $animal->id }}"> --}}

            <h3 for="nombre">Nombre del Animal:</h3>
            <input type="text" name="nombre" required>

            <h3 class="mt-4" for="razas">Razas:</h3>

            @foreach ($razas as $raza)
            <div>
                <input type="checkbox" wire:model="selectedRazas.{{ $raza->id }}" value="{{ $raza->id }}" name="razas[]">
                <label>{{ $raza->nombre }}</label>
            </div>
            @endforeach

            <h3 class="mt-4">Foto del animal</h3>
            <input type="file" name="foto" accept="image/*" required>

            <button type="submit">Crear Animal</button>
        </form>
    </div>
    </div>
    @endif
</div>

