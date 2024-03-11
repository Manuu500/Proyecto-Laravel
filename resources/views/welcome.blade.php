<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('imagenes/patitas_solidarias.jpg') }}" type="image/x-icon">


        <style>
            #sobreNosotrosText {
                display: none;
                animation: fadeIn 1s ease-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
        </style>
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- Animations CSS (puedes cambiarlo por la biblioteca que prefieras) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <!-- Styles -->

    </head>
    <body style="background-color: #fbf2d5;">




        <div class="container-fluid">
            <div class="col d-flex justify-content-center align-items-center vh-100">
                <div class="row">
                    <h1 id="quienesSomos" onclick="toggleText()">¿Quiénes somos?</h1>
                    <div class="mt-5" id="sobreNosotrosText">
                        <p>¡Bienvenidos a nuestra página de acogida de mascotas! Somos un equipo apasionado y comprometido
                            con la misión de brindar amor y cuidado a los animales necesitados.</p>
                        <p>Tenemos sedes en todas las ciudades de España, desde Málaga hasta Barcelona.</p>
                        <div>
                            <button type="button" onclick="window.location='{{ route('dashboard') }}'"
                            class="btn btn-register text-white" style="background-color: grey; color: #000; border: 1px solid #000;">Ver animales disponibles</button>

                            {{-- <button type="button" class="btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-primary">Primary</button> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function toggleText() {
                    var sobreNosotrosText = document.getElementById("sobreNosotrosText");
                    sobreNosotrosText.style.display = (sobreNosotrosText.style.display === "none") ? "block" : "none";
                }
        </script>
    </body>
</html>
