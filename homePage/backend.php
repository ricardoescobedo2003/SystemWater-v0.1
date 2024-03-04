<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "tierrablanca";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre de usuario de la solicitud
$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';

// Realizar la consulta con el nombre de usuario proporcionado
$sql = "SELECT id_pago, nombre, periodo, monto, domicilio FROM pagos WHERE nombre = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("s", $usuario);
$stmt->execute();

if ($stmt->error) {
    die("Error en la ejecución de la consulta: " . $stmt->error);
}

$result = $stmt->get_result();

// Almacenar resultados en un array
$pagos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pagos[] = $row;
    }
}

// Cerrar la conexión
$stmt->close();
$conn->close();

// Enviar resultados como JSON
header('Content-Type: application/json');
echo json_encode($pagos);
?>
