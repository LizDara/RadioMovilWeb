import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';
import {MDCTextField} from "@material/textfield";
import {MDCSelect} from '@material/select'
import {MDCDialog} from '@material/dialog';

const axios = require('axios').default;

let editDialog;
let removeDialog;
// TextFields to edit a car
let colorEditTextField;
let marcaEditTextField;
let modeloEditTextField;
let yearEditTextField;
let tipoEditSelect;
let estadoEditTextField;
let paradaEditSelect;
let choferEditSelect;

document.addEventListener('DOMContentLoaded', function() {

    editDialog = new MDCDialog(document.querySelector('.edit-dialog'));
    removeDialog = new MDCDialog(document.querySelector('.remove-dialog'));
    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const placaTextField = new MDCTextField(document.querySelector('.placa'));
    const colorTextField = new MDCTextField(document.querySelector('.color'));
    const marcaTextField = new MDCTextField(document.querySelector('.marca'));
    const modeloTextField = new MDCTextField(document.querySelector('.modelo'));
    const yearTextField = new MDCTextField(document.querySelector('.year'));
    const estadoTextField = new MDCTextField(document.querySelector('.estado'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'))

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/nuevo-movil.css"
        } else {
            theme.href = "./css/nuevo-movil.css"
        }
    })

    const tipoSelect = new MDCSelect(document.querySelector('.tipo'));

    tipoSelect.listen('MDCSelect:change', () => {
        if (tipoSelect.value.length === 0) {
            document.getElementById('tipo-error').textContent = "Este campo es requerido."
        } else {
            document.getElementById('tipo-error').textContent = ""
        }
    })

    const paradaSelect = new MDCSelect(document.querySelector('.parada'));

    paradaSelect.listen('MDCSelect:change', () => {
        console.log(paradaSelect.value);
        if (paradaSelect.value.length === 0) {
            document.getElementById('parada-error').textContent = "Este campo es requerido."
        } else {
            document.getElementById('parada-error').textContent = ""
        }
    })

    const choferSelect = new MDCSelect(document.querySelector('.chofer'));

    choferSelect.listen('MDCSelect:change', () => {
        console.log(choferSelect.value);
        if (choferSelect.value.length === 0) {
            document.getElementById('chofer-error').textContent = "Este campo es requerido."
        } else {
            document.getElementById('chofer-error').textContent = ""
        }
    })

    // Initialize edit inputs
    colorEditTextField = new MDCTextField(document.querySelector('.color-edit'));
    marcaEditTextField = new MDCTextField(document.querySelector('.marca-edit'));
    modeloEditTextField = new MDCTextField(document.querySelector('.modelo-edit'));
    yearEditTextField = new MDCTextField(document.querySelector('.year-edit'));
    estadoEditTextField = new MDCTextField(document.querySelector('.estado-edit'));

    document.getElementById('color-edit').addEventListener('blur', () => {
        document.getElementById('color-error-edit').textContent = getColorErrorMessage(colorEditTextField.value)
    });

    document.getElementById('marca-edit').addEventListener('blur', () => {
        document.getElementById('marca-error-edit').textContent = getMarcaErrorMessage(marcaEditTextField.value)
    });

    document.getElementById('modelo-edit').addEventListener('blur', () => {
        document.getElementById('modelo-error-edit').textContent = getModeloErrorMessage(modeloEditTextField.value)
    });

    document.getElementById('year-edit').addEventListener('blur', () => {
        document.getElementById('year-error-edit').textContent = getYearErrorMessage(yearEditTextField.value)
    });

    document.getElementById('estado-edit').addEventListener('blur', () => {
        document.getElementById('estado-error-edit').textContent = getEstadoErrorMessage(estadoEditTextField.value)
    });

    tipoEditSelect = new MDCSelect(document.querySelector('.tipo-edit'));

    tipoEditSelect.listen('MDCSelect:change', () => {
        if (tipoEditSelect.value.length === 0) {
            document.getElementById('tipo-error-edit').textContent = "Este campo es requerido."
        } else {
            document.getElementById('tipo-error-edit').textContent = ""
        }
    })

    paradaEditSelect = new MDCSelect(document.querySelector('.parada-edit'));

    paradaEditSelect.listen('MDCSelect:change', () => {
        if (paradaEditSelect.value.length === 0) {
            document.getElementById('parada-error-edit').textContent = "Este campo es requerido."
        } else {
            document.getElementById('parada-error-edit').textContent = ""
        }
    })

    choferEditSelect = new MDCSelect(document.querySelector('.chofer-edit'));

    choferEditSelect.listen('MDCSelect:change', () => {
        if (choferEditSelect.value.length === 0) {
            document.getElementById('chofer-error-edit').textContent = "Este campo es requerido."
        } else {
            document.getElementById('chofer-error-edit').textContent = ""
        }
    })

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

    document.getElementById('placa').addEventListener('blur', () => {
        document.getElementById('placa-error').textContent = getPlacaErrorMessage(placaTextField.value)
    });

    document.getElementById('color').addEventListener('blur', () => {
        document.getElementById('color-error').textContent = getColorErrorMessage(colorTextField.value)
    });

    document.getElementById('marca').addEventListener('blur', () => {
        document.getElementById('marca-error').textContent = getMarcaErrorMessage(marcaTextField.value)
    });

    document.getElementById('modelo').addEventListener('blur', () => {
        document.getElementById('modelo-error').textContent = getModeloErrorMessage(modeloTextField.value)
    });

    document.getElementById('year').addEventListener('blur', () => {
        document.getElementById('year-error').textContent = getYearErrorMessage(yearTextField.value)
    });

    document.getElementById('estado').addEventListener('blur', () => {
        document.getElementById('estado-error').textContent = getEstadoErrorMessage(estadoTextField.value)
    });

    document.getElementById('add-movil-button').onclick = function () {

        const placa = placaTextField.value;
        const color = colorTextField.value;
        const marca = marcaTextField.value;
        const modelo = modeloTextField.value;
        const year = yearTextField.value;
        const estado = estadoTextField.value;
        const tipo = tipoSelect.value;
        const parada = paradaSelect.value;
        const chofer = choferSelect.value;

        let errors = 0;

        if (getPlacaErrorMessage(placa).length !== 0) {
            document.getElementById('placa-error').textContent = getPlacaErrorMessage(placa);
            errors++;
        }

        if (getColorErrorMessage(color).length !== 0) {
            document.getElementById('color-error').textContent = getColorErrorMessage(color);
            errors++;
        }

        if (getMarcaErrorMessage(marca).length !== 0) {
            document.getElementById('marca-error').textContent = getMarcaErrorMessage(marca)
            errors++;
        }

        if (getModeloErrorMessage(modelo).length !== 0) {
            document.getElementById('modelo-error').textContent = getModeloErrorMessage(modelo);
            errors++;
        }

        if (getYearErrorMessage(year).length !== 0) {
            document.getElementById('year-error').textContent = getYearErrorMessage(year)
            errors++;
        }

        if (getEstadoErrorMessage(estado).length !== 0) {
            document.getElementById('estado-error').textContent = getEstadoErrorMessage(estado);
            errors++;
        }

        if (tipo.length === 0) {
            document.getElementById('tipo-error').textContent = "Este campo es requerido.";
            errors++;
        }

        if (parada.length === 0) {
            document.getElementById('parada-error').textContent = "Este campo es requerido.";
            errors++;
        }

        if (chofer.length === 0) {
            document.getElementById('chofer-error').textContent = "Este campo es requerido.";
            errors++;
        }

        if (errors === 0) {

            const button = document.getElementById('add-movil-button');
            button.setAttribute('disabled', 'true');

            const body = {
                numeroplaca: placa,
                color: color,
                marca: marca,
                modelo: modelo,
                estado: estado,
                anho: year,
                tipo: tipo,
                parada_id: parada,
                chofer_ci: chofer,
            }

            axios.post('./movil', body)
                .then(function (response) {
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error)
                    document.getElementById('backend-error').textContent = error.response.data.message;
                    button.removeAttribute('disabled');
                });
        }

    }

    function getTipoErrorMessage(tipo) {

        if (tipo.length === 0) {
            return "Este campo es requerido"
        } else if (tipo.length > 10) {
            return "El máximo es de 10 caracteres."
        }

        return ""
    }

    function getParadaErrorMessage(parada) {

        if (parada.length === 0) {
            return "Este campo es requerido"
        }

        return ""
    }

    function getChoferErrorMessage(chofer) {

        if (chofer.length === 0) {
            return "Este campo es requerido"
        }

        return ""
    }

});

