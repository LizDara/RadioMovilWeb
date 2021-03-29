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
<link id="theme-stylesheet" rel="stylesheet" href="./css/cliente/menu-cliente.css">
<script src="./js/cliente/menu-cliente.js"></script>
<body class="home" style="display: flex; margin: 0px">
<aside class="mdc-drawer" style="height: auto">
    <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">{{ $data['usuario']->nombre }} {{ $data['usuario']->apellido }}</h3>
        <h6 class="mdc-drawer__subtitle">{{ $data['usuario']->correo }}</h6>
    </div>
    <hr class="mdc-list-divider">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a id="item-selected" class="mdc-list-item" href="./cliente">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
                <span id="item-text-selected" class="mdc-list-item__text">Inicio</span>
            </a>
            <a class="mdc-list-item" href="./tarifa">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">paid</i>
                <span class="mdc-list-item__text">Tarifa</span>
            </a>
            <a class="mdc-list-item" href="./promocion">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">local_offer</i>
                <span class="mdc-list-item__text">Promoción</span>
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
            <button class="mdc-button mdc-button--outlined edit-profile-button" onclick="editProfileLink()">
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
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Servicios</h1>
            {{--Card--}}
            @foreach($data['servicio'] as $servicio)
                <div class="mdc-card viaje-card" style="margin: 24px">
                    <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                        {{ $servicio->nombre }}
                    </div>
                    <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 400; margin: 0px 16px 0px 16px">
                        {{ $servicio->descripcion }}
                    </div>
                    <div class="mdc-card__actions">
                        <button class="edit-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="loadService('{{ $servicio->id }}')">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label">Solicitar viaje</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="second-content" class="col-md" style="display: flex; justify-content: center; flex-direction: column; height: 100vh">
            <img src="./assets/new-trip.png" alt="Welcome" class="img-fluid" style="padding: 32px">
        </div>
    </div>
</div>
<div class="mdc-dialog edit-dialog">
    <div class="mdc-dialog__container">
        <div class="mdc-dialog__surface"
             role="alertdialog"
             aria-modal="true"
             aria-labelledby="my-dialog-title"
             aria-describedby="my-dialog-content">
            <h2 class="mdc-dialog__title" id="my-dialog-title">Solicitar servicio</h2>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <div id="login-form" class="col" style="justify-content: center">
                    <div style="max-width: 400px; margin: auto;">
                        <label class="mdc-text-field mdc-text-field--outlined fecha">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Fecha</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="fecha" type="date" class="mdc-text-field__input" aria-labelledby="fecha">
                        </label>
                        <span id="fecha-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined hora">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Hora</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="hora" type="time" class="mdc-text-field__input" aria-labelledby="hora">
                        </label>
                        <span id="hora-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined punto-partida">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Punto de partida</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="punto-partida" type="text" class="mdc-text-field__input" aria-labelledby="punto-partida">
                        </label>
                        <span id="punto-partida-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined punto-llegada">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Punto de llegada</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="punto-llegada" type="text" class="mdc-text-field__input" aria-labelledby="punto-llegada">
                        </label>
                        <span id="punto-llegada-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <div class="mdc-dialog__actions">
                            <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                                <div class="mdc-button__ripple"></div>
                                <span class="mdc-button__label">Cancelar</span>
                            </button>
                            <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="editarServicio()">
                                <div class="mdc-button__ripple"></div>
                                <span class="mdc-button__label">Solicitar</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mdc-dialog__scrim"></div>
            </div>
</body>
</html>