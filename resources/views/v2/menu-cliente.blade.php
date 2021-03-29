<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<link rel="stylesheet" href="./css/menu-cliente.css">
<script src="./js/menu-cliente.js"></script>
<body class="home" style="display: flex; margin: 0px">
<aside class="mdc-drawer">
    <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">Diego Ilich</h3>
        <h6 class="mdc-drawer__subtitle">diego.severiche@gmail.com</h6>
    </div>
    <hr class="mdc-list-divider">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a id="item-selected" class="mdc-list-item" href="./holamundo3" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">inbox</i>
                <span id="item-text-selected" class="mdc-list-item__text">Servicios</span>
            </a>
        </nav>
    </div>
    <div class="mdc-drawer__content" style="display: contents">
        <hr class="mdc-list-divider">
        <div id="theme-col" class="row align-items-center row-cols-auto" style="justify-content: center; margin-top: 24px; margin-bottom: 16px">
            <div class="col">
                <span class="material-icons">light_mode</span>
            </div>
            <div class="col">
                <div class="mdc-switch">
                    <div class="mdc-switch__track"></div>
                    <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb"></div>
                        <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" aria-checked="false">
                    </div>
                </div>
            </div>
            <div class="col">
                <span class="material-icons">dark_mode</span>
            </div>
        </div>
        <nav id="final-buttons" class="mdc-list">
            <button class="mdc-button mdc-button--outlined edit-profile-button">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">Modificar perfil</span>
            </button>
            <button class="mdc-button mdc-button--outlined logout-button">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">Cerrar sesión</span>
            </button>
        </nav>
    </div>
</aside>
<div class="container-fluid mh-100 min-vh-100" >
    <div class="row align-items-center min-vh-100">
        <div id="login-form" class="col" style="justify-content: center">
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Servicios disponibles</h1>
            {{--Card--}}
            @foreach($services as $service)
                <div class="mdc-card mdc-card--outlined" style="margin: 24px">
                    <div class="card-title" style="font-size: 1.25rem; line-height: 2rem; font-weight: 500; margin: 16px 16px 8px 16px">
                        {{ $service->nombre }}
                    </div>
                    <div class="card-content mdc-card__content" style="margin-left: 16px; margin-right: 16px; font-size: .875rem; line-height: 1.25rem; font-weight: 400; opacity: .6;">
                        {{ $service->descripcion }}
                    </div>
                    <div class="mdc-card__actions">
                        <button id="{{ $service->id }}" class="more-info-button mdc-button mdc-card__action mdc-card__action--button" onclick="hola()">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label">Mas información</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <div id="second-content" class="col-md" style="justify-content: center">
            <img src="./assets/login.png" alt="Welcome" class="img-fluid">
        </div>
    </div>
</div>
</body>
</html>