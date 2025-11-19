//ejecutando al final de que se cargue la pagina
window.onload = () => {
    //Para visualizar el cambio en el ragne
    document.getElementById("rangoINput").onchange = (event) => {
        console.log(event.target.value);
        document.getElementById("rangoOutput").value = event.target.value
    }

    //Para coger la url de donde se envia el form
    document.getElementById('location').value = location

    //Minicalculadora
    document.getElementById('calcular').onclick = () => { document.getElementById('resultado').value = document.getElementById('operando1').value * document.getElementById('operando2').value }
}