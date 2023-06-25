<?php
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: pagina_error.html");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            background-color: #4e7173;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.php?logout=true" class="logout-button">Cerrar sesión</a>
        <button class="btn" onclick="window.location.href='altas.php'">Altas</button>
        <button class="btn" onclick="window.location.href='seleccion.php'">Modificaciones</button>
        <button class="btn" onclick="window.location.href='bajas.php'">Bajas</button>
        <button class="btn" onclick="window.location.href='listados.php'">Listados</button>
    </div>
</body>

</html>