<div style="" class="container mt-5">
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }

        .modal button {
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
        }

        /* Estilo para el diálogo */
        .dialog {
            display: none;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <div class="row">
        <div class="col text-center">
            <h1>USUARIOS REGISTRADOS EN EL SISTEMA</h1>

            <div class="container mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="p-4">Nombre</th>
                            <th class="p-4">Apellidos</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Teléfono</th>
                            <th class="p-4">Tipo</th>
                            <th class="p-4">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="p-4">{{ $usuario->nombre }}</td>
                                <td class="p-4">{{ $usuario->apellidos }}</td>
                                <td class="p-4">{{ $usuario->email}}</td>
                                <td class="p-4">{{ $usuario->telefono }}</td>
                                <td class="p-4">{{$usuario->tipo}}</td>
                                <td class="p-4">
                                    <form action="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}" method="GET">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                        class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Editar
                                        usuario</button>
                                    </form>
                                    <form action="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Borrar animal</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{ $usuarios->links() }}
            </div>
        </div>
    </div>

    <div class="dialog" id="dialog">
        <p>¿Estás seguro que quieres reservar a <span id="animalName"></span>?</p>
        <form id="adoptionForm" method="POST" action="{{ route('adoptar.animal') }}">
            @csrf
            <input type="hidden" name="animal_id" id="animalId" value="">
            <button type="button" onclick="adoptAnimal()"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Quiero adoptarlo
            </button>
        </form>
        <button onclick="closeDialog()"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Mejor me lo pienso
            </button>
    </div>

    <script>
        function openDialog(animalId) {
            document.getElementById('dialog').style.display = 'block';
            document.getElementById('animalId').value = animalId;
            document.getElementById('animalName').innerText = '{{$usuario->nombre}}';
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
