import {MDCList} from "@material/list";
import {MDCSwitch} from '@material/switch';
import {MDCRipple} from '@material/ripple';

document.addEventListener('DOMContentLoaded', function() {

    const list = MDCList.attachTo(document.querySelector('.mdc-list'));
    list.wrapFocus = true;
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));

    const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
        return new MDCRipple(el);
    });

    const elements = document.getElementsByClassName("more-info-button");

    for (let i = 0; i < elements.length; i++) {

        elements[i].onclick = function () {
            window.location.href = './servicio/detalle/' + elements[i].id;
        }

    }

});