<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        .custom-bg-color {
            background-color: #fbf2d5;
        }
    </style>
    <title>Registro</title>
</head>

<body style="background-color: #fbf2d5;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <img src="/imagenes/patitas_solidarias.jpg" style="width: 150px; height: 150px">
        <h1 class="mb-4">Editar a {{$animal->nombre}}</h1>
        <img class="rounded" style="width:170px; height:150px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);"  src="{{ asset('storage/img_car/' . $animal->foto) }}"/>
        <div class="card mt-4" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <form method="POST" action="{{route('animales.update', ['animale' => $animal->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <p style="font-size: 20px">Nombre</p>
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                            :value="old('nombre', $animal->nombre)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <!-- Razas -->


                    <!-- Adoptado -->
                    <div class="mt-4">
                        <p style="font-size: 20px">Adoptado</p>
                        <select id="adoptado" name="adoptado" class="block mt-1 w-full" required>
                            <option value="1" {{ old('adoptado', $animal->adoptado) == '1' ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('adoptado', $animal->adoptado) == '0' ? 'selected' : '' }}>No</option>
                        </select>
                        <x-input-error :messages="$errors->get('adoptado')" class="mt-2" />
                    </div>

                    <!-- Imagen -->
                    <div class="mt-4">
                        <p style="font-size: 20px">Imagen</p>
                        <input type="file" id="foto" name="foto" class="block mt-1 w-full" accept="foto/*" {{ isset($animal->foto) ? '' : 'required' }}>
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                        <button class="btn btn-primary custom-bg-color mx-auto text-dark border border-dark mt-4">
                            {{ __('Editar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

