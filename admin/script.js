// Ejecutar la función para cargar los nombres de clientes cuando se cargue la página
window.onload = function() {
    cargarClientes();
};

function cargarClientes() {
    // Realiza una petición AJAX para obtener los nombres de clientes desde PHP
    fetch('buscar_clientes.php')
    .then(response => response.json())
    .then(data => {
        // Procesar la respuesta del servidor
        const selectClientes = document.getElementById("nombre");

        // Agregar los nombres de clientes a la lista desplegable
        data.forEach(nombre => {
            const option = document.createElement("option");
            option.text = nombre;
            selectClientes.add(option);
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function registrarPago() {
    // Obtener los datos del formulario de pago
    var nombre = document.getElementById("nombre").value;
    var fecha = document.getElementById("fecha").value;
    var monto = document.getElementById("monto").value;

    // Realizar una petición AJAX para guardar los datos en la base de datos
    fetch('registrar_pago.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'nombre=' + encodeURIComponent(nombre) + '&fecha=' + encodeURIComponent(fecha) + '&monto=' + encodeURIComponent(monto),
    })
    .then(response => response.text())
    .then(data => {
        // Procesar la respuesta del servidor
        console.log(data);
        alert(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
