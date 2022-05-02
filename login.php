<?php session_start(); ?>
<html>
	<head>
		<title>Formulario de Registro</title>
	</head>
	<body>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Login</h2>

		<form role="form" name="login" action="app/login.php" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario o email</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
			<br>
			Mantener sesion iniciada<input type="checkbox" name="mantener_sesion_abierta" value="si"><br>
		  </div>

		  <button type="submit" class="btn btn-primary">Acceder</button>
		</form>
</div>
</div>
</div>
		<script src="JS/Scripts/validar/login/valida_login.js"></script>
	</body>
</html>