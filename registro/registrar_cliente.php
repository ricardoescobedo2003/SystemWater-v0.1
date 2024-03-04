<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "tierrablanca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

$sql = "INSERT INTO clientes (nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente registrado correctamente";
} else {
    echo "Error al registrar el cliente: " . $conn->error;
}

$conn->close();
?>
