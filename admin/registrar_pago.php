<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "tierrablanca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$periodo = $_POST['periodo'];
$monto = $_POST['monto'];
$domicilio = $_POST['domicilio'];

$sql = "INSERT INTO pagos (nombre, periodo, monto, domicilio) VALUES ('$nombre', '$periodo', '$monto', '$domicilio')";

if ($conn->query($sql) === TRUE) {
    echo "Pago registrado correctamente";
} else {
    echo "Error al registrar el pago: " . $conn->error;
}

$conn->close();
?>
