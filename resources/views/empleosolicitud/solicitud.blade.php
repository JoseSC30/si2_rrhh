@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page HTML | AlexCG Design</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./estilos.css">
</head>

<body>
    <header class="hero">
        <div class="textos-hero">
            <h1>¿Te gustaría formar parte de nuestra empresa?</h1>
            <a>Completa los campos en la parte inferior de esta pagina</a>
        </div>
        <div class="svg-hero" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>

    <footer id="contacto">
        <div class="card-body">
                        <form method="POST" action="{{ route('empleosolicituds.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('empleosolicitud.formdos')

                        </form>
                    </div>
    </footer>

    <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
</body>

</html>
