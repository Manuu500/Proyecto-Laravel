<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Lista de animales</title>
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
</head>

<body style="background-color: #fbf2d5;">
    @include('components.header')


    {{-- @livewire('TablaAnimales') --}}
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
                            <td class="p-4">
                                <img style="width:180px; height:150px" src="{{ asset('storage/img_car/' . $animal->foto) }}" alt="Foto del Animal">

                            </td>
                            @if (auth()->user()->tipo === "admin")
                            <td class="p-4">

                                <form action="{{ route('animales.edit', ['animale' => $animal->id]) }}" method="GET">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Editar
                                    animal</button>
                                </form>
                                <form action="{{ route('animales.destroy', ['animale' => $animal->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Borrar animal</button>
                                </form>
                            </td>
                            @else
                            <th class="p-4">
                                @if (!$animal->adoptado)
                                <button
                                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    onclick="openDialog({{ $animal->id }})">Adoptar</button>
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

    {{-- @include('components.footer') --}}
</body>

</html>
