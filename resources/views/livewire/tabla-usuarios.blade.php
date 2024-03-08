<div style="" class="container mt-5">
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
                                {{-- <td class="p-4">
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">Eliminar</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>
