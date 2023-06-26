<?php
session_start();

// Cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="font" href="FjallaOne-Regular.ttf">
	<link rel="Shortcut Icon" type="image/x-icon" href="icono.png" />
	 <link rel="stylesheet" href="style.css">
	<title>FIT GENERATION</title>
</head>
<body>
	<header class="header">
        <div class="head">
	<nav class="navbar">
            <a href="index.php">Inicio</a>
            <a href="contacto.php">Contacto</a>
            <a href="aboutus.html">Sobre nosotros</a>
            <a href="productos.html">Productos</a>
            <a href="blog.html">Blog</a>
            <a href="#">Precio</a>
        </nav>
       <a href="contacto.php"><img class="carrito" src="carrito-de-compras.png" alt="carrito" ></a>
    </div>    

	
		<div class="titulo1">
			<h1>FIT GENERATION</h1>	
		</div>
		<div class="titulo2">
			<p>PARA LOS JOVENES QUE QUIEREN PONERSE MAMADOS EN UN DIA</p>
		</div>
	</header>		
	

	<section class="buttons">
      <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
      <a href="https://twitter.com/home" class="fa fa-twitter"></a>
      <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
    </section>
    

</body>
</html>