<?php
    session_start();
    //$cerrar_sesion = $_GET['cerrar_sesion'];
    if(!isset($cerrar_sesion)){
        //session_destroy();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="../../vista/dist/css/estilos.css">
</head>
<body>
	<main>
		
		<div class="contenedor-caja">
			<H2>Inicio de sesion</H2>
		</br>
			<form method="POST" action="" class="formulario" id="formulario">
				<!-- Grupo: Nombre -->
				
				<!-- Grupo: nombre de usaurio -->
				<div class="formulario__grupo" id="grupo__usuario">
					<label for="usuario" class="formulario__label">Nombre de Usuario</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="usuario" placeholder="Ingrese su usuario">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El nombre de usuario debe de contener solo letras mayusculas y mayor a 4 caracteres</p>
				</div>

				<!-- Grupo: Contraseña -->
				<div class="formulario__grupo" id="grupo__password">
					<label for="password" class="formulario__label">Contraseña</label>
					<div class="formulario__grupo-input">
						<input type="password" class="formulario__input" name="password" placeholder="Ingrese su contraseña">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
				</div>

				<br>
				<div class="">
				<input type="hidden" name="tipo" value="login">
				<button type="submit" class="formulario__btn">Iniciar sesion</button>
				<br>
				<br>
				<a class="color" href="registro.php">Registrarse</a>
				<br>
				<a class="color" href="olvide_contrasena.php">Olvide mi contrasena</a>
				</div>
				<?php
                include_once('../../controlador/ctr.login-admin.php');

                $login = new Login();
                $login->ctrLogin();

				?>
			</form>

		</div>
	</main>

	<!--<script src="vista/dist/js/formulario.js"></script>-->
	<!--<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>

</body>
</html>