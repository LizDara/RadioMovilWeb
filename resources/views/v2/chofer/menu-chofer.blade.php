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
<link id="theme-stylesheet" rel="stylesheet" href="./css/menu-chofer.css">
<script src="./js/menu-chofer.js"></script>
<body class="home" style="display: flex; margin: 0px">
<aside class="mdc-drawer" style="height: auto">
    <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">{{ $data['usuario']->nombre }} {{ $data['usuario']->apellido }}</h3>
        <h6 class="mdc-drawer__subtitle">{{ $data['usuario']->correo }}</h6>
    </div>
    <hr class="mdc-list-divider">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a id="item-selected" class="mdc-list-item" href="./chofer">
                <span class="mdc-list-item__ripple"></span>
                <i id="item-icon-selected" class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
                <span id="item-text-selected" class="mdc-list-item__text">Inicio</span>
            </a>
            <a class="mdc-list-item" href="./permiso-chofer">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">sticky_note_2</i>
                <span class="mdc-list-item__text">Permisos</span>
            </a>
            <a class="mdc-list-item" href="./falta-chofer">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">description</i>
                <span class="mdc-list-item__text">Faltas</span>
            </a>
            <a class="mdc-list-item" href="./tarifa-chofer">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">paid</i>
                <span class="mdc-list-item__text">Tarifas</span>
            </a>
            <a class="mdc-list-item" href="./promocion-chofer">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">local_offer</i>
                <span class="mdc-list-item__text">Promociones</span>
            </a>
            <a class="mdc-list-item" href="./parada-chofer" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">place</i>
                <span class="mdc-list-item__text">Paradas</span>
            </a>
        </nav>
    </div>
    <div class="mdc-drawer__content" style="display: contents">
        <hr class="mdc-list-divider">
        <div id="theme-col" class="row align-items-center row-cols-auto" style="justify-content: center; margin-top: 24px; margin-bottom: 16px">
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
        <nav id="final-buttons" class="mdc-list">
            <button class="mdc-button mdc-button--outlined edit-profile-button" onclick="editProfileLink()">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">Modificar perfil</span>
            </button>
            <button class="mdc-button mdc-button--outlined logout-button" onclick="logoutLink()">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">Cerrar sesión</span>
            </button>
        </nav>
    </div>
