<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="./css/register.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="./js/register.js"></script>


<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="container-fluid mh-100 min-vh-100" >
    <div class="row min-vh-100">
        <div id="login-form" class="col">
            <h1>
                Regístrate
            </h1>
            <div style="max-width: 400px; margin: auto">
                <div class="input-field col s12">
                    <input id="dni" type="text" class="validate" pattern="^[0-9]+$" required>
                    <label for="dni">CI</label>
                    <span id="dni-error" class="helper-text" data-error=""></span>
                </div>
                <div class="input-field col s12">
                    <input id="first-name" type="text" class="validate" required>
                    <label for="first-name">Nombre(s)</label>
                    <span id="first-name-error" class="helper-text" data-error="Este campo es requerido"></span>
                </div>
                <div class="input-field col s12">
                    <input id="last-name" type="text" class="validate" required>
                    <label for="last-name">Apellido(s)</label>
                    <span id="last-name-error" class="helper-text" data-error="Este campo es requerido"></span>
                </div>
                <div class="input-field col s12">
                    <select id="type" class="validate" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        <option value="1">Administrador</option>
                        <option value="2">Chofer</option>
                        <option value="3">Cliente</option>
                    </select>
                    <label>Tipo</label>
                    <span class="helper-text" data-error="Este campo es requerido" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <label for="birthdate">Fecha de nacimiento</label>
                    <input id="birthdate" type="text" class="datepicker" required>
                    <span id="birthdate-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="phone" type="text" class="validate" pattern="^[0-9]+$" required>
                    <label for="phone">Teléfono</label>
                    <span id="phone-error" class="helper-text" data-error=""></span>
                </div>
                <div class="input-field col s12">
                    <input id="address" type="text" class="validate" required>
                    <label for="address">Dirección</label>
                    <span id="address-error" class="helper-text" data-error=""></span>
                </div>
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" required>
                    <label for="email">Correo electrónico</label>
                    <span id="email-error" class="helper-text" data-error=""></span>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" required>
                    <label for="password">Contraseña</label>
                    <span id="password-error" class="helper-text" data-error="" data-success=""></span>
                </div>
                <button id="register-button" class="btn waves-effect waves-light" onclick="registerUser()" style="width: 100%">
                    REGISTRAR
                </button>
            </div>
            <h6>¿Ya tienes una cuenta? <a href="./login">Inicia sesión.</a></h6>
        </div>
        <div id="second-content" class="col-md">
            <img src="./assets/register.png" alt="Welcome" class="img-fluid">
        </div>
    </div>
</div>
</body>
</html>