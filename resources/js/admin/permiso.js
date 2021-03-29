import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';

const axios = require('axios').default;

document.addEventListener('DOMContentLoaded', function() {

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/nueva-falta.css"
        } else {
            theme.href = "./css/nueva-falta.css"
        }
    })

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

});

window.aceptarPermiso = function (id) {

    const body = {
        estado: "Aceptado"
    }

    axios.put('./permiso/' + id, body)
        .then(function (response) {
            location.reload();
        })
        .catch(function (error) {
            console.log(error);
        })
}

window.rechazarPermiso = function (id) {

    const body = {
        estado: "Rechazado"
    }

    axios.put('./permiso-admin/' + id, body)
        .then(function (response) {
            location.reload();
        })
        .catch(function (error) {
            console.log(error);
        })
}