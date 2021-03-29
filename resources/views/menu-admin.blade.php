<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="../css/menu-admin.css">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="../js/menu-admin.js"></script>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="container-fluid mh-100 min-vh-100" >
    <div class="row min-vh-100">
        <div id="login-form" class="col" style="padding: 64px">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style="display: inherit"><i class="material-icons" style="font-size: 32px; padding-left: 24px">menu</i></a>
            <h1>
                Notificaciones
            </h1>
            <div class="row">
                <div class="col s12 m6">
                    @foreach($data['viajes'] as $viaje)
                        <div class="card teal lighten-4">
                            <div class="card-content black-text">
                                <span class="card-title" style="font-family: Inter; font-weight: 800;">{{ $viaje->nombre . ' ' . $viaje->apellido }} </span>
                                <span style="font-family: Inter; font-weight: 200;">{{ $viaje->fecha }} / {{ substr($viaje->hora, 0, -3) }}</span><br>
                                <span style="font-family: Inter; font-weight: 500;">{{ $viaje->puntopartida }} - {{ $viaje->puntollegada }}</span>
                            </div>
                            <div class="card-action">
                                <button data-target="{{ $viaje->id }}" class="btn modal-trigger">AÑADIR MÓVIL</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="second-content" class="col-md">
            <img src="../assets/menu-admin.png" alt="Welcome admin" class="img-fluid" style="padding: 64px">
        </div>
    </div>
</div>
<ul id="slide-out" class="sidenav">
    <li style="margin-top: 8px"><span class="black-text name" style="padding: 0 32px; font-weight: 900;">John Doe</span></li>
    <li style="line-height: 10px; padding-bottom: 24px"><span class="black-text email" style="padding: 0 32px; font-weight: 100">jdandturk@gmail.com</span></li>
    <li><button id="edit-profile-button" class="btn waves-effect waves-light" name="action">MODIFICAR PERFIL</button></li>
    <li><button id="logout-button" class="btn waves-effect waves-light" name="action">CERRAR SESIÓN</button></li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="../servicio">Servicios</a></li>
    <li><a class="waves-effect" href="#!">Tarifas</a></li>
    <li><a class="waves-effect" href="#!">Promociones</a></li>
    <li><a class="waves-effect" href="../parada">Paradas</a></li>
    <li><a class="waves-effect" href="#!">Móviles</a></li>
    <li><a class="waves-effect" href="#!">Faltas</a></li>
    <li><a class="waves-effect" href="#!">Permisos</a></li>
</ul>

@foreach($data['viajes'] as $viaje)
    <div id={{ $viaje->id }} class="modal">
        <div class="modal-content">
            <span class="card-title" style="font-family: Inter; font-weight: 800; font-size: xx-large">{{ $viaje->nombre . ' ' . $viaje->apellido }} </span>
            <span style="font-family: Inter; font-weight: 200;">{{ $viaje->fecha }} - {{ substr($viaje->hora, 0, -3) }}</span><br>
            <span style="font-family: Inter; font-weight: 500; padding-bottom: 16px">{{ $viaje->puntopartida }} - {{ $viaje->puntollegada }}</span>
            <div class="input-field col s12">
                <select id="{{'input-' . $viaje->id}}">
                    <option value="" disabled selected>Escoge una opción</option>
                    @foreach($data['moviles'] as $movil)
                        <option value="{{ $movil->numeroplaca }}">{{ $movil->numeroplaca . ' (' . $movil->nombre . ' ' . $movil->apellido . ')'}}</option>
                    @endforeach
                </select>
                <label>Móvil</label>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect" onclick="updateCar({{ $viaje->id }})">GUARDAR CAMBIOS</button>
        </div>
    </div>
@endforeach

</body>
</html>