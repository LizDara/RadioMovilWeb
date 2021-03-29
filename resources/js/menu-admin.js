import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCSelect} from '@material/select';
import {MDCDialog} from '@material/dialog';

const axios = require('axios').default;

let addMovilDialog;
// TextFields to edit
let select;

document.addEventListener('DOMContentLoaded', function() {

    addMovilDialog = new MDCDialog(document.querySelector('.edit-dialog'));
    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    select = new MDCSelect(document.querySelector('.movil'));

    select.listen('MDCSelect:change', () => {
        if (select.value.length === 0) {
            document.getElementById('movil-error').textContent = "Este campo es requerido."
        } else {
            document.getElementById('movil-error').textContent = ""
        }
    })

    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/menu-admin.css"
        } else {
            theme.href = "./css/menu-admin.css"
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

window.openAddMovil = function (viaje) {
    viajeToEdit = viaje.id;
    document.getElementById('nombre-dialog').innerText = `${viaje.nombre} ${viaje.apellido}`;

    const dia = viaje.fecha.substring(8, 10)
    const mes = viaje.fecha.substring(5, 7);
    const year = viaje.fecha.substring(0, 4);
    const hora = viaje.hora.substring(0, 5);

    document.getElementById('fecha-hora-dialog').innerText = `${dia}/${mes}/${year} ${hora}`;
    document.getElementById('direccion-dialog').innerText = `${viaje.puntopartida} - ${viaje.puntollegada}`;

    addMovilDialog.open();
}

window.addMovil = function () {

    const id = viajeToEdit;
    const movil = select.value;

    let errors = 0;

    if (movil.length === 0) {
        document.getElementById('movil-error').textContent = "Este campo es requerido."
    } else {
        document.getElementById('movil-error').textContent = ""
    }

    if (errors === 0) {

        const body = {
            movil_numeroplaca: movil,
        }

        axios.put('./admin/movil/' + id, body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
                document.getElementById('backend-error').textContent = error.response.data.message;
            })

    }
}