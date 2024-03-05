<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "dni", "MinuzaFea265/", "tierrablanca");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener la lista de clientes
$query = "SELECT id_cliente, nombre FROM clientes";
$resultado = $conexion->query($query);

// Construir la lista de opciones para el select
$options = "";
while ($fila = $resultado->fetch_assoc()) {
    $options .= "<option value='{$fila['id_cliente']}'>{$fila['nombre']}</option>";
}

// Cerrar la conexión
$conexion->close();

// Enviar la lista de opciones al cliente
echo $options;
?>
