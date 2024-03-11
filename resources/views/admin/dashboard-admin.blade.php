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
    <title>Panel usuarios</title>
</head>

<body style="background-color: #fbf2d5;">
    @include('components.header')


    <div style="" class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1>USUARIOS REGISTRADOS EN EL SISTEMA</h1>

            <form action="{{route('crearusuario')}}" method="POST">
                @csrf
                <div>
                    {{-- <button type="submit"
                        class="text-white mt-3 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Añadir
                        usuario</button> --}}
                    @livewire('CrearUsuario')
                </div>
                <div>
                    @if (session("status"))
                        <div><h3 style="color:green">{{session("status")}}</h3></div>
                    @endif
                </div>
            </form>

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


</div>
    {{-- <div>
        @livewire('TablaUsuarios')
    </div> --}}

    {{-- @include('components.footer') --}}

</body>

</html>
