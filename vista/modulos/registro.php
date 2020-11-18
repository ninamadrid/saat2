<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>creacion de usuario</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="../dist/css/estilos_user.css">
</head>
<body>
	<main>
		
		<div class="contenedor-caja">
			<H2>CREACIÓN DE USUARIO</H2>
		</br>
			<form action="" class="formulario" method="POST" id="formulario">
				<!-- Grupo: Nombre -->
				<div class="formulario__grupo" id="grupo__nombre">
					<label for="nombre" class="formulario__label">Nombre</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="  Ingrese su nombre">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El nombre debe ser de 4 a 16 caracteres y solo puede contener letras mayusculas con un espacio por palabra.</p>
				</div>

				<!-- Grupo: apellido -->
				<div class="formulario__grupo" id="grupo__apellido">
					<label for="apellido" class="formulario__label">Apellido</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="apellido" id="apellido" placeholder="  Ingrese su apellido">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El apellido debe ser de 4 a 16 caracteres y solo puede contener mayusculas con un espacio por palabra</p>
				</div>

				<!-- Grupo: nombre de usaurio -->
				<div class="formulario__grupo" id="grupo__usuario">
					<label for="usuario" class="formulario__label">Nombre de Usuario</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="  Ingrese su usuario">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El apellido debe ser de 4 a 16 caracteres y solo puede contener mayusculas sin espacios</p>
				</div>

				<!-- Grupo: Correo Electronico -->
				<div class="formulario__grupo" id="grupo__correo">
					<label for="correo" class="formulario__label">Correo Electrónico</label>
					<div class="formulario__grupo-input">
						<input type="email" class="formulario__input" name="correo" id="correo" placeholder="  Ingrese su correo">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
				</div>

				<!-- Grupo: genero -->
				<div class="formulario__grupo" id="grupo__genero">
					<label for="genero" class="formulario__label">Genero</label>
					<div class="formulario__grupo-input">
						<select class="formulario__input" name="genero" id="genero" require>
							<option value="">Selecione...</option>
							<option value="m">Masculino</option>
							<option value="f">Femenino</option>
						</select>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
				</div>

				<!-- Grupo: Teléfono -->
				<div class="formulario__grupo" id="grupo__telefono">
					<label for="telefono" class="formulario__label">Teléfono</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="  ingrese su telefono">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">El telefono solo puede contener numeros y el maximo son 8 dígitos.</p>
				</div>
				
				<!-- Grupo: Contraseña -->
				<div class="formulario__grupo" id="grupo__password">
					<label for="password" class="formulario__label">Contraseña</label>
					<div class="formulario__grupo-input">
						<input type="password" class="formulario__input" name="password" id="password" placeholder="  Ingrese su contraseña">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
				</div>

				<!-- Grupo: Contraseña 2 -->
				<div class="formulario__grupo" id="grupo__password2">
					<label for="password2" class="formulario__label">Comfirmar Contraseña</label>
					<div class="formulario__grupo-input">
						<input type="password" class="formulario__input" name="password2" id="password2" placeholder="  Confirme su contraseña">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">Ambas contraseñas deben ser iguales.</p>
				</div>

				<div class="formulario__mensaje" id="formulario__mensaje">
					<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellenar todos los campos. </p>
				</div>
				<br>
				<div class="formulario__grupo formulario__grupo-btn-enviar">
					
					<!--<button type="submit" class="formulario__btn">Cancelar</button>-->
					<input type="hidden" name="tipo" value="registro">
					<button type="submit" name="submit" class="formulario__btn">Registrar</button>
					<?php
					include_once('../../controlador/ctr.registro-user.php');
					$registro = new Registro();
					$registro->ctrRegistro();			
					?>
				</div>
			</form>

		</div>
	</main>

	<script src="../dist/js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>-->
</body>
</html>