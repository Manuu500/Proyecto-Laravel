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
    <title>Document</title>
</head>
<body style="background-color: #fbf2d5;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <img src="/imagenes/patitas_solidarias.jpg" style="width: 150px; height: 150px">
        <h1 class="mb-4">Contraseña olvidada</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    ¿Olvidaste tu contraseña? ¡No te preocupes! Coloca tu correo en la casilla de abajo y te enviaremos un enlace para que puedas restablecer la contraseña y recuperar el acceso a tu cuenta.

                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary custom-bg-color mx-auto text-dark border border-dark mt-2">
                            Enviame el código
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>




{{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
</div>

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
</form> --}}
