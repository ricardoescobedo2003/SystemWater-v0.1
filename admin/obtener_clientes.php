<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "tierrablanca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_cliente, nombre FROM clientes";
$result = $conn->query($sql);

$clientes = array();
while ($row = $result->fetch_assoc()) {
    $clientes[] = $row;
}

$conn->close();

echo json_encode($clientes);
?>
