<?php

$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "systemwater";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_cliente = isset($_GET["id_cliente"]) ? intval($_GET["id_cliente"]) : 0;

    $sql = "SELECT * FROM clientes WHERE id_cliente = $id_cliente";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Cliente no encontrado.");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="stylesEdit.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/admin/index.html">Inicio</a></li>
                <li><a href="/busquedaEdicion/index.html">Buscar Usuario</a></li>
                <li><a href="/consulta/index.html">Mostrar Usuarios</a></li>
                <li><a href="/admin/index.html">Cancelar</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
            
            <table>
                <tr>
                    <td><label for="nombre">Nombre:</label></td>
                    <td><input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="direccion">Dirección:</label></td>
                    <td><input type="text" id="direccion" name="direccion" value="<?php echo $row["direccion"]; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="telefono">Teléfono:</label></td>
                    <td><input type="text" id="telefono" name="telefono" value="<?php echo $row["telefono"]; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="fechaInstalacion">Fecha de Instalación:</label></td>
                    <td><input type="date" id="fechaInstalacion" name="fechaInstalacion" value="<?php echo $row["fechaInstalacion"]; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="equipos">Equipos:</label></td>
                    <td><input type="text" id="equipos" name="equipos" value="<?php echo $row["equipos"]; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="mensualidad">Mensualidad:</label></td>
                    <td><input type="number" id="mensualidad" name="mensualidad" value="<?php echo $row["mensualidad"]; ?>" required></td>
                </tr>
            </table>

            <div class="button-container">
                <button type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>

    <script src="scripts.js"></script>
</body>
</html>

<?php
$conn->close();
?>