</aside>
<div class="container-fluid mh-100 min-vh-100" >
    <div class="row align-items-center min-vh-100">
        <div id="login-form" class="col" style="justify-content: center; max-height: 100vh; overflow: auto">
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Viaje pendiente</h1>
            {{--Card--}}
            @if(count($data['estado']) === 0)
                <h2 style="margin-left: 24px">No tiene viajes pendientes.</h2>
            @else
                @foreach($data['estado'] as $viaje)
                    <div class="mdc-card viaje-card" style="margin: 24px">
                        <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                            {{ $viaje->nombrecliente }} {{ $viaje->apellidocliente }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 400; margin: 0px 16px 0px 16px">
                            {{ substr($viaje->fecha, 8, 2) }}/{{ substr($viaje->fecha, 5, 2) }}/{{ substr($viaje->fecha, 0, 4) }} {{ substr($viaje->hora, 0, -3) }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 700; margin: 0px 16px 0px 16px">
                            {{ $viaje->puntopartida }} - {{ $viaje->puntollegada }}
                        </div>
                        <div class="mdc-card__actions">
                            <button class="edit-card-button mdc-button mdc-card__action mdc-card__action--button" onclick="openEditDialog({{ json_encode($viaje) }})">
                                <div class="mdc-button__ripple"></div>
                                <span class="mdc-button__label">Añadir kilómetro(s)</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Faltas</h1>
            @if(count($data['falta']) === 0)
                <h2 style="margin-left: 24px">No existen faltas registradas.</h2>
            @else
                @foreach($data['falta'] as $falta)
                    <div class="mdc-card falta-card" style="margin: 24px">
                        <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                            {{ substr($falta->fecha, 8, 2) }}/{{ substr($falta->fecha, 5, 2) }}/{{ substr($falta->fecha, 0, 4) }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 400; margin: 0px 16px 32px 16px">
                            {{ $falta->motivo }}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div id="second-content" class="col-md" style="display: flex; justify-content: center; flex-direction: column; height: 100vh">
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Móvil</h1>
            @if(count($data['movil']) === 0)
                <h2 style="margin-left: 24px">No tiene móviles registrados.</h2>
            @else
                @foreach($data['movil'] as $movil)
                    <div class="mdc-card movil-card" style="margin: 24px">
                        <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                            {{ $movil->numeroplaca }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 700; margin: 0px 16px 0px 16px">
                            {{ $movil->marca }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 400; margin: 0px 16px 0px 16px">
                            {{ $movil->modelo }} {{ $movil->anho }} ({{ $movil->color }})
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 400; margin: 0px 16px 32px 16px">
                            {{ $movil->tipo }} ({{ $movil->estado }})
                        </div>
                    </div>
                @endforeach
            @endif
            <h1 style="font-size: 4rem; font-weight: 700; margin: 24px;">Permisos</h1>
            @if(count($data['permiso']) === 0)
                <h2 style="margin-left: 24px">No tiene permisos aceptados.</h2>
            @else
                @foreach($data['permiso'] as $permiso)
                    <div class="mdc-card permiso-card" style="margin: 24px">
                        <div class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                            {{ $permiso->estado }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 700; margin: 0px 16px 0px 16px">
                            Solicitado el {{ substr($permiso->fechasolicitud, 8, 2) }}/{{ substr($permiso->fechasolicitud, 5, 2) }}/{{ substr($permiso->fechasolicitud, 0, 4) }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 700; margin: 0px 16px 0px 16px">
                            Del {{ substr($permiso->fechainicio, 8, 2) }}/{{ substr($permiso->fechainicio, 5, 2) }}/{{ substr($permiso->fechainicio, 0, 4) }} al {{ substr($permiso->fechafin, 8, 2) }}/{{ substr($permiso->fechafin, 5, 2) }}/{{ substr($permiso->fechafin, 0, 4) }}
                        </div>
                        <div class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 400; margin: 0px 16px 32px 16px">
                            {{ $permiso->motivo }}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="mdc-dialog edit-dialog">
    <div class="mdc-dialog__container">
        <div class="mdc-dialog__surface"
             role="alertdialog"
             aria-modal="true"
             aria-labelledby="my-dialog-title"
             aria-describedby="my-dialog-content">
            <div class="mdc-dialog__content" id="my-dialog-content">
                <div id="login-form" class="col" style="justify-content: center">
                    <div style="max-width: 400px; margin: auto;">
                        <div id="nombre-dialog" class="card-title" style="font-size: 2rem; line-height: 2rem; font-weight: 700; margin: 16px 16px 8px 16px">
                            Diego Ilich
                        </div>
                        <div id="fecha-hora-dialog" class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 400; margin: 0px 16px 0px 16px">
                            Segundo Anillo y Avenida Centenario
                        </div>
                        <div id="direccion-dialog" class="color-text" style="font-size: 1.25rem; line-height: 2rem; font-weight: 700; margin: 0px 16px 0px 16px">
                            Sexto Anillo y Avenida Banzer
                        </div>
                        <label class="mdc-text-field mdc-text-field--outlined kilometro-edit">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label">Kilometro</span>
                            </span>
                            <span class="mdc-notched-outline__trailing"></span>
                          </span>
                            <input id="kilometro-edit" type="text" class="mdc-text-field__input" aria-labelledby="kilometro">
                            <span class="mdc-text-field__affix mdc-text-field__affix--suffix">km</span>
                        </label>
                        <span id="kilometro-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                        <span id="backend-error" class="helper-text" style="color: #F44336; text-align: left"></span>
                    </div>
                </div>
            </div>
            <div class="mdc-dialog__actions">
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="discard" onclick="editKilometro()">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Guardar cambios</span>
                </button>
            </div>
        </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
</div>
</body>
</html>