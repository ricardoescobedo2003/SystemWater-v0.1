<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "systemwater";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los nombres de clientes desde la base de datos
$query = "SELECT nombre FROM clientes";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Crear un array para almacenar los nombres de clientes
    $clientes = array();
    while($row = $result->fetch_assoc()) {
        // Agregar el nombre del cliente al array
        $clientes[] = $row["nombre"];
    }
    
    // Convertir el array a formato JSON y enviarlo al cliente
    echo json_encode($clientes);
} else {
    echo "No se encontraron clientes";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
