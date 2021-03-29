import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";

const axios = require('axios').default;

document.addEventListener('DOMContentLoaded', function() {

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/chofer/falta.css"
        } else {
            theme.href = "./css/chofer/falta.css"
        }
    })

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

});

window.perfilLink = function () {
    window.location.href = './perfil';
}

window.logoutLink = function () {
    console.log("Logout")
}