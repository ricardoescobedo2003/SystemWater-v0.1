function guardarCliente() {
    // Obtener datos del formulario
    var nombre = document.getElementById('nombre').value;
    var direccion = document.getElementById('direccion').value;
    var telefono = document.getElementById('telefono').value;
    var localidad = document.getElementById('localidad').value;
    var mensualidad = document.getElementById('mensualidad').value;
    var comentarios = document.getElementById('comentarios').value;
    // Enviar datos a través de AJAX a PHP
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText); // Muestra la respuesta del servidor
        }
    };
    xmlhttp.open("POST", "guardar_cliente.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nombre=" + nombre + "&direccion=" + direccion + "&telefono=" + telefono + "&localidad=" + localidad + '&mensualidad=' + mensualidad + "&comentarios=" + comentarios);
}

function redireccionar() {
    // Puedes cambiar "otra_pagina.html" por la URL a la que quieres redireccionar.
    window.location.href = "/consulta/index.html";
  }
  function searchUsuario(){
    window.location.href = "/busquedaEdicion/index.html"
  }