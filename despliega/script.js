document.addEventListener("DOMContentLoaded", function () {
    // Llamada a la función para obtener la lista de clientes al cargar la página
    obtenerClientes();
});

function obtenerClientes() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const clientes = JSON.parse(this.responseText);
            llenarListaDesplegable(clientes);
        }
    };

    xhr.open("GET", "obtener_clientes.php", true);
    xhr.send();
}
registro/script.js