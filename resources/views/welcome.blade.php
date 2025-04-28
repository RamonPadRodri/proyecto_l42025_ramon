<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Administración de Clubes Deportivos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            color: #fff;

            background-image: url('{{ asset('images/manager.png') }}');
            background-repeat: repeat;
            background-size: 195px 210px;
            background-attachment: fixed;
        }

        .hero-section {
            background: rgba(255, 255, 255, 0.9);
            padding: 100px 0;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-custom {
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            color: #333;
        }

        .card-custom .card-body {
            padding: 40px;
        }

        .hero-section h1 {
            font-size: 3rem;
            color: #1976D2;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-primary-custom {
            background-color: #1976D2;
            border-color: #1976D2;
        }

        .btn-primary-custom:hover {
            background-color: #1565C0;
            border-color: #1565C0;
            transform: translateY(-3px);
        }

        .btn-success-custom {
            background-color: #FF5722;
            border-color: #FF5722;
        }

        .btn-success-custom:hover {
            background-color: #E64A19;
            border-color: #E64A19;
            transform: translateY(-3px);
        }

        .btn-warning-custom {
            background-color: #FF9800;
            border-color: #FF9800;
        }

        .btn-warning-custom:hover {
            background-color: #FB8C00;
            border-color: #FB8C00;
            transform: translateY(-3px);
        }

        .alert-info {
            background-color: #FFEB3B;
            color: #333;
            font-weight: 500;
        }

        .alert-info .alert-link {
            color: #1976D2;
        }

        .alert-info .alert-link:hover {
            color: #1565C0;
        }
    </style>
</head>
<body>

<div class="container-fluid hero-section text-center">
    <div class="container">
        <!-- Encabezado del sistema -->
        <h1 class="display-4 mb-4">
            Bienvenido al Sistema de Administración de Clubes Deportivos
        </h1>

        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-16">
        </div>


        <!-- Descripción del sistema en formato de card -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-body">
                        <p class="lead text-muted">
                            Este sistema está diseñado para permitir a los administradores y entrenadores gestionar clubes deportivos y los jugadores asociados a ellos.
                        </p>

                        <p class="lead text-muted mb-4">
                            Con nuestra plataforma podrás:
                        </p>
                        <ul class="text-start mx-auto" style="max-width: 400px;">
                            <li>Crear y gestionar tus equipos deportivos.</li>
                            <li>Asignar jugadores a equipos y gestionar sus datos.</li>
                            <li>Gestionar la autenticación de usuarios y permisos de acceso.</li>
                            <li>Ver detalles completos de cada equipo, incluyendo jugadores y estadísticas.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Llamado a la acción para registrarse o iniciar sesión -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-grid gap-3">
                    <a href="{{ route('login') }}" class="btn btn-primary-custom btn-custom mb-3">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-warning-custom btn-custom">Registrarse</a>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- Bootstrap JS & Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
