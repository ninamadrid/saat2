<?php

    class Registro{

        public function ctrRegistro(){
            
            if(isset($_POST["submit"]) == "registro") {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $usuario = $_POST['usuario'];
                $correo = $_POST['correo'];
                $genero = $_POST['genero'];
                $telefono = $_POST['telefono'];
                $password = $_POST['password'];
                $confpassword = $_POST['password2'];

                try {

                    require_once('../../modelo/conexion.php');
                    $stmt1 = $conn->prepare("SELECT id_usuario FROM tbl_usuarios WHERE nombre_usuario = ? OR correo = ?; ");
                    $stmt1->bind_Param("ss", $usuario, $correo);
                    $stmt1->execute();
                    $stmt1->bind_Result($id);
                    
                    if($stmt1->affected_rows) {
                        $existe = $stmt1->fetch();
                        
                        if($existe) {
                            echo "El nombre de usuario y/o correo electronico ya estan registrados";
                        } else {
                            //Validacion contrasenas iguales
                            //if (comprobar_email($_POST["correo"])){
                            if ($password == $confpassword || strlen($password) < 8){

                                $validar_correo = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i";
                                if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,11}$/', $password)){
                                    echo 'la contraseña no cumple con los requisitos.';
                                    "<br>";
                                    echo 'debe contener letra mayuscula, minuscula y caracteres especiales comprendidos en !@#$%';
                                } else {
                                    if(isset($_POST["tipo"]) == "registro"){
                                        $nombre = $_POST['nombre'];
                                        $apellido = $_POST['apellido'];
                                        $usuario = $_POST['usuario'];
                                        $correo = $_POST['correo'];
                                        $genero = $_POST['genero'];
                                        $telefono = $_POST['telefono'];
                                        $password = $_POST['password'];
                                        $confpassword = $_POST['password2'];
                                        $nom_mayuscula = strtoupper($nombre);
                                        $ape_mayuscula = strtoupper($apellido);
                                        $user_mayuscula = strtoupper($usuario);
                                        
                                        if($usuario =="" || strlen($usuario) < 5){
                                            $campo = array();
                                            echo "<p class='mensaje'>";
                                            echo "Lo sentimos, no se permiten nombres de usuario con menos de cinco caracteres";
                                            echo "</p>";
                                            //echo "Debe de agregar un nombre de usuario con un mayor de 5 letras";
                                        }else{
                                            $opciones = array('cost' => 12);
                                            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                                            
                                            try {
                                                require_once('../../modelo/conexion.php');

                                                //Valor por DEFAULT
                                                $rol = 3;
                                                $token = "";
                                                $estado = "NUEVO";
                                                $preguntas = 0;
                                                $user = "ad";
                                                date_default_timezone_set("America/Tegucigalpa");
                                                $fecha = date("Y-m-d H:i:s");

                                                $stmt = $conn->prepare("INSERT INTO `tbl_usuarios` (nombre, apellido, nombre_usuario, correo,
                                                                                                    validacion_token, contrasena, genero, telefono, rol_id,
                                                                                                    estado_usuario, fecha_ult_conexion, pgts_contestadas,
                                                                                                    primer_ingreso, fecha_vencimiento, creado_por, fecha_creacion,
                                                                                                    modificado_por, fecha_modificacion) VALUES (?, ?, ?, ?, ?, ?,
                                                                                                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                                $stmt->bind_Param("sssssssiisdiddsdsd", $nom_mayuscula, $ape_mayuscula, $user_mayuscula, $correo,
                                                                                            $token, $hashed_password, $genero, $telefono, $rol, $estado,
                                                                                            $fecha, $preguntas, $fecha, $fecha, $user,
                                                                                            $fecha, $user, $fecha);
                                                $stmt->execute();
                                            
                                                if($stmt->error){
                                                    echo "<p class='mensaje error'>";
                                                    echo "Se produjo un error al momento de registrar el usuario";
                                                    echo "</p>";
                                                }else{
                                                    
                                                    echo "<p class='mensaje'>";
                                                    echo "El usuario se creo correctamente";
                                                    echo "</p>";
                                                    echo '<script>
                                                            window.location.href:login.php;
                                                        </script>';
                                                
                                                }
                                                $stmt->close();
                                                $stmt = null;
                                                                
                                            } catch(Exception $e){
                                                echo "Error:" . $e->getMessage();
                                            }//Cierre segundo TRY CATCH
                                        }
                                    } else{
                                        echo "<p>";
                                        echo "surgio un error al parecer el usuario ya existe";
                                        echo "</p>";
                                    }            
                                }
                                
                            } else {
                                echo 'Las contrasenas no coinciden';
                            }//Cierre IF que verifica si las contrasena coinciden
                        }
                       
                    } else {
                        $respuesta = array();
                        array_push($respuesta,"usuario no existe");
                        $respuesta->$stmt;
                    }
                    $stmt1->close();
                    $stmt1 = null;
                } catch(Exception $e) {
                    $respuesta = array('resultado' => 'Error');
                }
                //die(json_encode($respuesta));
            }
                //public function comprobar_email($email) {
                    //return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
                //}
        }//Fin FUNCION
    }//Fin CLASE