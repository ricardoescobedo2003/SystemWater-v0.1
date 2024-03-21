<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "systemwater";

// Establecer conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener el nombre del cliente desde la solicitud AJAX
$clientName = $_GET['clientName'];

// Consulta SQL para obtener el pago más reciente del cliente
$query = "SELECT nombre, fecha, monto FROM pagos WHERE nombre = ? ORDER BY fecha DESC LIMIT 1";

// Preparar la consulta
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $clientName);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar resultados en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Fecha</th><th>Monto</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td>" . $row["monto"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron pagos para el cliente: " . $clientName;
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conn->close();
?>
