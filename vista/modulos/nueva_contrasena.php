<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>creacion de usuario</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="../dist/css/estilos.css">
</head>
<body>
	<main>
		
		<div class="contenedor-caja">
			<H2>Nueva contrasena</H2>
		</br>
			<form action="" method = "post" class="formulario" id="formulario">
				<!-- Grupo: Nombre -->
				
				<!-- Grupo: nombre de usaurio -->
				<div class="formulario__grupo" id="grupo__password">
					<label for="password" class="formulario__label">Contrasena</label>
					<div class="formulario__grupo-input">
						<input type="password" class="formulario__input" name="password" id="password" placeholder="Ingrese su contrasena">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">La contrasena debe contener al menos 1 letras mayusculas, minuscula, 1 numero y un caracter especial</p>
				</div>

				<!-- Grupo: Contraseña -->
				<div class="formulario__grupo" id="grupo__password2">
					<label for="password2" class="formulario__label">Confirmar contraseña</label>
					<div class="formulario__grupo-input">
						<input type="password" class="formulario__input" name="password2" id="password2" placeholder="Ingrese su contraseña">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">Las contrasenas no coinciden</p>
				</div>

				<br>
				<div class="">
                    <button type="submit" id="submit" name = "submit" class="formulario__btn">guardar cambio</button>
                    <?php
                    
                    include_once('../../controlador/ctr.NuevaContrasena.php');

                    $NuevaContrasena = new NuevaContrasena();
                    $NuevaContrasena->ctrNuevaContrasena();
                    ?>
				</div>
			</form>

		</div>
	</main>

	<!--<script src="../dist/js/formulario.js"></script>-->
	<!--<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>-->
</body>
</html>