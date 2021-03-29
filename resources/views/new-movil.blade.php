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

<script src="./js/newmovil.js"></script>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="container-fluid mh-100 min-vh-100" >
    <div class="row min-vh-100">
        <div id="login-form" class="col-md">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style="display: inherit"><i class="material-icons">menu</i></a>
            <div action="#" style="max-width: 400px; margin: auto">
                <h1>
                    Nuevo Móvil
                </h1>
                <div class="input-field col s12">
                    <input id="placa" type="text" required>
                    <label for="placa">Número de placa</label>
                    <span id="placa-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="color" type="text" required>
                    <label for="color">Color</label>
                    <span id="color-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="marca" type="text" required>
                    <label for="marca">Marca</label>
                    <span id="marca-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="modelo" type="text" required>
                    <label for="modelo">Modelo</label>
                    <span id="modelo-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="year" type="text" required>
                    <label for="year">Año</label>
                    <span id="year-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <select id="type" class="validate" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        <option value="Auto">Auto</option>
                        <option value="Vagoneta">Vagoneta</option>
                        <option value="Camion">Camion</option>
                    </select>
                    <label>Tipo</label>
                    <span id="type-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="estado" type="text" required>
                    <label for="estado">Estado</label>
                    <span id="estado-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <select id="parada" class="validate" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        @foreach($data['parada'] as $parada)
                            <option value="{{ $parada->id }}">{{ $parada->nombre . ' (' . $parada->direccion . ')'}}</option>
                        @endforeach
                    </select>
                    <label>Parada</label>
                    <span id="parada-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <select id="chofer" class="validate" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        @foreach($data['chofer'] as $chofer)
                            <option value="{{ $chofer->ci }}">{{ $chofer->nombre . ' (' . $chofer->ci . ')'}}</option>
                        @endforeach
                    </select>
                    <label>Chofer</label>
                    <span id="chofer-error" class="helper-text" style="color: #F44336"></span>
                </div>
                <button id="add-movil-button" class="btn waves-effect waves-light" onclick="newMovil()" style="width: 100%">
                    AÑADIR MÓVIL
                </button>
            </div>
        </div>
        <div id="second-content" class="col-md">
            <h1>
                Móviles
            </h1>
            <div class="row">
                <div class="col s12 m6">
                    @foreach($data['movil'] as $movil)
                        <div class="card teal lighten-4">
                            <div class="card-content black-text">
                                <span class="card-title" style="font-family: Inter; font-weight: 800;">{{ $movil->numeroplaca }}</span>
                                <p>{{ $movil->numeroplaca }}</p>
                            </div>
                            <div class="card-action">
                                <button data-target="{{ $movil->numeroplaca }}" class="btn modal-trigger">Modificar</button>
                                <button data-target="remove-{{ $movil->numeroplaca }}" class="btn modal-trigger">Eliminar</button>
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

@foreach($data['movil'] as $movil)
    <div id={{ $movil->numeroplaca }} class="modal">
        <div class="modal-content">
            <div action="#" style="max-width: 400px; margin: auto">
                <h1>
                    Editar Móvil
                </h1>
                <div class="input-field col s12">
                    <input id="edit-color-{{ $movil->numeroplaca }}" type="text" value="{{ $movil->color }}" required>
                    <label for="edit-color-{{ $movil->numeroplaca }}">Color</label>
                    <span id="edit-color-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="edit-marca-{{ $movil-> numeroplaca}}" type="text" value="{{ $movil->marca }}" required>
                    <label for="edit-marca-{{ $movil->numeroplaca }}">Marca</label>
                    <span id="edit-marca-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="edit-modelo-{{ $movil->numeroplaca }}" type="text" value="{{ $movil->modelo }}" required>
                    <label for="edit-modelo-{{ $movil->numeroplaca }}">Modelo</label>
                    <span id="edit-modelo-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="edit-year-{{ $movil->numeroplaca }}" type="text" value="{{ $movil->anho }}" required>
                    <label for="edit-year-{{ $movil->numeroplaca }}">Año</label>
                    <span id="edit-year-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <select id="edit-type-{{ $movil->numeroplaca }}" class="validate" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        <option value="Auto">Auto</option>
                        <option value="Vagoneta">Vagoneta</option>
                        <option value="Camion">Camion</option>
                    </select>
                    <label>Tipo</label>
                    <span id="edit-type-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <input id="edit-estado-{{ $movil->numeroplaca }}" type="text" value="{{ $movil->estado }}" required>
                    <label for="edit-estado-{{ $movil->numeroplaca }}">Estado</label>
                    <span id="edit-estado-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <select id="edit-parada-{{ $movil->numeroplaca }}" class="validate" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        @foreach($data['parada'] as $parada)
                            <option value="{{ $parada->id }}">{{ $parada->nombre . ' (' . $parada->direccion . ')'}}</option>
                        @endforeach
                    </select>
                    <label>Parada</label>
                    <span id="edit-parada-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
                <div class="input-field col s12">
                    <select id="edit-chofer-{{ $movil->numeroplaca }}" class="validate" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        @foreach($data['chofer'] as $chofer)
                            <option value="{{ $chofer->ci }}">{{ $chofer->nombre . ' (' . $chofer->ci . ')'}}</option>
                        @endforeach
                    </select>
                    <label>Chofer</label>
                    <span id="edit-chofer-error-{{ $movil->numeroplaca }}" class="helper-text" style="color: #F44336"></span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect" onclick="updateMovil('{{ $movil->numeroplaca }}')">EDITAR DATOS</button>
        </div>
    </div>
@endforeach

@foreach($data['movil'] as $movil)
    <div id="remove-{{ $movil->numeroplaca }}" class="modal">
        <div class="modal-content">
            <h1>
                Eliminar Móvil
            </h1>
            <h6>¿Estás seguro que deseas eliminar el registro?</h6>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect" onclick="removeMovil('{{ $movil->numeroplaca }}')">ELIMINAR DATOS</button>
        </div>
    </div>
@endforeach

</body>
</html>