let placaToEdit;

window.openEditDialog = function (movil) {
    placaToEdit = movil.numeroplaca;
    colorEditTextField.value = movil.color;
    marcaEditTextField.value = movil.marca;
    modeloEditTextField.value = movil.modelo;
    yearEditTextField.value = movil.anho;
    estadoEditTextField.value = movil.estado;
    tipoEditSelect.value = movil.tipo;
    paradaEditSelect.value = movil.parada_id.toString();
    choferEditSelect.value = movil.chofer_ci.toString();
    editDialog.open();
}

window.editarMovil = function () {
;
    const placa = placaToEdit;
    const color = colorEditTextField.value;
    const marca = marcaEditTextField.value;
    const modelo = modeloEditTextField.value;
    const year = yearEditTextField.value;
    const estado = estadoEditTextField.value;
    const tipo = tipoEditSelect.value;
    const parada = paradaEditSelect.value;
    const chofer = choferEditSelect.value;

    let errors = 0;

    if (getColorErrorMessage(color).length !== 0) {
        document.getElementById('color-error-edit').textContent = getColorErrorMessage(color);
        errors++;
    }

    if (getMarcaErrorMessage(marca).length !== 0) {
        document.getElementById('marca-error-edit').textContent = getMarcaErrorMessage(marca)
        errors++;
    }

    if (getModeloErrorMessage(modelo).length !== 0) {
        document.getElementById('modelo-error-edit').textContent = getModeloErrorMessage(modelo);
        errors++;
    }

    if (getYearErrorMessage(year).length !== 0) {
        document.getElementById('year-error-edit').textContent = getYearErrorMessage(year)
        errors++;
    }

    if (getEstadoErrorMessage(estado).length !== 0) {
        document.getElementById('estado-error-edit').textContent = getEstadoErrorMessage(estado);
        errors++;
    }

    if (tipo.length === 0) {
        document.getElementById('tipo-error-edit').textContent = "Este campo es requerido.";
        errors++;
    }

    if (parada.length === 0) {
        document.getElementById('parada-error-edit').textContent = "Este campo es requerido.";
        errors++;
    }

    if (chofer.length === 0) {
        document.getElementById('chofer-error-edit').textContent = "Este campo es requerido.";
        errors++;
    }

    if (errors === 0) {

        const body = {
            color: color,
            marca: marca,
            modelo: modelo,
            estado: estado,
            anho: year,
            tipo: tipo,
            parada_id: parada,
            chofer_ci: chofer,
        }

        axios.put('./movil/' + placa, body)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error)
                document.getElementById('backend-error').textContent = error.response.data.message;
            });
    }

}

