import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";
import {MDCSelect} from '@material/select';
import {MDCDialog} from '@material/dialog';

const axios = require('axios').default;

let editDialog;
let removeDialog;
// Textfields to edit
let fechaEditTextField;
let motivoEditTextField;
let choferEditSelect;

document.addEventListener('DOMContentLoaded', function() {

    editDialog = new MDCDialog(document.querySelector('.edit-dialog'));
    removeDialog = new MDCDialog(document.querySelector('.remove-dialog'));
    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const fechaTextField = new MDCTextField(document.querySelector('.fecha'));
    const motivoTextField = new MDCTextField(document.querySelector('.motivo'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));
    const select = new MDCSelect(document.querySelector('.chofer'));

    select.listen('MDCSelect:change', () => {
        if (select.value.length === 0) {
            document.getElementById('chofer-error').textContent = "Este campo es requerido."
        } else {
            document.getElementById('chofer-error').textContent = ""
        }
    })

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

    // Initialize edit inputs
    fechaEditTextField = new MDCTextField(document.querySelector('.fecha-edit'));
    motivoEditTextField = new MDCTextField(document.querySelector('.motivo-edit'));
    choferEditSelect = new MDCSelect(document.querySelector('.chofer-edit'));

    document.getElementById('fecha-edit').addEventListener('blur', () => {
        document.getElementById('fecha-error-edit').textContent = getFechaErrorMessage(fechaEditTextField.value)
    });

    document.getElementById('motivo-edit').addEventListener('blur', () => {
        document.getElementById('motivo-error-edit').textContent = getMotivoErrorMessage(motivoEditTextField.value)
    });

    choferEditSelect.listen('MDCSelect:change', () => {
        if (choferEditSelect.value.length === 0) {
            document.getElementById('chofer-error-edit').textContent = "Este campo es requerido."
        } else {
            document.getElementById('chofer-error-edit').textContent = ""
        }
    })

    document.getElementById('fecha').addEventListener('blur', () => {
        document.getElementById('fecha-error').textContent = getFechaErrorMessage(fechaTextField.value)
    });

    document.getElementById('motivo').addEventListener('blur', () => {
        document.getElementById('motivo-error').textContent = getMotivoErrorMessage(motivoTextField.value)
    });

    document.getElementById('add-falta-button').onclick = function () {

        const fecha = fechaTextField.value;
        const motivo = motivoTextField.value;
        const chofer = select.value;

        let errors = 0;

        if (getFechaErrorMessage(fecha).length !== 0) {
            document.getElementById('fecha-error').textContent = getFechaErrorMessage(fecha);
            errors++;
        }

        if (getMotivoErrorMessage(motivo).length !== 0) {
            document.getElementById('motivo-error').textContent = getMotivoErrorMessage(motivo);
            errors++;
        }

        if (chofer.length === 0) {
            document.getElementById('chofer-error').textContent = "Este campo es requerido.";
            errors++;
        }

        if (errors === 0) {

            const button = document.getElementById('add-falta-button');
            button.setAttribute('disabled', 'true');

            const body = {
                fecha: fecha,
                motivo: motivo,
                chofer_ci: chofer,
            }

            axios.post('./falta', body)
                .then(function (response) {
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                    document.getElementById('backend-error').textContent = error.response.data.message;
                    button.removeAttribute('disabled');
                })

        }

    }

});

let faltaToEdit;

window.openEditDialog = function (falta) {
    faltaToEdit = falta.id;
    fechaEditTextField.value = falta.fecha;
    motivoEditTextField.value = falta.motivo;
    choferEditSelect.value = falta.chofer_ci.toString();
    editDialog.open();
}

window.editarFalta = function () {

    const id = faltaToEdit;
    const fecha = fechaEditTextField.value;
    const motivo = motivoEditTextField.value;
    const chofer = choferEditSelect.value;

    let errors = 0;

    if (getFechaErrorMessage(fecha).length !== 0) {
        document.getElementById('nombre-error-edit').textContent = getNombreErrorMessage(nombre);
        errors++;
    }

    if (getMotivoErrorMessage(motivo).length !== 0) {
        document.getElementById('direccion-error-edit').textContent = getDireccionErrorMessage(direccion);
        errors++;
    }

    if (chofer.length === 0) {
        document.getElementById('chofer-error-edit').textContent = "Este campo es requerido.";
        errors++;
    }

    if (errors === 0) {

        const body = {
            fecha: fecha,
            motivo: motivo,
            chofer_ci: chofer,
        }

        axios.put('./falta/' + id, body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
                document.getElementById('backend-error').textContent = error.response.data.message;
            })

    }
}

let faltaToDelete;

window.openDeleteDialog = function (falta) {
    faltaToDelete = falta;
    removeDialog.open();
}

window.removeFalta = function () {
    axios.delete('./falta/' + faltaToDelete)
        .then(function (response) {
            location.reload()
        })
        .catch(function (error) {
            console.log(error);
        })
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