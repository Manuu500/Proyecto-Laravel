<div>
    @if ($mostrar == false)
    <button type="button" wire:click='mostrarForm()'
        class="text-white mt-3 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Añadir
        usuario</button>
    @else
    <button type="button" wire:click='mostrarForm()'
        class="text-white mt-3 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Ocultar
        formulario</button>
    @endif

    <hr>
    @if ($mostrar == true)
    <div class="card-body d-flex flex-column align-items-center justify-content-center">
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            @method('POST')
            {{-- <input type="hidden" name="id_animal" value="{{ $animal->id }}"> --}}

            <h3 for="nombre">Nombre del usuario:</h3>
            <input type="text" name="nombre" required>

            <h3 class="mt-4" for="apellidos">Apellidos del usuario:</h3>
            <input type="text" name="apellidos" required>

            <h3 class="mt-4" for="email">Correo electrónico:</h3>
            <input type="text" name="email" required>

            <h3 class="mt-4" for="telefono">Teléfono:</h3>
            <input type="text" name="telefono" required>

            <h3 class="mt-4" for="tipo">Tipo:</h3>
            <select name="tipo" required>
                <option value="admin">Admin</option>
                <option value="cliente">Cliente</option>
            </select>

            <h3 class="mt-4" for="password">Contraseña:</h3>
            <input type="text" name="password" required>

            <div>
                <button class="btn btn-primary custom-bg-color mx-auto text-dark border border-dark mt-4" type="submit">Crear
                    usuario</button>
            </div>
        </form>
    </div>
    </div>
    @endif
</div>
