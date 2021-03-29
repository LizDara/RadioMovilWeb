<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="./css/newtrip.css">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="./js/newtrip.js"></script>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="container-fluid mh-100 min-vh-100" >
    <div class="row min-vh-100">
        <div id="login-form" class="col-6">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style="display: inherit"><i class="material-icons">menu</i></a>
            <div style="max-width: 400px; margin: auto">
                <h1>
                    Nuevo Viaje
                </h1>
                <div class="input-field col s12">
                    <label for="date">Fecha</label>
                    <input id="date" type="text" class="datepicker" required>
                    <span id="date-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="time" type="text" class="timepicker" required>
                    <label for="time">Hora</label>
                    <span id="time-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="point" type="text" required>
                    <label for="point">Punto de partida</label>
                    <span id="point-error" class="helper-text" data-error=""></span>
                </div>
                <div class="input-field col s12">
                    <input id="arrival-point" type="text" required>
                    <label for="arrival-point">Punto de llegada</label>
                    <span id="arrival-point-error" class="helper-text" data-error=""></span>
                </div>
                <button class="btn waves-effect waves-light" onclick="addTrip()" style="width: 100%">
                    SOLICITAR VIAJE
                </button>
            </div>
        </div>
        <div id="second-content" class="col-6">
            <img src="./assets/new-trip.png" alt="New trip" class="img-fluid">
        </div>
    </div>
</div>
<ul id="slide-out" class="sidenav">
    <li style="margin-top: 8px"><span class="black-text name" style="padding: 0 32px; font-weight: 900;">John Doe</span></li>
    <li style="line-height: 10px; padding-bottom: 24px"><span class="black-text email" style="padding: 0 32px; font-weight: 100">jdandturk@gmail.com</span></li>
    <li><button id="edit-profile-button" class="btn waves-effect waves-light" name="action">MODIFICAR PERFIL</button></li>
    <li><button id="logout-button" class="btn waves-effect waves-light" name="action">CERRAR SESIÓN</button></li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="#!">Servicios</a></li>
</ul>
</body>
</html>