
<div style="" class="container mt-5">

    <div class="row">
        <div class="col text-center">

            <h1>LISTADO DE ANIMALES</h1>

            @if (auth()->user()->tipo === "admin")
            <div>
                @livewire('CreateAnimal')
            </div>
            @endif
            <div class="container mt-5">
                {{ $animales->links() }}
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="p-4">Nombre</th>
                            <th class="p-4">Razas</th>
                            <th class="p-4">Adoptado</th>
                            <th class="p-4">Foto Animal</th>
                            @if (auth()->user()->tipo === "admin")
                            <th class="p-4">Operaciones</th>
                            @else
                            <th class="p-4">Reservar</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($animales as $animal)
                            <tr>
                                <td class="p-4">{{ $animal->nombre }}</td>
                                <td class="p-4">
                                    @foreach ($animal->razas as $raza)
                                        {{ $raza->nombre }}<br>
                                    @endforeach
                                </td>
                                <td class="p-4">{{ $animal->adoptado ? 'Sí' : 'No' }}</td>
                                <td class="p-4">{{ $animal->foto }}</td>
                                @if (auth()->user()->tipo === "admin")
                                <td class="p-4">
                                    <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Editar animal</button>
                                    <button type="button" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Borrar animal</button>

                                    <form id="delete-form" action="{{ route('animales.destroy', ['animale' => $animal->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                @else
                                <th class="p-4">
                                    @if (!$animal->adoptado)
                                    <button class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onclick="openDialog({{ $animal->id }})">Adoptar</button>
                                    @elseif ($animal->adoptado && $animal->id_usu === auth()->user()->id)
                                    <span>Este animal es tuyo</span>
                                    @endif
                                </th>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="dialog" id="dialog">
            <p>¿Estás seguro que quieres reservar a <span id="animalName"></span>?</p>
            <form id="adoptionForm" method="POST" action="{{ route('adoptar.animal') }}">
                @csrf
                <input type="hidden" name="animal_id" id="animalId" value="">
                <button type="button" onclick="adoptAnimal()" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Quiero adoptarlo
                </button>
                <button onclick="closeDialog()" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Mejor me lo pienso
                </button>
            </form>
        </div>

        <script>
            function openDialog(animalId) {
                document.getElementById('dialog').style.display = 'block';
                document.getElementById('animalId').value = animalId;
                document.getElementById('animalName').innerText = '{{$animal->nombre}}';
            }

            function closeDialog() {
                document.getElementById('dialog').style.display = 'none';
                document.getElementById('adoptionForm').reset();
            }

            function adoptAnimal() {
                document.getElementById('adoptionForm').submit();
            }
        </script>
    </div>
</div>
