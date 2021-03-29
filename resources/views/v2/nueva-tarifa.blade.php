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
<link rel="stylesheet" href="./css/nueva-tarifa.css">
<script src="./js/nueva-tarifa.js"></script>
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
            <div style="max-width: 400px; margin: auto;">
                <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Nueva tarifa</h1>
                <label class="mdc-text-field mdc-text-field--outlined precio">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Precio</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="precio" type="text" class="mdc-text-field__input" aria-labelledby="precio">
                </label>
                <span id="precio-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined kilometro">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Kilómetro(s)</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="kilometro" type="text" class="mdc-text-field__input" aria-labelledby="kilometro">
                </label>
                <span id="kilometro-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <div class="mdc-select mdc-select--outlined demo-width-class">
                    <div class="mdc-select__anchor" aria-labelledby="outlined-select-label">
                        <span class="mdc-notched-outline">
                          <span class="mdc-notched-outline__leading"></span>
                          <span class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Servicio</span>
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
                            <li class="mdc-list-item" aria-selected="false" data-value="admin" role="option">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text">
                                  Administrador
                                </span>
                            </li>
                            <li class="mdc-list-item" aria-selected="false" data-value="chofer" aria-disabled="true" role="option">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text">
                                  Chofer
                                </span>
                            </li>
                            <li class="mdc-list-item" aria-selected="false" data-value="cliente" role="option">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text">
                                  Cliente
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <span id="servicio-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <button id="add-tarifa-button" class="add-tarifa-button mdc-button mdc-button--raised">
                    <span class="add-tarifa-button-text mdc-button__label">Añadir tarifa</span>
                </button>
            </div>
        </div>
        <div id="second-content" class="col-md" style="justify-content: center">
            <img src="./assets/login.png" alt="Welcome" class="img-fluid">
        </div>
    </div>
</div>
</body>
</html>