<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="./css/new-service.css">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="./js/newrate.js"></script>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="container-fluid mh-100 min-vh-100" >
    <div class="row min-vh-100">
        <div id="login-form" class="col-md">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style="display: inherit"><i class="material-icons">menu</i></a>
            <h1>
                Nueva Tarifa
            </h1>
            <form action="#" style="max-width: 400px; margin: auto">
                <div class="input-field col s12">
                    <input id="name" type="text" required>
                    <label for="name">Precio</label>
                    <span id="name-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="description" type="text" required>
                    <label for="description">Kilómetro</label>
                    <span id="description-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Escoge una opción</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>Servicio</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action" style="width: 100%">
                    AÑADIR TARIFA
                </button>
            </form>
        </div>
        <div id="second-content" class="col-md">
            <h1>
                Tarifas
            </h1>
            <div class="row">
                <div class="col s12 m6" style="margin: 0px 64px 0px 64px">
                    <div class="card teal lighten-4">
                        <div class="card-content black-text">
                            <span class="card-title" style="font-family: Inter; font-weight: 800;">Traslado</span>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">1 kilómetro:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">4Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">2 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">6Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">5 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">10Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">10 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">18Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">20 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">35Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">50 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">60Bs.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6" style="margin: 0px 64px 0px 64px">
                    <div class="card teal lighten-4">
                        <div class="card-content black-text">
                            <span class="card-title" style="font-family: Inter; font-weight: 800;">Mudanza</span>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">1 kilómetro:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">4Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">2 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">6Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">5 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">10Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">10 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">18Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">20 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">35Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">50 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">60Bs.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6" style="margin: 0px 64px 0px 64px">
                    <div class="card teal lighten-4">
                        <div class="card-content black-text">
                            <span class="card-title" style="font-family: Inter; font-weight: 800;">Viaje fuera de la ciudad</span>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">1 kilómetro:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">4Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">2 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">6Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">5 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">10Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">10 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">18Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">20 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">35Bs.</div>
                            </div>
                            <div class="row" style="margin: 8px">
                                <div class="col s1" style="font-family: Inter; font-weight: 800;">50 kilómetros:</div>
                                <div class="col s1" style="font-family: Inter; font-weight: 800; text-align: end">60Bs.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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