window.openDeleteDialog = function (placa) {
    localStorage.setItem('placa', placa);
    removeDialog.open();
}

window.removeMovil = function () {
    const placa = localStorage.getItem('placa');
    axios.delete('./movil/' + placa)
        .then(function (response) {
            location.reload();
        })
        .catch(function (error) {
            console.log(error)
        })
}

function getPlacaErrorMessage(placa) {

    if (placa.length > 7) {
        return "El máximo es de 8 caracteres."
    } else if (placa.length === 0) {
        return "Este campo es requerido."
    }

    return ""
}

function getColorErrorMessage(color) {

    if (color.length === 0) {
        return "Este campo es requerido."
    } if (color.length > 20) {
        return "El máximo es de 20 caracteres."
    }

    return ""
}

function getMarcaErrorMessage(marca) {

    if (marca.length === 0) {
        return "Este campo es requerido."
    } if (marca.length > 20) {
        return "El máximo es de 20 caracteres."
    }

    return ""
}

function getModeloErrorMessage(marca) {

    if (marca.length === 0) {
        return "Este campo es requerido."
    } if (modelo.length > 20) {
        return "El máximo es de 20 caracteres."
    }

    return ""
}

function getYearErrorMessage(year) {

    if (year.length === 0) {
        return "Este campo es requerido."
    } else if(!/^[0-9]+$/.test(year)) {
        return "Por favor, ingrese solo números."
    } else if (year.length !== 4) {
        return "El campo debe tener 4 dígitos."
    }

    return ""
}

function getEstadoErrorMessage(estado) {

    if (estado.length === 0) {
        return "Este campo es requerido."
    } if (estado.length > 20) {
        return "El máximo es de 20 caracteres."
    }

    return ""
}