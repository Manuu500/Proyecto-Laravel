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
    <title>Añadir usuario</title>
</head>

<body style="background-color: #fbf2d5;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <img src="/imagenes/patitas_solidarias.jpg" style="width: 150px; height: 150px">
        <h1 class="mb-4">Añadir cuenta a la página</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <form method="POST" action="{{ route('registrarUsuario') }}">
                    @csrf
                    <h3 for="nombre">Nombre del usuario:</h3>
                    <input type="text" name="nombre" required>

                    <h3 class="mt-4" for="razas">Apellidos del usuario:</h3>
                    <input type="text" name="apellidos" required>

                    <h3 class="mt-4" for="razas">Correo electrónico:</h3>
                    <input type="text" name="email" required>

                    <h3 class="mt-4" for="razas">Teléfono:</h3>
                    <input type="text" name="telefono" required>

                    <h3 class="mt-4" for="razas">Contraseña:</h3>
                    <input type="text" name="password" required>

                    <div>
                        <button class="btn btn-primary custom-bg-color mx-auto text-dark border border-dark mt-4"
                            type="submit">Crear usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

