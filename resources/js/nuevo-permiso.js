import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";

document.addEventListener('DOMContentLoaded', function() {

    const axios = require('axios').default;

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const fechaInicioTextField = new MDCTextField(document.querySelector('.fecha-inicio'));
    const fechaFinTextField = new MDCTextField(document.querySelector('.fecha-fin'));
    const motivoTextField = new MDCTextField(document.querySelector('.motivo'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

    document.getElementById('fecha-inicio').addEventListener('blur', () => {
        document.getElementById('fecha-inicio-error').textContent = getFechaErrorMessage(fechaInicioTextField.value)
    });

    document.getElementById('fecha-fin').addEventListener('blur', () => {
        document.getElementById('fecha-fin-error').textContent = getFechaErrorMessage(fechaFinTextField.value)
    });

    document.getElementById('motivo').addEventListener('blur', () => {
        document.getElementById('motivo-error').textContent = getMotivoErrorMessage(motivoTextField.value)
    });

    document.getElementById('add-permiso-button').onclick = function () {

        const fechaInicio = fechaInicioTextField.value;
        const fechaFin = fechaFinTextField.value;
        const motivo = motivoTextField.value;

        let errors = 0;

        if (getFechaErrorMessage(fechaInicio).length !== 0) {
            document.getElementById('fecha-inicio-error').textContent = getFechaErrorMessage(fechaInicio);
            errors++;
        }

        if (getFechaErrorMessage(fechaFin).length !== 0) {
            document.getElementById('fecha-fin-error').textContent = getFechaErrorMessage(fechaFin);
            errors++;
        }

        if (getMotivoErrorMessage(motivo).length !== 0) {
            document.getElementById('motivo-error').textContent = getMotivoErrorMessage(motivo)
            errors++;
        }

        if (errors === 0) {

            const button = document.getElementById('add-permiso-button');
            button.setAttribute('disabled', 'true');

            const body = {
                fechainicio: fechaInicio,
                fechafin: fechaFin,
                motivo: motivo,
            }

            console.log(body);

        }

    }

    function getFechaErrorMessage(fecha) {
        if (fecha.length === 0) {
            return "Este campo es requerido."
        }

        return ""
    }

    function getMotivoErrorMessage(motivo) {
        if (motivo.length === 0) {
            return "Este campo es requerido."
        }

        return ""
    }

});