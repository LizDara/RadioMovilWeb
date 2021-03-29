import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCDialog} from '@material/dialog';
import {MDCTextField} from "@material/textfield";

const axios = require('axios').default;

let editDialog;
// TextFields to edit
let fechaTextField;
let horaTextField;
let puntoPartidaTextField;
let puntoLlegadaTextField;

document.addEventListener('DOMContentLoaded', function() {

    editDialog = new MDCDialog(document.querySelector('.edit-dialog'));

    fechaTextField = new MDCTextField(document.querySelector('.fecha'));
    horaTextField = new MDCTextField(document.querySelector('.hora'));
    puntoPartidaTextField = new MDCTextField(document.querySelector('.punto-partida'));
    puntoLlegadaTextField = new MDCTextField(document.querySelector('.punto-llegada'));

    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/cliente/menu-cliente.css"
        } else {
            theme.href = "./css/cliente/menu-cliente.css"
        }
    })

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

});

let servicioToEdit;

window.loadService = function (id) {
    servicioToEdit = id;
    editDialog.open();
}

window.editarServicio = function () {

    const id = servicioToEdit;
    const fecha = fechaTextField.value;
    const hora = horaTextField.value + ":00";
    const puntoPartida = puntoPartidaTextField.value;
    const puntoLlegada = puntoLlegadaTextField.value;

    let errors = 0;

    if (getFechaErrorMessage(fecha).length !== 0) {
        document.getElementById('fecha-error').textContent = getFechaErrorMessage(fecha);
        errors++;
    }

    if (getHoraErrorMessage(hora).length !== 0) {
        document.getElementById('hora-error').textContent = getHoraErrorMessage(hora);
        errors++;
    }

    if (getPuntoPartidaErrorMessage(puntoPartida).length !== 0) {
        document.getElementById('punto-partida-error').textContent = getPuntoPartidaErrorMessage(puntoPartida)
        errors++;
    }

    if (getPuntoLlegadaErrorMessage(puntoLlegada).length !== 0) {
        document.getElementById('punto-llegada-error').textContent = getPuntoLlegadaErrorMessage(puntoLlegada);
        errors++;
    }

    if (errors === 0) {

        const body = {
            servicio_id: id,
            fecha: fecha,
            hora: hora,
            puntopartida: puntoPartida,
            puntollegada: puntoLlegada,
        }

        axios.post('./viaje', body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
                document.getElementById('backend-error').textContent = error.response.data.message;
            })

    }
}

function getFechaErrorMessage(fecha) {
    if (fecha.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}

function getHoraErrorMessage(hora) {
    if (hora.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}

function getPuntoPartidaErrorMessage(puntoPartida) {
    if (puntoPartida.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}

function getPuntoLlegadaErrorMessage(puntoLlegada) {
    if (puntoLlegada.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}

window.editProfileLink = function () {
    window.location.href = './perfil';
}

window.logoutLink = function () {
    console.log("Cerrando session")
}