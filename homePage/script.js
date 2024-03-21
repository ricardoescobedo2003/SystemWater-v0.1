function buscarPago() {
    // Obtener los datos del formulario de búsqueda
    var nombre = document.getElementById("nombre").value;

    // Realizar una petición AJAX para buscar el pago en la base de datos
    // (Debes implementar esto en tu entorno)
    // Puedes usar la función fetch para enviar los datos al servidor PHP

    fetch('buscar_pago.php?nombre=' + encodeURIComponent(nombre))
    .then(response => response.text())
    .then(data => {
        // Mostrar los resultados en el div 'resultado'
        document.getElementById("resultado").innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
