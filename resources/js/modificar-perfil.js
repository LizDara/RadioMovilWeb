import {MDCRipple} from "@material/ripple";
import {MDCTextField} from '@material/textfield';
import {MDCSwitch} from '@material/switch';
import {MDCSelect} from '@material/select';
import {MDCList} from "@material/list";

document.addEventListener('DOMContentLoaded', function() {

    const axios = require('axios').default;

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;

    const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    const firstNameTextField = new MDCTextField(document.querySelector('.first-name'));
    const lastNameTextField = new MDCTextField(document.querySelector('.last-name'));
    const phoneTextField = new MDCTextField(document.querySelector('.phone'));
    const addressTextField = new MDCTextField(document.querySelector('.address'));
    const birthdateTextField = new MDCTextField(document.querySelector('.birthdate'));
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const themeControl = document.querySelector('.mdc-switch');

    const theme = document.getElementById('theme-stylesheet');

    themeControl.addEventListener('change', function () {
        if (switchControl.checked) {
            theme.href = "./css/dark/modificar-perfil.css"
        } else {
            theme.href = "./css/modificar-perfil.css"
        }
    })

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

    document.getElementById('birthdate').addEventListener('blur', () => {
        document.getElementById('birthdate-error').textContent = getBirthdateErrorMessage(birthdateTextField.value)
    });

    document.getElementById('register-button').onclick = function () {

        const firstName = firstNameTextField.value;
        const lastName = lastNameTextField.value;
        const phone = phoneTextField.value;
        const birthdate = birthdateTextField.value;
        const address = addressTextField.value;

        let errors = 0

        if (getFirstNameErrorMessage(firstName).length !== 0) {
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

        if (getBirthdateErrorMessage(birthdate).length !== 0) {
            document.getElementById('birthdate-error').textContent = getBirthdateErrorMessage(birthdate)
            errors++
        }

        if (errors === 0) {

            const button = document.getElementById('register-button');
            button.setAttribute('disabled', 'true');

            const body = {
                nombre: firstName,
                apellido: lastName,
                telefono: phone,
                fechanacimiento: birthdate,
                direccion: address,
            }

            axios.put('./perfil', body)
                .then(function (response) {
                    document.cookie = `token=${response.data.token}`
                    if (response.data.tipo === 'admin') {
                        window.location.href = './admin';
                        return
                    } else if (response.data.tipo === 'chofer') {
                        window.location.href = './chofer';
                        return
                    }
                    window.location.href = "./cliente";
                })
                .catch(function (error) {
                    document.getElementById('backend-error').textContent = error.response.data.message;
                    button.removeAttribute('disabled');
                });
        }

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

});