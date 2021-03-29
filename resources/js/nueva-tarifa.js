import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";
import {MDCSelect} from '@material/select';

document.addEventListener('DOMContentLoaded', function() {

    const axios = require('axios').default;

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const precioTextField = new MDCTextField(document.querySelector('.precio'));
    const kilometroTextField = new MDCTextField(document.querySelector('.kilometro'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));
    const select = new MDCSelect(document.querySelector('.mdc-select'));

    select.listen('MDCSelect:change', () => {
        if (select.value.length === 0) {
            document.getElementById('servicio-error').textContent = "Este campo es requerido."
        } else {
            document.getElementById('servicio-error').textContent = ""
        }
    })

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

    document.getElementById('precio').addEventListener('blur', () => {
        document.getElementById('precio-error').textContent = getPrecioErrorMessage(precioTextField.value)
    });

    document.getElementById('kilometro').addEventListener('blur', () => {
        document.getElementById('kilometro-error').textContent = getKilometroErrorMessage(kilometroTextField.value)
    });

    document.getElementById('add-tarifa-button').onclick = function () {

        const precio = precioTextField.value;
        const kilometro = kilometroTextField.value;

        let errors = 0;

        if (getPrecioErrorMessage(precio).length !== 0) {
            document.getElementById('precio-error').textContent = getPrecioErrorMessage(precio);
            errors++;
        }

        if (getKilometroErrorMessage(kilometro).length !== 0) {
            document.getElementById('kilometro-error').textContent = getKilometroErrorMessage(kilometro);
            errors++;
        }

        if (errors === 0) {

            const button = document.getElementById('add-tarifa-button');
            button.setAttribute('disabled', 'true');

            const body = {
                precio: precio,
                kilometro: kilometro,
            }

            console.log(body);

        }

    }

    function getPrecioErrorMessage(precio) {

        if (precio.length === 0) {
            return "Este campo es requerido."
        } else if(!/^[0-9]+$/.test(precio)) {
            return "Por favor, ingrese solo números."
        }

        return ""
    }

    function getKilometroErrorMessage(kilometro) {

        if (kilometro.length === 0) {
            return "Este campo es requerido."
        } else if(!/^[0-9]+$/.test(kilometro)) {
            return "Por favor, ingrese solo números."
        }

        return ""
    }

});