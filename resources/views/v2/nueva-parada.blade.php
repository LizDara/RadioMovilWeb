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
<link id="theme-stylesheet" rel="stylesheet" href="./css/nueva-parada.css">
<script src="./js/nueva-parada.js"></script>
<body class="home" style="display: flex; margin: 0px">
<aside class="mdc-drawer">
    <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">Diego Ilich</h3>
        <h6 class="mdc-drawer__subtitle">diego.severiche@gmail.com</h6>
    </div>
    <hr class="mdc-list-divider">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
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
            <a id="item-selected" class="mdc-list-item" href="./parada">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">place</i>
                <span id="item-text-selected" class="mdc-list-item__text">Paradas</span>
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
        <div id="login-form" class="col" style="justify-content: center; max-height: 100vh; overflow: auto">
            <div style="max-width: 400px; margin: auto;">
                <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Nueva parada</h1>
                <label class="mdc-text-field mdc-text-field--outlined nombre">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Nombre</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="nombre" type="text" class="mdc-text-field__input" aria-labelledby="nombre">
                </label>
                <span id="nombre-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined direccion">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Dirección</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="direccion" type="text" class="mdc-text-field__input" aria-labelledby="direccion">
                </label>
                <span id="direccion-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <button id="add-parada-button" class="add-parada-button mdc-button mdc-button--raised">
                    <span class="add-parada-button-text mdc-button__label">Añadir parada</span>
                </button>
            </div>
        </div>
        <div id="second-content" class="col-md" style="justify-content: center; align-items: center; height: 100vh; overflow: auto">
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Paradas registradas</h1>
            {{--Card--}}
            @foreach($paradas as $parada)
                <div class="mdc-card" style="margin: 24px">
                    <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                        {{ $parada->nombre }}
                    </div>
                    <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 500; margin: 0px 16px 0px 16px">
                        {{ $parada->direccion }}
                    </div>
                    <div class="mdc-card__actions">
                        <button class="edit-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openEditDialog({{ json_encode($parada) }})">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label">Editar</span>
                        </button>
                        <button class="remove-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openDeleteDialog('{{ $parada->id }}')">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label">Eliminar</span>
                        </button>
                    </div>
                </div>
            @endforeach
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
            <h2 class="mdc-dialog__title" id="my-dialog-title">Editar parada</h2>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <div id="login-form" class="col" style="justify-content: center">
                    <div style="max-width: 400px; margin: auto;">
                        <label class="mdc-text-field mdc-text-field--outlined nombre-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Nombre</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="nombre-edit" type="text" class="mdc-text-field__input" aria-labelledby="nombre">
                        </label>
                        <span id="nombre-error-edit" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined direccion-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Dirección</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="direccion-edit" type="text" class="mdc-text-field__input" aria-labelledby="direccion">
                        </label>
                        <span id="direccion-error-edit" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <span id="backend-error-edit" class="helper-text" style="color: #F44336; text-align: left"></span>
                    </div>
                </div>
            </div>
            <div class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="editarParada()">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Editar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
</div>
<div class="mdc-dialog remove-dialog">
    <div class="mdc-dialog__container">
        <div class="mdc-dialog__surface"
             role="alertdialog"
             aria-modal="true"
             aria-labelledby="my-dialog-title"
             aria-describedby="my-dialog-content">
            <div class="mdc-dialog__content" id="my-dialog-content">
                ¿Está seguro que desea eliminar la parada?
            </div>
            <div class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="removeParada()">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Eliminar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
</div>
</body>
</html>