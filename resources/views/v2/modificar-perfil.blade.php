<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<link id="theme-stylesheet" rel="stylesheet" href="./css/modificar-perfil.css">
<script src="./js/modificar-perfil.js"></script>
<body class="home" style="display: flex; margin: 0px">
<aside class="mdc-drawer">
    <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">Diego Ilich</h3>
        <h6 class="mdc-drawer__subtitle">diego.severiche@gmail.com</h6>
    </div>
    <hr class="mdc-list-divider">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a id="item-selected" class="mdc-list-item" href="./admin">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
                <span id="item-text-selected" class="mdc-list-item__text">Inicio</span>
            </a>
            <a class="mdc-list-item" href="./servicio">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">commute</i>
                <span class="mdc-list-item__text">Servicios</span>
            </a>
            <a class="mdc-list-item" href="./tarifa">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">paid</i>
                <span class="mdc-list-item__text">Tarifas</span>
            </a>
            <a class="mdc-list-item" href="./promocion">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">local_offer</i>
                <span class="mdc-list-item__text">Promociones</span>
            </a>
            <a class="mdc-list-item" href="./parada">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">place</i>
                <span class="mdc-list-item__text">Paradas</span>
            </a>
            <a class="mdc-list-item" href="./movil" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">local_taxi</i>
                <span class="mdc-list-item__text">Móviles</span>
            </a>
            <a class="mdc-list-item" href="./falta">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">description</i>
                <span class="mdc-list-item__text">Faltas</span>
            </a>
            <a class="mdc-list-item" href="./permiso">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">sticky_note_2</i>
                <span class="mdc-list-item__text">Permisos</span>
            </a>
            <a class="mdc-list-item" href="./viaje">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">map</i>
                <span class="mdc-list-item__text">Viajes</span>
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
        <div id="login-form" class="col" style="overflow: auto; height: 100vh">
            <div style="max-width: 400px; margin: auto;">
                <h1 style="font-size: 3.5rem; font-weight: 700; margin: 24px;">Editar perfil</h1>
                <span id="dni-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined first-name">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Nombre(s)</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="first-name" type="text" class="mdc-text-field__input" value="{{ $usuario->nombre }}" aria-labelledby="email">
                </label>
                <span id="first-name-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined last-name">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Apellido(s)</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="last-name" type="text" class="mdc-text-field__input" value="{{ $usuario->apellido }}" aria-labelledby="email">
                </label>
                <span id="last-name-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined birthdate">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Fecha de nacimiento</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="birthdate" type="date" class="mdc-text-field__input" value="{{ $usuario->fechanacimiento }}" aria-labelledby="email">
                </label>
                <span id="birthdate-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined phone">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Teléfono</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="phone" type="text" class="mdc-text-field__input" value="{{ $usuario->telefono }}" aria-labelledby="email">
                </label>
                <span id="phone-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined address">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Dirección</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="address" type="text" class="mdc-text-field__input" value="{{ $usuario->direccion }}" aria-labelledby="email">
                </label>
                <span id="address-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <button id="register-button" class="login-button mdc-button mdc-button--raised" onclick="login()">
                    <span class="login-button-text mdc-button__label">Editar datos</span>
                </button>
            </div>
        </div>
        <div id="second-content" class="col-md">
            <img src="./assets/registro.png" alt="Welcome" class="img-fluid" style="padding: 32px">
        </div>
    </div>
</div>
</body>
</html>