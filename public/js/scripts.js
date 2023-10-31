// scripts.js

const temaOscuro = () => {
    document.body.setAttribute("data-bs-theme", "dark");
    document.querySelector("#ICON").classList.remove("fa-moon");
    document.querySelector("#ICON").classList.add("fa-sun");
    document.querySelector("#modoTexto").innerText = "Modo Claro";
    document.querySelector("#modoTexto").style.color = "#ffffff"; // Cambia el color del texto a blanco
}

const temaClaro = () => {
    document.body.setAttribute("data-bs-theme", "light");
    document.querySelector("#ICON").classList.remove("fa-sun");
    document.querySelector("#ICON").classList.add("fa-moon");
    document.querySelector("#modoTexto").innerText = "Modo Oscuro";
    document.querySelector("#modoTexto").style.color = "#000000"; // Cambia el color del texto a negro
}


const cambiarTema = () => {
    if (document.body.getAttribute("data-bs-theme") === "light") {
        temaOscuro();
    } else {
        temaClaro();
    }
}

