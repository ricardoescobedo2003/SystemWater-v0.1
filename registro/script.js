function registrarCliente() {
    var nombre = document.getElementById("nombre").value;
    var direccion = document.getElementById("direccion").value;
    var telefono = document.getElementById("telefono").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "registrar_cliente.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
            // Puedes realizar acciones adicionales después del registro
        }
    };

    var data = "nombre=" + encodeURIComponent(nombre) +
               "&direccion=" + encodeURIComponent(direccion) +
               "&telefono=" + encodeURIComponent(telefono);

    xhr.send(data);
}
