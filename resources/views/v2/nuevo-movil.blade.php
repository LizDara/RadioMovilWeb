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
<link id="theme-stylesheet" rel="stylesheet" href="./css/nuevo-movil.css">
<script src="./js/nuevo-movil.js"></script>
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
            <a class="mdc-list-item" href="./parada">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">place</i>
                <span class="mdc-list-item__text">Paradas</span>
            </a>
            <a id="item-selected" class="mdc-list-item" href="./movil" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">local_taxi</i>
                <span id="item-text-selected" class="mdc-list-item__text">Móviles</span>
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
                <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Nuevo móvil</h1>
                <label class="mdc-text-field mdc-text-field--outlined placa">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Número de placa</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="placa" type="text" class="mdc-text-field__input" aria-labelledby="placa">
                </label>
                <span id="placa-error" class="helper-text" style="text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined color">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Color</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="color" type="text" class="mdc-text-field__input" aria-labelledby="color">
                </label>
                <span id="color-error" class="helper-text" style="text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined marca">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Marca</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="marca" type="text" class="mdc-text-field__input" aria-labelledby="marca">
                </label>
                <span id="marca-error" class="helper-text" style="text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined modelo">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Modelo</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="modelo" type="text" class="mdc-text-field__input" aria-labelledby="modelo">
                </label>
                <span id="modelo-error" class="helper-text" style="text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined year">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Año</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="year" type="text" class="mdc-text-field__input" aria-labelledby="year">
                </label>
                <span id="year-error" class="helper-text" style="text-align: left"></span>
                <div class="mdc-select mdc-select--outlined demo-width-class tipo">
                    <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
                        <span class="mdc-notched-outline">
                          <span class="mdc-notched-outline__leading"></span>
                          <span class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Tipo</span>
                          </span>
                          <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <span class="mdc-select__selected-text-container">
                          <span id="demo-selected-text" class="mdc-select__selected-text"></span>
                        </span>
                        <span class="mdc-select__dropdown-icon">
                          <svg
                                  class="mdc-select__dropdown-icon-graphic"
                                  viewBox="7 10 10 5" focusable="false">
                            <polygon
                                    class="mdc-select__dropdown-icon-inactive"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 10 12 15 17 10">
                            </polygon>
                            <polygon
                                    class="mdc-select__dropdown-icon-active"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 15 12 10 17 15">
                            </polygon>
                          </svg>
                        </span>
                    </div>
                    <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">
                        <ul class="mdc-list" role="listbox" aria-label="Food picker listbox">
                            <li class="mdc-list-item mdc-list-item--selected" aria-selected="true" data-value="" role="option">
                                <span class="mdc-list-item__ripple"></span>
                            </li>
                            <li class="mdc-list-item" aria-selected="false" data-value="Auto" role="option">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text">
                                  Auto
                                </span>
                            </li>
                            <li class="mdc-list-item" aria-selected="false" data-value="Vagoneta" role="option">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text">
                                  Vagoneta
                                </span>
                            </li>
                            <li class="mdc-list-item" aria-selected="false" data-value="Camion" role="option">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text">
                                  Camión
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <span id="tipo-error" class="helper-text" style="text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined estado">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Estado</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="estado" type="text" class="mdc-text-field__input" aria-labelledby="estado">
                </label>
                <span id="estado-error" class="helper-text" style="text-align: left"></span>
                <div class="mdc-select mdc-select--outlined demo-width-class parada">
                    <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
                        <span class="mdc-notched-outline">
                          <span class="mdc-notched-outline__leading"></span>
                          <span class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Parada</span>
                          </span>
                          <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <span class="mdc-select__selected-text-container">
                          <span id="demo-selected-text" class="mdc-select__selected-text"></span>
                        </span>
                        <span class="mdc-select__dropdown-icon">
                          <svg
                                  class="mdc-select__dropdown-icon-graphic"
                                  viewBox="7 10 10 5" focusable="false">
                            <polygon
                                    class="mdc-select__dropdown-icon-inactive"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 10 12 15 17 10">
                            </polygon>
                            <polygon
                                    class="mdc-select__dropdown-icon-active"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 15 12 10 17 15">
                            </polygon>
                          </svg>
                        </span>
                    </div>
                    <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">
                        <ul class="mdc-list" role="listbox" aria-label="Food picker listbox">
                            <li class="mdc-list-item mdc-list-item--selected" aria-selected="true" data-value="" role="option">
                                <span class="mdc-list-item__ripple"></span>
                            </li>
                            @foreach($data['parada'] as $parada)
                                <li class="mdc-list-item" aria-selected="false" data-value="{{ $parada->id }}" role="option">
                                    <span class="mdc-list-item__ripple"></span>
                                    <span class="mdc-list-item__text">{{ $parada->nombre . ' (' . $parada->direccion . ')'}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <span id="parada-error" class="helper-text" style="text-align: left"></span>
                <div class="mdc-select mdc-select--outlined demo-width-class chofer">
                    <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
                        <span class="mdc-notched-outline">
                          <span class="mdc-notched-outline__leading"></span>
                          <span class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Chofer</span>
                          </span>
                          <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <span class="mdc-select__selected-text-container">
                          <span id="demo-selected-text" class="mdc-select__selected-text"></span>
                        </span>
                        <span class="mdc-select__dropdown-icon">
                          <svg
                                  class="mdc-select__dropdown-icon-graphic"
                                  viewBox="7 10 10 5" focusable="false">
                            <polygon
                                    class="mdc-select__dropdown-icon-inactive"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 10 12 15 17 10">
                            </polygon>
                            <polygon
                                    class="mdc-select__dropdown-icon-active"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 15 12 10 17 15">
                            </polygon>
                          </svg>
                        </span>
                    </div>
                    <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">
                        <ul class="mdc-list" role="listbox" aria-label="Food picker listbox">
                            <li class="mdc-list-item mdc-list-item--selected" aria-selected="true" data-value="" role="option">
                                <span class="mdc-list-item__ripple"></span>
                            </li>
                            @foreach($data['chofer'] as $chofer)
                                <li class="mdc-list-item" aria-selected="false" data-value="{{ $chofer->ci }}" role="option">
                                    <span class="mdc-list-item__ripple"></span>
                                    <span class="mdc-list-item__text">{{ $chofer->nombre . ' (' . $chofer->ci . ')'}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <span id="chofer-error" class="helper-text" style="text-align: left"></span>
                <span id="backend-error" class="helper-text" style="text-align: left"></span>
                <button id="add-movil-button" class="add-movil-button mdc-button mdc-button--raised" style="margin-bottom: 32px">
                    <span class="add-movil-button-text mdc-button__label">Añadir móvil</span>
                </button>
            </div>
        </div>
        <div id="second-content" class="col-md" style="justify-content: center; align-items: center; max-height: 100vh; overflow: auto">
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Móviles registrados</h1>
            {{--Card--}}
            @foreach($data['movil'] as $movil)
                <div class="mdc-card" style="margin: 24px">
                    <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                        {{ $movil->numeroplaca }}
                    </div>
                    <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 500; margin: 0px 16px 0px 16px">
                        {{ $movil->color }}
                    </div>
                    <div class="caracteristicas-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 500; margin: 0px 16px 8px 16px">
                        {{ $movil->marca }} {{ $movil->modelo }} {{ $movil->anho }}
                    </div>
                    <div class="parada-text" style="margin-left: 16px; margin-right: 16px; font-size: .875rem; line-height: 1.25rem; font-weight: 400; opacity: .6;">
                        {{ $movil->nombreparada }} ({{ $movil->direccionparada }})
                    </div>
                    <div class="chofer-text" style="margin-left: 16px; margin-right: 16px; font-size: .875rem; line-height: 1.25rem; font-weight: 400; opacity: .6;">
                        {{ $movil->nombrechofer }} {{ $movil->apellidochofer }} ({{ $movil->chofer_ci }})
                    </div>
                    <div class="mdc-card__actions">
                        <button class="edit-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openEditDialog({{ json_encode($movil) }})">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label">Editar</span>
                        </button>
                        <button class="remove-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openDeleteDialog('{{ $movil->numeroplaca }}')">
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
            <h2 class="mdc-dialog__title" id="my-dialog-title">Editar móvil</h2>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <div id="login-form-edit" class="col" style="justify-content: center">
                    <div style="max-width: 400px; margin: auto;">
                        <label class="mdc-text-field mdc-text-field--outlined color-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Color</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="color-edit" type="text" class="mdc-text-field__input" aria-labelledby="color">
                        </label>
                        <span id="color-error-edit" class="helper-text" style="text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined marca-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Marca</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="marca-edit" type="text" class="mdc-text-field__input" aria-labelledby="marca">
                        </label>
                        <span id="marca-error-edit" class="helper-text" style="text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined modelo-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Modelo</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="modelo-edit" type="text" class="mdc-text-field__input" aria-labelledby="modelo">
                        </label>
                        <span id="modelo-error-edit" class="helper-text" style="text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined year-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Año</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="year-edit" type="text" class="mdc-text-field__input" aria-labelledby="year">
                        </label>
                        <span id="year-error-edit" class="helper-text" style="text-align: left"></span>
                        <div class="mdc-select mdc-select--outlined demo-width-class tipo-edit">
                            <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
                        <span class="mdc-notched-outline">
                          <span class="mdc-notched-outline__leading"></span>
                          <span class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Tipo</span>
                          </span>
                          <span class="mdc-notched-outline__trailing"></span>
                        </span>
                                <span class="mdc-select__selected-text-container">
                          <span id="demo-selected-text" class="mdc-select__selected-text"></span>
                        </span>
                                <span class="mdc-select__dropdown-icon">
                          <svg
                                  class="mdc-select__dropdown-icon-graphic"
                                  viewBox="7 10 10 5" focusable="false">
                            <polygon
                                    class="mdc-select__dropdown-icon-inactive"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 10 12 15 17 10">
                            </polygon>
                            <polygon
                                    class="mdc-select__dropdown-icon-active"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 15 12 10 17 15">
                            </polygon>
                          </svg>
                        </span>
                            </div>
                            <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">
                                <ul class="mdc-list" role="listbox" aria-label="Food picker listbox">
                                    <li class="mdc-list-item mdc-list-item--selected" aria-selected="true" data-value="" role="option">
                                        <span class="mdc-list-item__ripple"></span>
                                    </li>
                                    <li class="mdc-list-item" aria-selected="false" data-value="Auto" role="option">
                                        <span class="mdc-list-item__ripple"></span>
                                        <span class="mdc-list-item__text">
                                  Auto
                                </span>
                                    </li>
                                    <li class="mdc-list-item" aria-selected="false" data-value="Vagoneta" role="option">
                                        <span class="mdc-list-item__ripple"></span>
                                        <span class="mdc-list-item__text">
                                  Vagoneta
                                </span>
                                    </li>
                                    <li class="mdc-list-item" aria-selected="false" data-value="Camion" role="option">
                                        <span class="mdc-list-item__ripple"></span>
                                        <span class="mdc-list-item__text">
                                  Camión
                                </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span id="tipo-error-edit" class="helper-text" style="text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined estado-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Estado</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="estado-edit" type="text" class="mdc-text-field__input" aria-labelledby="estado">
                        </label>
                        <span id="estado-error-edit" class="helper-text" style="text-align: left"></span>
                        <div class="mdc-select mdc-select--outlined demo-width-class parada-edit">
                            <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
                        <span class="mdc-notched-outline">
                          <span class="mdc-notched-outline__leading"></span>
                          <span class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Parada</span>
                          </span>
                          <span class="mdc-notched-outline__trailing"></span>
                        </span>
                                <span class="mdc-select__selected-text-container">
                          <span id="demo-selected-text" class="mdc-select__selected-text"></span>
                        </span>
                                <span class="mdc-select__dropdown-icon">
                          <svg
                                  class="mdc-select__dropdown-icon-graphic"
                                  viewBox="7 10 10 5" focusable="false">
                            <polygon
                                    class="mdc-select__dropdown-icon-inactive"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 10 12 15 17 10">
                            </polygon>
                            <polygon
                                    class="mdc-select__dropdown-icon-active"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 15 12 10 17 15">
                            </polygon>
                          </svg>
                        </span>
                            </div>
                            <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">
                                <ul class="mdc-list" role="listbox" aria-label="Food picker listbox">
                                    <li class="mdc-list-item mdc-list-item--selected" aria-selected="true" data-value="" role="option">
                                        <span class="mdc-list-item__ripple"></span>
                                    </li>
                                    @foreach($data['parada'] as $parada)
                                        <li class="mdc-list-item" aria-selected="false" data-value="{{ $parada->id }}" role="option">
                                            <span class="mdc-list-item__ripple"></span>
                                            <span class="mdc-list-item__text">{{ $parada->nombre . ' (' . $parada->direccion . ')'}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <span id="parada-error-edit" class="helper-text" style="text-align: left"></span>
                        <div class="mdc-select mdc-select--outlined demo-width-class chofer-edit">
                            <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
                        <span class="mdc-notched-outline">
                          <span class="mdc-notched-outline__leading"></span>
                          <span class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Chofer</span>
                          </span>
                          <span class="mdc-notched-outline__trailing"></span>
                        </span>
                                <span class="mdc-select__selected-text-container">
                          <span id="demo-selected-text" class="mdc-select__selected-text"></span>
                        </span>
                                <span class="mdc-select__dropdown-icon">
                          <svg
                                  class="mdc-select__dropdown-icon-graphic"
                                  viewBox="7 10 10 5" focusable="false">
                            <polygon
                                    class="mdc-select__dropdown-icon-inactive"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 10 12 15 17 10">
                            </polygon>
                            <polygon
                                    class="mdc-select__dropdown-icon-active"
                                    stroke="none"
                                    fill-rule="evenodd"
                                    points="7 15 12 10 17 15">
                            </polygon>
                          </svg>
                        </span>
                            </div>
                            <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--fullwidth">
                                <ul class="mdc-list" role="listbox" aria-label="Food picker listbox">
                                    <li class="mdc-list-item mdc-list-item--selected" aria-selected="true" data-value="" role="option">
                                        <span class="mdc-list-item__ripple"></span>
                                    </li>
                                    @foreach($data['chofer'] as $chofer)
                                        <li class="mdc-list-item" aria-selected="false" data-value="{{ $chofer->ci }}" role="option">
                                            <span class="mdc-list-item__ripple"></span>
                                            <span class="mdc-list-item__text">{{ $chofer->nombre . ' (' . $chofer->ci . ')'}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <span id="chofer-error-edit" class="helper-text" style="text-align: left"></span>
                        <span id="backend-error-edit" class="helper-text" style="text-align: left"></span>
                    </div>
                </div>
            </div>
            <div class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="editarMovil()">
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
                ¿Está seguro que desea eliminar el móvil?
            </div>
            <div class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="removeMovil()">
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