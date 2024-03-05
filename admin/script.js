document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencia al select y al div de detalles
    var selectClientes = document.getElementById('clientes');
    var detallesCliente = document.getElementById('detalles-cliente');

    // Manejar el evento de envío del formulario
    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();

        // Obtener el valor seleccionado en el select
        var selectedCliente = selectClientes.value;

        // Hacer una petición AJAX para obtener los detalles del cliente
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Mostrar los detalles del cliente en el div correspondiente
                detallesCliente.innerHTML = xhr.responseText;
            }
        };

        // Enviar la petición al script PHP que obtiene los detalles del cliente
        xhr.open('GET', 'get_client_details.php?id=' + selectedCliente, true);
        xhr.send();
    });

    // Cargar la lista de clientes al cargar la página
    var xhrClientes = new XMLHttpRequest();
    xhrClientes.onreadystatechange = function () {
        if (xhrClientes.readyState == 4 && xhrClientes.status == 200) {
            // Llenar el select con las opciones obtenidas
            selectClientes.innerHTML = xhrClientes.responseText;
        }
    };

    // Enviar la petición al script PHP que obtiene la lista de clientes
    xhrClientes.open('GET', 'get_clients.php', true);
    xhrClientes.send();
});
