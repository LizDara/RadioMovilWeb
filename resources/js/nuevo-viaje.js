import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";

document.addEventListener('DOMContentLoaded', function() {

    const axios = require('axios').default;

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const fechaTextField = new MDCTextField(document.querySelector('.fecha'));
    const horaTextField = new MDCTextField(document.querySelector('.hora'));
    const puntoPartidaTextField = new MDCTextField(document.querySelector('.punto-partida'));
    const puntoLlegadaTextField = new MDCTextField(document.querySelector('.punto-llegada'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

    document.getElementById('fecha').addEventListener('blur', () => {
        document.getElementById('fecha-error').textContent = getFechaErrorMessage(fechaTextField.value)
    });

    document.getElementById('hora').addEventListener('blur', () => {
        document.getElementById('hora-error').textContent = getHoraErrorMessage(horaTextField.value)
    });

    document.getElementById('punto-partida').addEventListener('blur', () => {
        document.getElementById('punto-partida-error').textContent = getPuntoPartidaErrorMessage(puntoPartidaTextField.value)
    });

    document.getElementById('punto-llegada').addEventListener('blur', () => {
        document.getElementById('punto-llegada-error').textContent = getPuntoLlegadaErrorMessage(puntoLlegadaTextField.value)
    });

    document.getElementById('add-viaje-button').onclick = function () {

        const fecha = fechaTextField.value;
        const hora = horaTextField.value;
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

            const button = document.getElementById('add-viaje-button');
            button.setAttribute('disabled', 'true');

            const body = {
                fecha: fecha,
                hora: hora,
                puntopartida: puntoPartida,
                puntollegada: puntoLlegada,
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

});