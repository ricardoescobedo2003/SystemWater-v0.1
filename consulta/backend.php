<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "070523";
$dbname = "tierrablanca";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar la consulta
$sql = "SELECT id_cliente, nombre, direccion, telefono FROM clientes";
$result = $conn->query($sql);

// Almacenar resultados en un array
$clientes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

// Cerrar la conexión
$conn->close();

// Enviar resultados como JSON
header('Content-Type: application/json');
echo json_encode($clientes);
?>
