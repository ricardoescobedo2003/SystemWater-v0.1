<?php

$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "systemwater";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$localidad = $_POST['localidad'];
$mensualidad = $_POST['mensualidad'];
$comentarios = $_POST['comentarios'];
// Insertar datos en la tabla clientes
$sql = "INSERT INTO clientes (nombre, direccion, telefono, mensualidad, localidad, comentarios) VALUES ('$nombre', '$direccion', '$telefono', '$mensualidad', '$localidad', '$comentarios')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente guardado correctamente";
} else {
    echo "Error al guardar el cliente: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
