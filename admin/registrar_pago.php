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

// Obtener los datos del formulario de pago
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$monto = $_POST['monto'];
// $concepto = $_POST['concepto']; // Comentado porque el campo no existe en el formulario

// Realizar la inserción en la tabla pagos
$query = "INSERT INTO pagos (nombre, fecha, monto) VALUES ('$nombre', '$fecha', '$monto')";

if ($conn->query($query) === TRUE) {
    echo "Pago registrado con éxito";
} else {
    echo "Error al registrar el pago: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
