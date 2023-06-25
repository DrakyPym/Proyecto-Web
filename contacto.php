<?php
if (isset($_POST['Enviar'])) { //Verifica 
    require_once("db.php");
    $sql = $conex->prepare("INSERT INTO contacto (email,telefono,asunto,nombre,mensaje) VALUES (?, ?, ?, ?, ?)"); //Prepara la consulta
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $nombre = $_POST['nombre'];
    $mensaje = $_POST['mensaje'];

    $sql->bind_param("sssss", $email, $telefono, $asunto, $nombre, $mensaje); //Asigna los parametros

    if ($sql->execute()) { //Ejecuta la consulta
        $success_message = "Added Successfully";
    } else {
        $error_message = "Problem in Adding New Record";
    }
    $sql->close();
    $conex->close();
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 30% auto 0;
            /* Ajusta el margen superior para mover el formulario */
            background-color: black;
            padding: 20px;
            border-radius: 4px;
            border: 1px solid #fff;
            opacity: 0.8;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            background-color: #111;
            color: white;
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

        .container {
            text-align: right;
        }

        button {
            padding: 10px 20px;
            margin: 5% auto 0;
            margin-right: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
    <script src="app.js" async></script>
    <title>FIT GENERATION</title>
</head>

<body>
    <div class="head">
        <nav class="navbar">
            <a href="index.php">Inicio</a>
            <a href="#">Contacto</a>
            <a href="aboutus.html">Sobre nosotros</a>
            <a href="productos.html">Productos</a>
            <a href="#">Precio</a>
        </nav>
    </div>
    <div class="container">
        <button onclick="redirectToPage()">Administrador</button>
    </div>
    <div class="content">
        <form action="" method="POST">
            <h2>Formulario de contacto</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono"><br><br>

            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required><br><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4" cols="30" required></textarea><br><br>

            <input type="submit" value="Enviar" name="Enviar">
        </form>
    </div>
    <script>
        function redirectToPage() {
            window.location.href = "login.html";
        }
    </script>
</body>

</html>