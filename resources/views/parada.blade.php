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

<script src="./js/parada.js"></script>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="container-fluid mh-100 min-vh-100" >
    <div class="row min-vh-100">
        <div id="login-form" class="col-md">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style="display: inherit"><i class="material-icons">menu</i></a>
            <div action="#" style="max-width: 400px; margin: auto">
                <h1>
                    Nueva Parada
                </h1>
                <div class="input-field col s12">
                    <input id="name" type="text" required>
                    <label for="name">Nombre</label>
                    <span id="name-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="address" type="text" required>
                    <label for="address">Dirección</label>
                    <span id="address-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <button id="add-parada-button" class="btn waves-effect waves-light" onclick="newParada()" style="width: 100%">
                    AÑADIR PARADA
                </button>
            </div>
        </div>
        <div id="second-content" class="col-md">
            <h1>
                Paradas
            </h1>
            <div class="row">
                <div class="col s12 m6">
                    @foreach($paradas as $parada)
                        <div class="card teal lighten-4">
                            <div class="card-content black-text">
                                <span class="card-title" style="font-family: Inter; font-weight: 800;">{{ $parada->nombre }}</span>
                                <p>{{ $parada->direccion }}</p>
                            </div>
                            <div class="card-action">
                                <button data-target="{{ $parada->id }}" class="btn modal-trigger">Modificar</button>
                                <button data-target="remove-{{ $parada->id }}" class="btn modal-trigger">Eliminar</button>
                            </div>
                        </div>
                    @endforeach
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

@foreach($paradas as $parada)
    <div id={{ $parada->id }} class="modal">
        <div class="modal-content">
            <div action="#" style="max-width: 400px; margin: auto">
                <h1>
                    Editar Parada
                </h1>
                <div class="input-field col s12">
                    <input id="edit-name-{{ $parada->id }}" type="text" value="{{ $parada->nombre }}" required>
                    <label for="edit-name-{{ $parada->id }}">Nombre</label>
                    <span id="edit-name-error-{{ $parada->id }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="edit-address-{{ $parada->id }}" type="text" value="{{ $parada->direccion }}" required>
                    <label for="edit-address-{{ $parada->id }}">Direción</label>
                    <span id="edit-address-error-{{ $parada->id }}" class="helper-text" style="color: #F44336"></span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect" onclick="actualizarParada({{ $parada->id }})">EDITAR DATOS</button>
        </div>
    </div>
@endforeach

@foreach($paradas as $parada)
    <div id="remove-{{$parada->id}}" class="modal">
        <div class="modal-content">
            <h1>
                Eliminar Servicio
            </h1>
            <h6>¿Estás seguro que deseas eliminar el registro?</h6>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect" onclick="eliminarParada({{ $parada->id }})">ELIMINAR DATOS</button>
        </div>
    </div>
@endforeach

</body>
</html>