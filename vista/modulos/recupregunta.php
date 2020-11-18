<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>recuperar contraseña</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="../dist/css/estilos.css">
</head>
<body>
	<main>
		
		<div class="contenedor-caja-pregunta">
			<H2>RECUPERACION DE CONTRASEÑA METODO PREGUNTAS</H2>
		</br>
			<form action="recupregunta2.php" class="formulario" id="formulario">
				<!-- Grupo: pregunta -->
				<div class="formulario__grupo" id="grupo__pregunta">
					<label for="area1" class="formulario__label">Elija una pregunta:</label>
					<select class="formulario__select" id="area1" name="area1" >
						<option value="">Seleccione una pregunta</option>
						<?php
							include_once ('../../modelo/conexion.php');
	
							$stmt = "SELECT * FROM tbl_preguntas";
							$resultado = mysqli_query($conn,$stmt);
						?>
						<?php foreach($resultado as $opciones):?>
							<option value="<?php echo $opciones['pregunta']?>"><?php echo $opciones['pregunta']?></option>
						<?php endforeach;?>
					</select>
					<br><br>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="respuesta1" id="respuesta1" placeholder="  Ingrese su respuesta">  
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="msg_error">Debe de ingresar una respuesta.</p>
				</div>
				<div class="formulario__mensaje" id="formulario__mensaje">
					<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellenar todos los campos. </p>
				</div>
				<br><br>
				<div class="formulario__grupo formulario__grupo-btn-enviar">
					<button type="submit" class="formulario__btn">Cancelar</button>
					<button type="submit" class="formulario__btn">Siguiente</button>
		
				</div>
			</form>

		</div>
	</main>

</body>
</html>