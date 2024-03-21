function buscarUsuario() {
    const nombre = document.getElementById("nombre").value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "search.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("resultContainer").innerHTML = xhr.responseText;
        }
    };

    xhr.send("nombre=" + nombre);
}


function busquedaLocalidad() {
    const localidad = document.getElementById("localidad").value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "searchLocalidad.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("resultContainer").innerHTML = xhr.responseText;
        }
    };

    xhr.send("localidad=" + localidad);
}


function eliminarUsuario(id_cliente) {
    const confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
    
    if (confirmacion) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                // Puedes recargar la página o realizar otras acciones después de la eliminación
            }
        };

        xhr.send("id_cliente=" + id_cliente);
    }
}

function editarUsuario(id_cliente) {
    window.location.href = "edit.php?id_cliente=" + id_cliente; // Corregido a id_cliente
}
