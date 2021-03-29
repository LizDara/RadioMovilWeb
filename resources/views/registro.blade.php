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

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<link rel="stylesheet" href="./css/registro.css">
<script src="./js/registro.js"></script>
<body>
<div class="container-fluid mh-100 min-vh-100" >
    <div class="row align-items-center min-vh-100">
        <div id="login-form" class="col">
            <div id="theme-col" class="row align-items-center row-cols-auto">
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
            <div style="max-width: 400px; margin: auto;">
                <h1>
                    Registro
                </h1>
                <label class="mdc-text-field mdc-text-field--outlined dni">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">CI</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="dni" type="date" class="mdc-text-field__input" aria-labelledby="email" style="margin-top: 8px; box-shadow: none">
                </label>
                <span id="dni-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined first-name">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Nombre(s)</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="first-name" type="text" class="mdc-text-field__input" aria-labelledby="email" style="margin-top: 8px; box-shadow: none">
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
                    <input id="last-name" type="text" class="mdc-text-field__input" aria-labelledby="email" style="margin-top: 8px; box-shadow: none">
                </label>
                <span id="last-name-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <div class="mdc-select mdc-select--outlined demo-width-class">
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
                <span id="type-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <div class="input-field col s12" style="padding: 0px; margin-bottom: 0px; margin-top: 2rem">
                    <label for="birthdate">Fecha de nacimiento</label>
                    <input id="birthdate" type="text" class="datepicker" required>
                    <span id="birthdate-error" class="helper-text" style="color: #F44336; text-align: left; font-size: 15px"></span>
                </div>
                <label class="mdc-text-field mdc-text-field--outlined phone">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Teléfono</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="phone" type="text" class="mdc-text-field__input" aria-labelledby="email" style="margin-top: 8px; box-shadow: none">
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
                    <input id="address" type="text" class="mdc-text-field__input" aria-labelledby="email" style="margin-top: 8px; box-shadow: none">
                </label>
                <span id="address-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined email">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Correo electrónico</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="email" type="text" class="mdc-text-field__input" aria-labelledby="email" style="margin-top: 8px; box-shadow: none">
                </label>
                <span id="email-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <label class="mdc-text-field mdc-text-field--outlined password">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Contraseña</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="password" type="password" class="mdc-text-field__input" aria-labelledby="email" style="margin-top: 8px; box-shadow: none">
                </label>
                <span id="password-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <button id="register-button" class="login-button mdc-button mdc-button--raised" onclick="login()">
                    <span class="login-button-text mdc-button__label">REGISTRAR</span>
                </button>
                <h6>¿Ya tienes una cuenta? <a href="./login">Inicia sesión.</a></h6>
            </div>
        </div>
        <div id="second-content" class="col-md">
            <img src="./assets/login.png" alt="Welcome" class="img-fluid">
        </div>
    </div>
</div>
</body>
</html>