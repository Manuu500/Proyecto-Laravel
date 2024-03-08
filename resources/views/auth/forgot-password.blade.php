<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background-color: #fbf2d5;
        }
        .custom-bg-color {
            background-color: #fbf2d5;
        }
        .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 34rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .btn-custom {
            background-color: #ffc107;
            color: #343a40;
            border: 1px solid #343a40;
        }
        .btn-custom:hover {
            background-color: #e0a800;
        }
    </style>
    <title>Contraseña olvidada</title>
</head>
<body>
    <div class="container">
        <img src="{{ asset('imagenes/patitas_solidarias.jpg') }}" style="width: 150px; height: 150px" class="mb-3">

        <h1 class="mb-4">Contraseña olvidada</h1>

        <div class="card">
            <div class="card-body">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    ¿Olvidaste tu contraseña? No te preocupes. Coloca tu correo en la casilla de abajo y te enviaremos un enlace para que puedas restablecer la contraseña y recuperar el acceso a tu cuenta.
                </div>

                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-custom">Enviame el código</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
