<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "systemwater";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Prevenir inyección SQL
$username = stripslashes($username);
$password = stripslashes($password);
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Consulta para verificar el usuario y la contraseña
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Usuario autenticado
    header("Location: /admin/index.html");
} else {
    // Usuario no autenticado
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>
