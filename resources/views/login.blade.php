<html>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="./js/login.js"></script>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <div class="container-fluid mh-100 min-vh-100" >
            <div class="row min-vh-100">
                <div id="login-form" class="col">
                    <div style="max-width: 400px; margin: auto; text-align: center">
                        <h1>
                            Bienvenido a <br/>Radio Móvil Vallegrande
                        </h1>
                        <div class="input-field col s12">
                            <input id="email" type="text" required>
                            <label for="email">Correo electrónico</label>
                            <span id="email-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" required>
                            <label for="password">Contraseña</label>
                            <span id="password-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        </div>
                        <button id="login-button" class="btn waves-effect waves-light" onclick="login()" style="width: 100%">
                            INICIAR SESIÓN
                        </button>
                        <h6>¿Todavía no eres usuario? <a href="./registro">Regístrate.</a></h6>
                    </div>
                </div>
                <div id="second-content" class="col-md">
                    <img src="./assets/login.png" alt="Welcome" class="img-fluid">
                </div>
            </div>
        </div>
    </body>
</html>