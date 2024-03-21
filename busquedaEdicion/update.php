<?php

$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "systemwater";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $fechaInstalacion = $_POST["fechaInstalacion"];
    $equipos = $_POST["equipos"];
    $mensualidad = $_POST["mensualidad"];

    $sql = "UPDATE clientes SET 
            nombre = '$nombre',
            direccion = '$direccion',
            telefono = '$telefono',
            fechaInstalacion = '$fechaInstalacion',
            equipos = '$equipos',
            mensualidad = '$mensualidad'
            WHERE id_cliente = $id_cliente";

    if ($conn->query($sql) === TRUE) {
        echo "Información del cliente actualizada con éxito.";
    } else {
        echo "Error al actualizar la información del cliente: " . $conn->error;
    }
}

$conn->close();
?>
