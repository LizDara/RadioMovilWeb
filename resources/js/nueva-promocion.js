import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";
import {MDCSelect} from '@material/select';
import {MDCDialog} from '@material/dialog';

const axios = require('axios').default;

let editDialog;
let removeDialog;
// TextFields to edit
let nombreEditTextField;
let fechaInicioEditTextField;
let fechaFinEditTextField;
let descuentoEditTextField;
let servicioEditSelect;

document.addEventListener('DOMContentLoaded', function() {

    editDialog = new MDCDialog(document.querySelector('.edit-dialog'));
    removeDialog = new MDCDialog(document.querySelector('.remove-dialog'));
    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const nombreTextField = new MDCTextField(document.querySelector('.nombre'));
    const fechaInicioTextField = new MDCTextField(document.querySelector('.fecha-inicio'));
    const fechaFinTextField = new MDCTextField(document.querySelector('.fecha-fin'));
    const descuentoTextField = new MDCTextField(document.querySelector('.descuento'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/nueva-promocion.css"
        } else {
            theme.href = "./css/nueva-promocion.css"
        }
    })

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

    // Initialize edit inputs
    nombreEditTextField = new MDCTextField(document.querySelector('.nombre-edit'));
    fechaInicioEditTextField = new MDCTextField(document.querySelector('.fecha-inicio-edit'));
    fechaFinEditTextField = new MDCTextField(document.querySelector('.fecha-fin-edit'));
    descuentoEditTextField = new MDCTextField(document.querySelector('.descuento-edit'));
    servicioEditSelect = new MDCSelect(document.querySelector('.servicio-edit'));

    servicioEditSelect.listen('MDCSelect:change', () => {
        if (servicioEditSelect.value.length === 0) {
            document.getElementById('servicio-error-edit').textContent = "Este campo es requerido."
        } else {
            document.getElementById('servicio-error-edit').textContent = ""
        }
    })

    document.getElementById('nombre-edit').addEventListener('blur', () => {
        document.getElementById('nombre-error-edit').textContent = getNombreErrorMessage(nombreEditTextField.value)
    });


    document.getElementById('fecha-inicio-edit').addEventListener('blur', () => {
        document.getElementById('fecha-inicio-error-edit').textContent = getFechaErrorMessage(fechaInicioEditTextField.value)
    });


    document.getElementById('fecha-fin-edit').addEventListener('blur', () => {
        document.getElementById('fecha-fin-error-edit').textContent = getFechaErrorMessage(fechaFinEditTextField.value)
    });


    document.getElementById('descuento-edit').addEventListener('blur', () => {
        document.getElementById('descuento-error-edit').textContent = getDescuentoErrorMessage(descuentoEditTextField.value)
    });

    document.getElementById('nombre').addEventListener('blur', () => {
        document.getElementById('nombre-error').textContent = getNombreErrorMessage(nombreTextField.value)
    });

    document.getElementById('fecha-inicio').addEventListener('blur', () => {
        document.getElementById('fecha-inicio-error').textContent = getFechaErrorMessage(fechaInicioTextField.value)
    });

    document.getElementById('fecha-fin').addEventListener('blur', () => {
        document.getElementById('fecha-fin-error').textContent = getFechaErrorMessage(fechaFinTextField.value)
    });

    document.getElementById('descuento').addEventListener('blur', () => {
        document.getElementById('descuento-error').textContent = getDescuentoErrorMessage(descuentoTextField.value)
    });

    document.getElementById('add-promocion-button').onclick = function () {

        const nombre = nombreTextField.value;
        const fechaInicio = fechaInicioTextField.value;
        const fechaFin = fechaFinTextField.value;
        const descuento = descuentoTextField.value;
        const servicio = select.value;

        let errors = 0;

        if (getNombreErrorMessage(nombre).length !== 0) {
            document.getElementById('nombre-error').textContent = getNombreErrorMessage(nombre);
            errors++;
        }

        if (getFechaErrorMessage(fechaInicio).length !== 0) {
            document.getElementById('fecha-inicio-error').textContent = getFechaErrorMessage(fechaInicio);
            errors++;
        }

        if (getFechaErrorMessage(fechaFin).length !== 0) {
            document.getElementById('fecha-fin-error').textContent = getFechaErrorMessage(fechaFin)
            errors++;
        }

        if (getDescuentoErrorMessage(descuento).length !== 0) {
            document.getElementById('descuento-error').textContent = getDescuentoErrorMessage(descuento);
            errors++;
        }

        if (select.value.length === 0) {
            document.getElementById('servicio-error').textContent = "Este campo es requerido."
            errors++;
        }


        if (errors === 0) {

            const button = document.getElementById('add-promocion-button');
            button.setAttribute('disabled', 'true');

            const body = {
                servicio_id: servicio,
                nombre: nombre,
                fechainicio: fechaInicio,
                fechafin: fechaFin,
                descuento: descuento,
            }

            axios.post('./promocion', body)
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

let promocionToEdit;

window.openEditDialog = function (promocion) {
    promocionToEdit = promocion.id;
    nombreEditTextField.value = promocion.nombre;
    fechaInicioEditTextField.value = promocion.fechainicio;
    fechaFinEditTextField.value = promocion.fechafin;
    descuentoEditTextField.value = promocion.descuento;
    servicioEditSelect.value = promocion.servicio_id.toString();
    editDialog.open();
}

window.editarPromocion = function () {

    const id = promocionToEdit;
    const nombre = nombreEditTextField.value;
    const fechaInicio = fechaInicioEditTextField.value;
    const fechaFin = fechaFinEditTextField.value;
    const descuento = descuentoEditTextField.value;
    const servicio = servicioEditSelect.value;

    let errors = 0;

    if (getNombreErrorMessage(nombre).length !== 0) {
        document.getElementById('nombre-error-edit').textContent = getNombreErrorMessage(nombre);
        errors++;
    }

    if (getFechaErrorMessage(fechaInicio).length !== 0) {
        document.getElementById('fecha-inicio-error-edit').textContent = getFechaErrorMessage(fechaInicio);
        errors++;
    }

    if (getFechaErrorMessage(fechaFin).length !== 0) {
        document.getElementById('fecha-fin-error-edit').textContent = getFechaErrorMessage(fechaFin);
        errors++;
    }

    if (getDescuentoErrorMessage(descuento).length !== 0) {
        document.getElementById('descuento-error-edit').textContent = getDescuentoErrorMessage(descuento);
        errors++;
    }

    if (servicio.length === 0) {
        document.getElementById('servicio-error-edit').textContent = "Este campo es requerido.";
        errors++;
    }

    if (errors === 0) {

        const body = {
            nombre: nombre,
            fechainicio: fechaInicio,
            fechafin: fechaFin,
            descuento: descuento,
            servicio_id: servicio,
        }

        axios.put('./promocion/' + id, body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error)
                document.getElementById('backend-error').textContent = error.response.data.message;
            });
    }

}

let promocionToDelete;

window.openDeleteDialog = function (promocion) {
    promocionToDelete = promocion;
    removeDialog.open();
}

window.removePromocion = function () {
    axios.delete('./promocion/' + promocionToDelete)
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

function getFechaErrorMessage(fecha) {
    if (fecha.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}

function getDescuentoErrorMessage(descuento) {

    if (descuento.length === 0) {
        return "Este campo es requerido."
    } else if(!/^[0-9]+$/.test(descuento)) {
        return "Por favor, ingrese solo números."
    }

    return ""
}