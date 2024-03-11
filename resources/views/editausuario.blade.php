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
    <link rel="icon" href="{{ asset('imagenes/patitas_solidarias.jpg') }}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .custom-bg-color {
            background-color: #fbf2d5;
        }
    </style>
    <title>Editar usuario</title>
</head>

<body style="background-color: #fbf2d5;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <img src="/imagenes/patitas_solidarias.jpg" style="width: 150px; height: 150px">
        <h1 class="mb-4">Editar a {{$usuario->nombre}}</h1>
        <div class="card mt-4" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <form method="POST" action="{{route('usuarios.update', ['usuario' => $usuario->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <p style="font-size: 20px">Nombre</p>
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                            :value="old('nombre', $usuario->nombre)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <!-- Apellidos -->
                    <div>
                        <p style="font-size: 20px">Apellidos</p>
                        <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                            :value="old('apellidos', $usuario->apellidos)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <p style="font-size: 20px">Correo electrónico</p>
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                            :value="old('email', $usuario->email)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Telefono -->
                    <div>
                        <p style="font-size: 20px">Teléfono</p>
                        <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                            :value="old('telefono', $usuario->telefono)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>

                    <!-- Tipo -->
                    <div class="mt-4">
                        <label for="tipo" class="block text-sm font-medium text-gray-700">Rol del usuario</label>
                        <select id="tipo" name="tipo" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="admin" {{ old('rol', $usuario->tipo) === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="cliente" {{ old('rol', $usuario->tipo) === 'cliente' ? 'selected' : '' }}>Cliente</option>
                        </select>
                        <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                    </div>





                        <button type="submit" class="btn btn-primary custom-bg-color mx-auto text-dark border border-dark mt-4">
                            {{ __('Editar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

