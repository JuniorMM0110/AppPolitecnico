<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cabecera fija</title>

        <link rel="stylesheet" href="../CSS/styles.css">
</head>

<?php session_start(); ?>

<body>
	
	<header id="main-header">
		
		<a id="logo-header" href="#">
			<span class="site-name">Pagina de ventas</span>
		</a> <!-- / #logo-header -->

		<nav class="nav">
			<ul>
				<li><a href="#">Inicio</a></li>
				<li><a href="<?php unset($_SESSION['iniciado']); ?>">Cerrar sesión</a></li>
				<li><a href="#">Opciones</a></li>
			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->

	
	
</body>
</html>