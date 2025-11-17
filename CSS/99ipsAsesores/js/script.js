/* Para que se quedde algo metido arribao abajo, without sticky */

window.onload = () => {
    window.onscroll = () => {
        if (window.scroll >= 40) {
            document.querySelector('header>nav:last-child').classList.add("topFixed")
        } else { document.querySelector('header>nav:last-child').classList.remove("topFixed") }
    }
}

/* Buscar que es lo que hay mal puesto */