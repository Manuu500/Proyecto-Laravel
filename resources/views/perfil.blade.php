<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #fbf2d5;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            font-weight: bold;
        }

        .form-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .btn-register {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: #45a049;
        }

        @media (max-width: 576px) {
            .profile-image {
                width: 100%;
            }

            .form-card {
                padding: 15px;
            }
        }
    </style>
    <title>Registro</title>
</head>

<body>
    <div class="container text-center">
        <img src="/imagenes/patitas_solidarias.jpg" class="profile-image" alt="Profile Image">

        <div class="row justify-content-around">
            <div class="col-md-6 card">
                <div class="card-body">
                    <h5 class="card-title">Información Personal</h5>
                    <div class="mb-2">
                        <h6 class="d-inline-block mr-2">Nombre:</h6>
                        <span>{{$user->nombre}}</span>
                    </div>
                    <div class="mb-2">
                        <h6 class="d-inline-block mr-2">Apellido:</h6>
                        <span>{{$user->apellidos}}</span>
                    </div>
                    <div class="mb-2">
                        <h6 class="d-inline-block mr-2">Email:</h6>
                        <span>{{$user->email}}</span>
                    </div>
                    <div>
                        <h6 class="d-inline-block mr-2">Teléfono:</h6>
                        <span>{{$user->telefono}}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 card">
                <div class="card-body form-card">
                    <h5 class="card-title mb-4">¿Quieres editar tu información?</h5>

                    <form method="POST" action="{{ route('update-profile', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->nombre }}"
                                required autofocus>
                            <small class="text-danger">{{ $errors->first('nombre') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                            value="{{ $user->apellidos }}" required>
                            <small class="text-danger">{{ $errors->first('apellidos') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{ $user->email }}"
                                required>
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono"
                            value="{{ $user->telefono }}" required>
                            <small class="text-danger">{{ $errors->first('telefono') }}</small>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-register" style="background-color: #fbf2d5; color: #000; border: 1px solid #000;">Actualizar mi perfil</button>
                        </div>

                    </form>
                    <div class="form-group text-center">
                        <form method="GET" action="{{route('dashboard')}}">
                        <button type="submit" class="btn btn-secondary">Volver</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">¿Quieres actualizar tu contraseña?</h5>
                    <form method="POST" action="{{ route('update-con', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"  required>
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required>
                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-register" style="background-color: #fbf2d5; color: #000; border: 1px solid #000;">Actualizar mi contraseña</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
