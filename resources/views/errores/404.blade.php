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
        <title>¡Ups! Ha habido un problema</title>
</head>
<body style="background-color: #fbf2d5;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <img src="/imagenes/patitas_solidarias.jpg" style="width: 150px; height: 150px">
        <h1 class="mb-4">Error 404</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <form method="POST" action="{{ route('dashboard') }}">
                @csrf
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    La página a la que está tratando de acceder, no está disponible o no existe. Vuelva a la página!
                    <button class="btn btn-primary custom-bg-color mx-auto text-dark border border-dark mt-2">
                        {{ __('Volver') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

