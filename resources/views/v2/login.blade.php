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
<link id="theme-stylesheet" rel="stylesheet" href="./css/login.css">
<script src="./js/login.js"></script>
<body>
<div class="container-fluid mh-100 min-vh-100" >
    <div class="row align-items-center min-vh-100">
        <div id="login-form" class="col">
            <div id="theme-col" class="row align-items-center row-cols-auto">
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
            <div style="max-width: 400px; margin: auto;">
                <h1 style="font-size: 3.5rem; font-weight: 700; margin: 24px;">Bienvenido a Radio Móvil Vallegrande</h1>
                <label class="mdc-text-field mdc-text-field--outlined username">
                  <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                      <span class="mdc-floating-label">Correo electrónico</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                  </span>
                    <input id="email" type="text" class="mdc-text-field__input" aria-labelledby="email">
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
                    <input id="password" type="password" class="mdc-text-field__input" aria-labelledby="password">
                </label>
                <span id="password-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                <button id="login-button" class="login-button mdc-button mdc-button--raised" onclick="login()">
                    <span class="login-button-text mdc-button__label">INICIAR SESIÓN</span>
                </button>
                <h6>¿Todavía no eres usuario? <a href="./registro">Regístrate.</a></h6>
            </div>
        </div>
        <div id="second-content" class="col-md" style="display: flex; justify-content: center; flex-direction: column; height: 100vh">
            <img src="./assets/login.png" alt="Welcome" class="img-fluid">
        </div>
    </div>
</div>
</body>
</html>