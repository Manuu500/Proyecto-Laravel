<script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

@include('components.header')

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

@include('components.footer')
