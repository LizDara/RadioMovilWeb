import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";
import {MDCDialog} from '@material/dialog';

const axios = require('axios').default;

let editDialog;
let removeDialog;
// TextFields to edit
let nombreEditTextField;
let direccionEditTextField;

document.addEventListener('DOMContentLoaded', function() {

    editDialog = new MDCDialog(document.querySelector('.edit-dialog'));
    removeDialog = new MDCDialog(document.querySelector('.remove-dialog'));
    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const nombreTextField = new MDCTextField(document.querySelector('.nombre'));
    const direccionTextField = new MDCTextField(document.querySelector('.direccion'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/nueva-parada.css"
        } else {
            theme.href = "./css/nueva-parada.css"
        }
    })

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

    // Initialize edit inputs
    nombreEditTextField = new MDCTextField(document.querySelector('.nombre-edit'));
    direccionEditTextField = new MDCTextField(document.querySelector('.direccion-edit'));

    document.getElementById('nombre-edit').addEventListener('blur', () => {
        document.getElementById('nombre-error-edit').textContent = getNombreErrorMessage(nombreEditTextField.value)
    });

    document.getElementById('direccion-edit').addEventListener('blur', () => {
        document.getElementById('direccion-error-edit').textContent = getDireccionErrorMessage(direccionEditTextField.value)
    });

    document.getElementById('nombre').addEventListener('blur', () => {
        document.getElementById('nombre-error').textContent = getNombreErrorMessage(nombreTextField.value)
    });

    document.getElementById('direccion').addEventListener('blur', () => {
        document.getElementById('direccion-error').textContent = getDireccionErrorMessage(direccionTextField.value)
    });

    document.getElementById('add-parada-button').onclick = function () {

        const nombre = nombreTextField.value;
        const direccion = direccionTextField.value;

        let errors = 0;

        if (getNombreErrorMessage(nombre).length !== 0) {
            document.getElementById('nombre-error').textContent = getNombreErrorMessage(nombre);
            errors++;
        }

        if (getDireccionErrorMessage(direccion).length !== 0) {
            document.getElementById('direccion-error').textContent = getDireccionErrorMessage(direccion);
            errors++;
        }

        if (errors === 0) {

            const button = document.getElementById('add-parada-button');
            button.setAttribute('disabled', 'true');

            const body = {
                nombre: nombre,
                direccion: direccion,
            }

            axios.post('./parada', body)
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

let paradaToEdit;

window.openEditDialog = function (parada) {
    paradaToEdit = parada.id;
    nombreEditTextField.value = parada.nombre;
    direccionEditTextField.value = parada.direccion;
    editDialog.open();
}

window.editarParada = function () {

    const id = paradaToEdit;
    const nombre = nombreEditTextField.value;
    const direccion = direccionEditTextField.value;

    let errors = 0;

    if (getNombreErrorMessage(nombre).length !== 0) {
        document.getElementById('nombre-error-edit').textContent = getNombreErrorMessage(nombre);
        errors++;
    }

    if (getDireccionErrorMessage(direccion).length !== 0) {
        document.getElementById('direccion-error-edit').textContent = getDireccionErrorMessage(direccion);
        errors++;
    }

    if (errors === 0) {

        const body = {
            nombre: nombre,
            direccion: direccion,
        }

        axios.put('./parada/' + id, body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
                document.getElementById('backend-error').textContent = error.response.data.message;
            })

    }
}

let paradaToDelete;

window.openDeleteDialog = function (parada) {
    paradaToDelete = parada;
    removeDialog.open();
}

window.removeParada = function () {
    axios.delete('./parada/' + paradaToDelete)
        .then(function (response) {
            location.reload()
        })
        .catch(function (error) {
            console.log(error);
        })
}


function getNombreErrorMessage(nombre) {
    if (nombre.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}

function getDireccionErrorMessage(direccion) {
    if (direccion.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}