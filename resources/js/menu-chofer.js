import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCSelect} from '@material/select';
import {MDCDialog} from '@material/dialog';
import {MDCTextField} from "@material/textfield";

const axios = require('axios').default;

let editKilometroDialog;
// TextFields to edit
let kilometroEditTextField;

document.addEventListener('DOMContentLoaded', function() {

    editKilometroDialog = new MDCDialog(document.querySelector('.edit-dialog'));
    kilometroEditTextField = new MDCTextField(document.querySelector('.kilometro-edit'));

    document.getElementById('kilometro-edit').addEventListener('blur', () => {
        document.getElementById('kilometro-error').textContent = getKilometroErrorMessage(kilometroEditTextField.value)
    })

    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/menu-chofer.css"
        } else {
            theme.href = "./css/menu-chofer.css"
        }
    })

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

});

let viajeToEdit;

window.openEditDialog = function (viaje) {

    console.log(viaje)

    viajeToEdit = viaje.id;
    document.getElementById('nombre-dialog').innerText = `${viaje.nombrecliente} ${viaje.apellidocliente}`;

    const dia = viaje.fecha.substring(8, 10)
    const mes = viaje.fecha.substring(5, 7);
    const year = viaje.fecha.substring(0, 4);
    const hora = viaje.hora.substring(0, 5);

    document.getElementById('fecha-hora-dialog').innerText = `${dia}/${mes}/${year} ${hora}`;
    document.getElementById('direccion-dialog').innerText = `${viaje.puntopartida} - ${viaje.puntollegada}`;

    editKilometroDialog.open();
}

window.editKilometro = function () {

    const id = viajeToEdit;
    const kilometro = kilometroEditTextField.value;

    let errors = 0;

    if (getKilometroErrorMessage(kilometro).length !== 0) {
        document.getElementById('kilometro-error').textContent = getKilometroErrorMessage(kilometro);
        errors++;
    }

    if (errors === 0) {

        const body = {
            kilometro: kilometro,
        }

        axios.put('./editar-kilometro/' + id, body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
                document.getElementById('backend-error').textContent = error.response.data.message;
            })

    }
}

window.editProfileLink = function () {
    window.location.href = './perfil';
}

window.logoutLink = function () {
    console.log("Logout");
}

function getKilometroErrorMessage(kilometro) {

    if (kilometro.length === 0) {
        return "Este campo es requerido."
    } else if(!/^[0-9]+$/.test(kilometro)) {
        return "Por favor, ingrese solo números."
    }

    return ""
}