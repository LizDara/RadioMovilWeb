import {MDCRipple} from "@material/ripple";
import {MDCTextField} from '@material/textfield';
import {MDCSwitch} from '@material/switch';
import {MDCSelect} from '@material/select';

document.addEventListener('DOMContentLoaded', function() {

    const axios = require('axios').default;

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const dniTextField = new MDCTextField(document.querySelector('.dni'));
    const firstNameTextField = new MDCTextField(document.querySelector('.first-name'));
    const lastNameTextField = new MDCTextField(document.querySelector('.last-name'));
    const phoneTextField = new MDCTextField(document.querySelector('.phone'));
    const addressTextField = new MDCTextField(document.querySelector('.address'));
    const emailTextField = new MDCTextField(document.querySelector('.email'));
    const passwordTextField = new MDCTextField(document.querySelector('.password'));
    const birthdateTextField = new MDCTextField(document.querySelector('.birthdate'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/registro.css"
        } else {
            theme.href = "./css/registro.css"
        }
    })

    const select = new MDCSelect(document.querySelector('.mdc-select'));

    select.listen('MDCSelect:change', () => {
        if (select.value.length === 0) {
            document.getElementById('type-error').textContent = "Este campo es requerido."
        } else {
            document.getElementById('type-error').textContent = ""
        }
    })

    document.getElementById('dni').addEventListener('blur', () => {
        document.getElementById('dni-error').textContent = getDniErrorMessage(dniTextField.value)
    });

    document.getElementById('first-name').addEventListener('blur', () => {
        document.getElementById('first-name-error').textContent = getFirstNameErrorMessage(firstNameTextField.value)
    });

    document.getElementById('last-name').addEventListener('blur', () => {
        document.getElementById('last-name-error').textContent = getLastNameErrorMessage(lastNameTextField.value)
    });

    document.getElementById('phone').addEventListener('blur', () => {
        document.getElementById('phone-error').textContent = getPhoneErrorMessage(phoneTextField.value)
    });

    document.getElementById('address').addEventListener('blur', () => {
        document.getElementById('address-error').textContent = getAddressErrorMessage(addressTextField.value)
    });

    document.getElementById('email').addEventListener('blur', () => {
        document.getElementById('email-error').textContent = getEmailErrorMessage(emailTextField.value)
    });

    document.getElementById('password').addEventListener('blur', () => {
        document.getElementById('password-error').textContent = getPasswordErrorMessage(passwordTextField.value)
    });

    document.getElementById('birthdate').addEventListener('blur', () => {
        document.getElementById('birthdate-error').textContent = getBirthdateErrorMessage(birthdateTextField.value)
    });

    document.getElementById('register-button').onclick = function () {

        const dni = dniTextField.value;
        const firstName = firstNameTextField.value;
        const lastName = lastNameTextField.value;
        const phone = phoneTextField.value;
        const type = select.value;
        const birthdate = birthdateTextField.value;
        const address = addressTextField.value;
        const email = emailTextField.value;
        const password = passwordTextField.value;

        let errors = 0

        if (getDniErrorMessage(dni).length !== 0) {
            document.getElementById('dni-error').textContent = getDniErrorMessage(dni)
            errors++
        }

        if (getFirstNameErrorMessage(password).length !== 0) {
            document.getElementById('first-name-error').textContent = getFirstNameErrorMessage(firstName)
            errors++
        }

        if (getLastNameErrorMessage(lastName).length !== 0) {
            document.getElementById('last-name-error').textContent = getLastNameErrorMessage(lastName)
            errors++
        }

        if (getAddressErrorMessage(address).length !== 0) {
            document.getElementById('address-error').textContent = getAddressErrorMessage(address)
            errors++
        }

        if (getPhoneErrorMessage(phone).length !== 0) {
            document.getElementById('phone-error').textContent = getPhoneErrorMessage(phone)
            errors++
        }

        if (type.length === 0) {
            document.getElementById('type-error').textContent = "Este campo es requerido."
            errors++
        }

        if (getBirthdateErrorMessage(birthdate).length !== 0) {
            document.getElementById('birthdate-error').textContent = getBirthdateErrorMessage(birthdate)
            errors++
        }

        if (getEmailErrorMessage(email).length !== 0) {
            document.getElementById('email-error').textContent = getEmailErrorMessage(email)
            errors++
        }

        if (getPasswordErrorMessage(password).length !== 0) {
            console.log("9")
            document.getElementById('password-error').textContent = getPasswordErrorMessage(password)
            errors++
        }

        if (errors === 0) {

            const button = document.getElementById('register-button');
            button.setAttribute('disabled', 'true');

            const body = {
                ci: dni,
                nombre: firstName,
                apellido: lastName,
                telefono: phone,
                tipo: type,
                fechanacimiento: birthdate,
                direccion: address,
                correo: email,
                contrasena: password,
                contrasena_confirmar: password
            }

            axios.post('./usuario', body)
                .then(function (response) {
                    window.location.href = "./";
                })
                .catch(function (error) {
                    document.getElementById('backend-error').textContent = error.response.data.message;
                    button.removeAttribute('disabled');
                });
        }

    }

    function getDniErrorMessage(dni) {

        if (dni.length === 0) {
            return "Este campo es requerido."
        } else if(!/^[0-9]+$/.test(dni)) {
            return "Por favor, ingrese solo números."
        }

        return ""
    }

    function getFirstNameErrorMessage(firstName) {

        if (firstName.length === 0) {
            return "Este campo es requerido."
        }

        return ""
    }

    function getLastNameErrorMessage(lastName) {

        if (lastName.length === 0) {
            return "Este campo es requerido."
        }

        return ""
    }

    function getBirthdateErrorMessage(date) {

        if (date.length === 0) {
            return "Este campo es requerido."
        }

        return ""
    }

    function getPhoneErrorMessage(phone) {

        if (phone.length === 0) {
            return "Este campo es requerido."
        } else if (isNaN(Number.parseInt(phone))) {
            return "Por favor, ingrese solo números."
        }

        return ""
    }

    function getAddressErrorMessage(address) {

        if (address.length === 0) {
            return "Este campo es requerido."
        }

        return ""
    }

    function getEmailErrorMessage(email) {
        if (email.length === 0) {
            return "Este campo es requerido."
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            return "Por favor, ingrese un correo válido."
        }

        return ""
    }

    function getPasswordErrorMessage(password) {
        if (password.length === 0) {
            return "Este campo es requerido."
        } else if (password.length <= 8) {
            return "Su contraseña debe ser mayor a 8 caracteres."
        }

        return ""
    }

    function getTypeValue(type) {
        if (type === "1") {
            return "admin"
        } else if (type === "2") {
            return "chofer"
        } else if (type === "3") {
            return "cliente"
        }

        return ""
    }

});