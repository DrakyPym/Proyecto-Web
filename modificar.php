<?php

session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: pagina_error.html");
    exit();
}

require_once("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza la consulta para obtener los datos del registro específico
    $sql = "SELECT * FROM contacto WHERE id = $id";
    $result = $conex->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $telefono = $row['telefono'];
        $asunto = $row['asunto'];
        $nombre = $row['nombre'];
        $mensaje = $row['mensaje'];

        // Procesa el formulario de modificación
        if (isset($_POST['modificar'])) {
            $newEmail = $_POST['email'];
            $newTelefono = $_POST['telefono'];
            $newAsunto = $_POST['asunto'];
            $newNombre = $_POST['nombre'];
            $newMensaje = $_POST['mensaje'];

            // Realiza la consulta para actualizar los datos
            $updateSql = "UPDATE contacto SET email = '$newEmail', telefono = '$newTelefono', asunto = '$newAsunto', nombre = '$newNombre', mensaje = '$newMensaje' WHERE id = $id";
            if ($conex->query($updateSql) === TRUE) {
                header("Location: crud.php");
                exit();
            } else {
                echo "Error al actualizar el registro: " . $conex->error;
            }
        }
    } else {
        echo "No se encontró el registro.";
    }
} else {
    echo "ID no proporcionado.";
}
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
    <title>Modificar Datos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 1% auto 0;
            /* Ajusta el margen superior para mover el formulario */
            background-color: #282828;
            padding: 20px;
            border-radius: 4px;
            border: 1px solid #fff;
            opacity: 0.8;
        }

        .custom-hr {
            border: none;
            height: 1px;
            background-color: #fff;
            /* Cambia este valor al color deseado */
            margin-top: 20px;
            margin-bottom: 20px;
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
    </style>
</head>

<body>
    <div class="head">
        <nav class="navbar">
            <a href="index.php">Inicio</a>
            <a href="contacto.php">Contacto</a>
            <a href="aboutus.html">Sobre nosotros</a>
            <a href="productos.html">Productos</a>
            <a href="#">Precio</a>
        </nav>
    </div>
    <div class="container">
        <a href="index.php?logout=true" class="logout-button">Cerrar sesión</a>
    </div>
    <button onclick="redirectToPage()">Regresar</button>
    <form action="" method="POST">
        <h2>Modificar datos</h2> <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo $telefono; ?>"><br><br>

        <label for="asunto">Asunto:</label>
        <input type="text" id="asunto" name="asunto" value="<?php echo $asunto; ?>" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="30" required><?php echo $mensaje; ?></textarea><br><br>

        <input type="submit" value="Modificar" name="modificar">
    </form>
    <script>
        function redirectToPage() {
            window.location.href = "modificaciones.php";
        }
    </script>
</body>

</html>