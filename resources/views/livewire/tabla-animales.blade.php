<div style="" class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1>LISTADO DE ANIMALES</h1>

            <div class="container mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="p-4">Nombre</th>
                            <th class="p-4">Razas</th>
                            <th class="p-4">Adoptado</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{ $animales->links() }} 
            </div>
        </div>
    </div>
</div>
