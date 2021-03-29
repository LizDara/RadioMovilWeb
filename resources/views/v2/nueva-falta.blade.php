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
<link id="theme-stylesheet" rel="stylesheet" href="./css/nueva-falta.css">
<script src="./js/nueva-falta.js"></script>
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
            <a class="mdc-list-item" href="./movil" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">local_taxi</i>
                <span class="mdc-list-item__text">Móviles</span>
            </a>
            <a id="item-selected" class="mdc-list-item" href="./falta">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">description</i>
                <span id="item-text-selected" class="mdc-list-item__text">Faltas</span>
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
        <div id="login-form" class="col" style="justify-content: center">
            <div style="max-width: 400px; margin: auto;">
                <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Nueva falta</h1>
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
                <label class="mdc-text-field mdc-text-field--outlined motivo">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Motivo</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="motivo" type="text" class="mdc-text-field__input" aria-labelledby="motivo">
                </label>
                <span id="motivo-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <div class="chofer mdc-select mdc-select--outlined demo-width-class">
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
                <span id="chofer-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <button id="add-falta-button" class="add-falta-button mdc-button mdc-button--raised">
                    <span class="add-falta-button-text mdc-button__label">Añadir falta</span>
                </button>
            </div>
        </div>
        <div id="second-content" class="col-md" style="justify-content: center; align-items: center; height: 100vh; overflow: auto">
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Faltas registradas</h1>
            {{--Card--}}
            @foreach($data['falta'] as $falta)
                <div class="mdc-card" style="margin: 24px">
                    <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                        {{ $falta->fecha }}
                    </div>
                    <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 500; margin: 0px 16px 0px 16px">
                        {{ $falta->nombrechofer }} {{ $falta->apellidochofer }}
                    </div>
                    <div class="color-text" style="font-size: .8rem; line-height: 2rem; font-weight: 500; margin: 0px 16px 0px 16px">
                        {{ $falta->motivo }}
                    </div>
                    <div class="mdc-card__actions">
                        <button class="edit-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openEditDialog({{ json_encode($falta) }})">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label">Editar</span>
                        </button>
                        <button class="remove-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openDeleteDialog('{{ $falta->id }}')">
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
            <h2 class="mdc-dialog__title" id="my-dialog-title">Editar falta</h2>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <div id="login-form" class="col" style="justify-content: center">
                    <div style="max-width: 400px; margin: auto;">
                        <label class="mdc-text-field mdc-text-field--outlined fecha-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Fecha</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="fecha-edit" type="date" class="mdc-text-field__input" aria-labelledby="fecha">
                        </label>
                        <span id="fecha-error-edit" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <label class="mdc-text-field mdc-text-field--outlined motivo-edit">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Motivo</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                            <input id="motivo-edit" type="text" class="mdc-text-field__input" aria-labelledby="motivo">
                        </label>
                        <span id="motivo-error-edit" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <div class="chofer-edit mdc-select mdc-select--outlined demo-width-class">
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
                        <span id="chofer-error-edit" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                    </div>
                </div>
            </div>
            <div class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="editarFalta()">
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
                ¿Está seguro que desea eliminar la falta?
            </div>
            <div class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="removeFalta()">
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