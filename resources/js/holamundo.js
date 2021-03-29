import {MDCRipple} from "@material/ripple";
import {MDCTextField} from '@material/textfield';
import {MDCSwitch} from '@material/switch';
import {MDCTextFieldHelperText} from '@material/textfield/helper-text';

document.addEventListener('DOMContentLoaded', function() {

    const axios = require('axios').default;

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const usernameTextField = new MDCTextField(document.querySelector('.username'));
    const passwordTextField = new MDCTextField(document.querySelector('.password'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    document.getElementById('email').addEventListener('blur', () => {
       document.getElementById('email-error').textContent = getEmailErrorMessage(usernameTextField.value)
    });

    document.getElementById('password').addEventListener('blur', () => {
        document.getElementById('password-error').textContent = getPasswordErrorMessage(passwordTextField.value)
    });

    document.getElementById('login-button').onclick = function () {

        const email = usernameTextField.value
        const password = passwordTextField.value

        let errors = 0

        if (getEmailErrorMessage(email).length !== 0) {
            document.getElementById('email-error').textContent = getEmailErrorMessage(email)
            errors++
        }

        if (getPasswordErrorMessage(password).length !== 0) {
            document.getElementById('password-error').textContent = getPasswordErrorMessage(password)
            errors++
        }

        if (errors === 0) {

            const button = document.getElementById('login-button');
            button.setAttribute('disabled', 'true');

            const body = {
                correo: email,
                contrasena: password,
            }

            axios.post('./login', body)
                .then(function (response) {
                    document.cookie = `token=${response.data.token}`
                    if (response.data.tipo === 'admin') {
                        window.location.href = './admin/notificacion'
                        return
                    } else if (response.data.tipo === 'chofer') {

                    }
                    window.location.href = "./cliente";
                })
                .catch(function (error) {
                    document.getElementById('backend-error').textContent = error.response.data.message;
                    button.removeAttribute('disabled');
                });
        }

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

});