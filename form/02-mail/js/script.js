//Haciendoq eu al aceptar los terminos se habilite el boton de enviar
let checkbox;
let submit;
window.onload = () => {
    checkbox = document.querySelector('input[type="checkbox"]');
    submit = document.querySelector('input[type="submit"]');

    checkbox.onchange = () => {
        console.log("estado del checkbox: " + checkbox.checked);
        submit.disabled = !checkbox.checked
    }

}