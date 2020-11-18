<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Olvide contrasena</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="../dist/css/estilos.css">
</head>
<body>
	<main>
		
		<div class="contenedor-correo">
			<H2>Ingrese su correo electronico</H2>
		</br>
			<form action="" method="post" class="formulario">

				<!-- Grupo: Correo Electronico -->
				<div class="formulario__grupo" id="grupo__correo">
					<label for="email" class="formulario__label">Correo Electrónico</label>
					<div class="formulario__grupo-input">
						<input type="email" class="formulario__input" name="email" id="email" placeholder="  Ingrese su correo">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
				</div>

				<br>
				<div class="formulario__grupo formulario__grupo-btn-enviar">
					<button type="submit" id="submit" name="submit" class="formulario__btn">Enviar correo</button>
                    <?php
					
					include_once('../../controlador/ctr.olvideContrasena.php');

					$olvideContrasena = new OlvideContrasena();
					$olvideContrasena->ctrOlvideContrasena();
                    
                    ?>
				</div>
			</form>

		</div>
	</main>

	<!--<script src="../dist/js/formulario.js"></script>-->
	<!--<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>-->
</body>
</html>