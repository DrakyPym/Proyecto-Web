<?php
// Conectar a la base de datos (reemplaza los valores con los de tu propia base de datos)
require_once("db.php");

// Verificar la conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Obtener los datos del formulario de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM administradores WHERE username='$username' AND password='$password'";
$result = $conex->query($sql);

session_start();
if ($result->num_rows == 1) {
    // Usuario autenticado correctamente
    $_SESSION['authenticated'] = true;
    header("Location: crud.php");
    exit();
} else {
    // Credenciales incorrectas
    echo "Nombre de usuario o contraseña incorrectos. Usuario: Draky, Contraseña: contra";
    exit();
}

$conex->close();
?>

