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
<link id="theme-stylesheet" rel="stylesheet" href="./css/chofer/promocion.css">
<script src="./js/pruebagrafico.js"></script>
<body class="home" style="display: flex; margin: 0px">
<aside class="mdc-drawer">
    <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">Diego Ilich</h3>
        <h6 class="mdc-drawer__subtitle">diego.severiche@gmail.com</h6>
    </div>
    <hr class="mdc-list-divider">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a class="mdc-list-item" href="./chofer">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
                <span class="mdc-list-item__text">Inicio</span>
            </a>
            <a class="mdc-list-item" href="./permiso">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">sticky_note_2</i>
                <span class="mdc-list-item__text">Permisos</span>
            </a>
            <a class="mdc-list-item" href="./falta">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">description</i>
                <span class="mdc-list-item__text">Faltas</span>
            </a>
            <a class="mdc-list-item" href="./tarifa">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">paid</i>
                <span class="mdc-list-item__text">Tarifas</span>
            </a>
            <a id="item-selected" class="mdc-list-item" href="./promocion">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">local_offer</i>
                <span id="item-text-selected" class="mdc-list-item__text">Promociones</span>
            </a>
            <a class="mdc-list-item" href="./parada" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">place</i>
                <span class="mdc-list-item__text">Paradas</span>
            </a>
        </nav>
    </div>
    <div class="mdc-drawer__content" style="display: contents">
        <hr class="mdc-list-divider">
        <div id="theme-col" class="row align-items-center row-cols-auto" style="justify-content: center; margin-top: 24px; margin-bottom: 16px">
            <div class="col">
                <span class="material-icons switch-icon">light_mode</span>
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
                <span class="material-icons switch-icon">dark_mode</span>
            </div>
        </div>
        <nav id="final-buttons" class="mdc-list">
            <button class="mdc-button mdc-button--outlined edit-profile-button" onclick="perfilLink()">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">Modificar perfil</span>
            </button>
            <button class="mdc-button mdc-button--outlined logout-button" onclick="logoutLink()">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">Cerrar sesión</span>
            </button>
        </nav>
    </div>
</aside>
<div class="container-fluid mh-100 min-vh-100" >
    <div class="row align-items-center min-vh-100">
        <div id="login-form" class="col" style="justify-content: center; max-height: 100vh; overflow: auto">
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Promociones</h1>
            {{--Card--}}
            {{--            @foreach($data['promocion'] as $promocion)--}}
            {{--                <div class="mdc-card" style="margin: 24px">--}}
            {{--                    <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">--}}
            {{--                        {{ $promocion->nombre }} ({{ $promocion->nombreservicio }})--}}
            {{--                    </div>--}}
            {{--                    <div class="parada-text" style="margin-left: 16px; margin-right: 16px; font-size: .875rem; line-height: 1.25rem; font-weight: 400; opacity: .6;">--}}
            {{--                        Del {{ $promocion->fechainicio }} al {{ $promocion->fechafin }}--}}
            {{--                    </div>--}}
            {{--                    <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 500; margin: 0px 16px 0px 16px">--}}
            {{--                        {{ $promocion->descuento }}% Descuento--}}
            {{--                    </div>--}}
            {{--                    <div class="mdc-card__actions">--}}
            {{--                        <button class="edit-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openEditDialog({{ json_encode($promocion) }})">--}}
            {{--                            <div class="mdc-button__ripple"></div>--}}
            {{--                            <span class="mdc-button__label">Editar</span>--}}
            {{--                        </button>--}}
            {{--                        <button class="remove-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openDeleteDialog('{{ $promocion->id }}')">--}}
            {{--                            <div class="mdc-button__ripple"></div>--}}
            {{--                            <span class="mdc-button__label">Eliminar</span>--}}
            {{--                        </button>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            @endforeach--}}
            <div class="mdc-card" style="margin: 24px">
                <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                    Navideña (Traslado)
                </div>
                <div class="parada-text" style="margin-left: 16px; margin-right: 16px; font-size: .875rem; line-height: 1.25rem; font-weight: 400; opacity: .6;">
                    Del 20/06/2020 al 20/08/2020
                </div>
                <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 500; margin: 0px 16px 24px 16px">
                    20% de descuento
                </div>
            </div>
        </div>
        <div id="second-content" class="col-md" style="display: flex; justify-content: center; flex-direction: column; height: 100vh">
            <img src="./assets/menu-admin.png" alt="Welcome" class="img-fluid" style="padding: 64px">
        </div>
    </div>
    <canvas id="myChart" width="400" height="400"></canvas>
</div>
</body>
</html>
