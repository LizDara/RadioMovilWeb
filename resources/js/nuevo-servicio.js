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
let descripcionEditTextField;

document.addEventListener('DOMContentLoaded', function() {

    editDialog = new MDCDialog(document.querySelector('.edit-dialog'));
    removeDialog = new MDCDialog(document.querySelector('.remove-dialog'));
    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const nombreTextField = new MDCTextField(document.querySelector('.nombre'));
    const descripcionTextField = new MDCTextField(document.querySelector('.descripcion'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/nuevo-servicio.css"
        } else {
            theme.href = "./css/nuevo-servicio.css"
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
    descripcionEditTextField = new MDCTextField(document.querySelector('.descripcion-edit'));

    document.getElementById('nombre-edit').addEventListener('blur', () => {
        document.getElementById('nombre-error-edit').textContent = getNombreErrorMessage(nombreEditTextField.value)
    });

    document.getElementById('descripcion-edit').addEventListener('blur', () => {
        document.getElementById('descripcion-error-edit').textContent = getDescripcionErrorMessage(descripcionEditTextField.value)
    });

    document.getElementById('nombre').addEventListener('blur', () => {
        document.getElementById('nombre-error').textContent = getNombreErrorMessage(nombreTextField.value)
    });

    document.getElementById('descripcion').addEventListener('blur', () => {
        document.getElementById('descripcion-error').textContent = getDescripcionErrorMessage(descripcionTextField.value)
    });

    document.getElementById('add-servicio-button').onclick = function () {

        const nombre = nombreTextField.value;
        const descripcion = descripcionTextField.value;

        let errors = 0;

        if (getNombreErrorMessage(nombre).length !== 0) {
            document.getElementById('nombre-error').textContent = getNombreErrorMessage(nombre);
            errors++;
        }

        if (getDescripcionErrorMessage(descripcion).length !== 0) {
            document.getElementById('descripcion-error').textContent = getDescripcionErrorMessage(descripcion);
            errors++;
        }

        if (errors === 0) {

            const button = document.getElementById('add-servicio-button');
            button.setAttribute('disabled', 'true');

            const body = {
                nombre: nombre,
                descripcion: descripcion,
            }

            axios.post('./servicio', body)
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

    document.getElementById('edit-profile-button').onclick = function () {
        window.location.href = './perfil'
    }

    document.getElementById('logout-button').onclick = function () {
        console.log("logout");
    }

});

let servicioToEdit;

window.openEditDialog = function (servicio) {
    servicioToEdit = servicio.id;
    nombreEditTextField.value = servicio.nombre;
    descripcionEditTextField.value = servicio.descripcion;
    editDialog.open();
}

window.editarServicio = function () {

    const id = servicioToEdit;
    const nombre = nombreEditTextField.value;
    const descripcion = descripcionEditTextField.value;

    let errors = 0;

    if (getNombreErrorMessage(nombre).length !== 0) {
        document.getElementById('nombre-error-edit').textContent = getNombreErrorMessage(nombre);
        errors++;
    }

    if (getDescripcionErrorMessage(descripcion).length !== 0) {
        document.getElementById('descripcion-error-edit').textContent = getDescripcionErrorMessage(descripcion);
        errors++;
    }

    if (errors === 0) {

        const body = {
            nombre: nombre,
            descripcion: descripcion,
        }

        axios.put('./servicio/' + id, body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
                document.getElementById('backend-error').textContent = error.response.data.message;
            })

    }
}

let servicioToDelete;

window.openDeleteDialog = function (servicio) {
    servicioToDelete = servicio;
    removeDialog.open();
}

window.removeParada = function () {
    axios.delete('./servicio/' + servicioToDelete)
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

function getDescripcionErrorMessage(descripcion) {
    if (descripcion.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}