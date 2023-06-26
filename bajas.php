<?php
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: pagina_error.html");
    exit();
}
?>

<?php
// Establecer la conexión a la base de datos
require_once("db.php");

// Eliminar un registro si se ha proporcionado un ID de registro válido
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM contacto WHERE id = $delete_id";
    if ($conex->query($sql_delete) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $conex->error;
    }
}

// Obtener todos los registros de la tabla contacto
$sql_select = "SELECT * FROM contacto";
$result = $conex->query($sql_select);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut Icon" type="image/x-icon" href="icono.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="app.js" async></script>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .custom-hr {
            border: none;
            height: 1px;
            background-color: #fff;
            /* Cambia este valor al color deseado */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .record-container {
            background-color: #111;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .record-container p {
            margin: 0;
            padding: 5px 0;
        }

        .delete-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .lista {
            margin-top: 1%;
        }

        .logout-button {
            display: inline-block;
            padding: 10px 10px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .container {
            display: flex;
            justify-content: right;
            align-items: flex-start;
            margin-top: 7%;
            margin-right: 5%;
            /* Ajusta el margen superior según tus necesidades */
        }

        button {
            margin-top: 2%;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="head">
        <nav class="navbar">
            <a href="index.php">Inicio</a>
            <a href="contacto.php">Contacto</a>
            <a href="aboutus.html">Sobre nosotros</a>
            <a href="productos.html">Productos</a>
            <a href="blog.html">Blog</a>
            <a href="#">Precio</a>
        </nav>
    </div>
    <div class="container">
        <a href="index.php?logout=true" class="logout-button">Cerrar sesión</a>
    </div>
    <button onclick="redirectToPage()">Regresar</button>
    <div class="lista">
        <h1>Lista de Registros</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>ID: " . $row['id'] . "</p>";
                echo "<p>Email: " . $row['email'] . "</p>";
                echo "<p>Teléfono: " . $row['telefono'] . "</p>";
                echo "<p>Asunto: " . $row['asunto'] . "</p>";
                echo "<p>Nombre: " . $row['nombre'] . "</p>";
                echo "<p>Mensaje: " . $row['mensaje'] . "</p>";
                echo "<form action='' method='GET'>";
                echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                echo "<input type='submit' value='Eliminar'>";
                echo "</form>";
                echo "<div class='custom-hr'></div>";
            }
        } else {
            echo "No se encontraron registros.";
        }
        ?>
        
    </div>
    <script> 
        function redirectToPage() {
            window.location.href = "crud.php";
        }
    </script>
</body>

</html>

<?php
// Cerrar la conexión a la base de datos
$conex->close();
?>