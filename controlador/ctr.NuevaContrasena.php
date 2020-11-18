<?php

    class NuevaContrasena{

        public function ctrNuevaContrasena(){
            //require_once('config/config.php');
            require_once('../../modelo/conexion.php');
            //require_once('../../funciones/gen-tkn.php');

            if(isset($_GET['eid']) && isset($_GET['tkn']) && isset($_GET['exd'])){

                //$correo = urldecode(base64_decode($_GET['eid']));
                $validacion = urldecode(base64_decode($_GET['tkn']));
                $expire_date = urldecode(base64_decode($_GET['exd']));
                            
                date_default_timezone_set("America/Tegucigalpa");
                $current_date = date("Y-m-d H:i:s");

                if($expire_date <= $current_date) {
                    echo "Lo sentimos, el enlace ya no es válido";
                } else {
                    if(isset($_POST['submit'])) {
                        $password = $_POST['password'];
                        $confpassword = $_POST['password2'];

                        if($password == $confpassword) {
                            //password validation
                        
                            //$correo = "fernandounah.rodriguez@gmail.com";
                            $stmt = $conn->prepare("SELECT id_usuario FROM tbl_usuarios WHERE validacion_token = ?;");
                            $stmt->bind_Param("s", $validacion);
                            $stmt->execute();
                            $stmt->bind_Result($id_usuario);
                            
                            //Capturar el ID del usuario al que se le enviara el correo
                            while ($stmt->fetch()) {
                                $id = $id_usuario;
                                echo $id;
                            }

                            if($stmt->affected_rows){
                                $existe = $stmt->fetch();
                                if(!$existe){
                                    $pattern_up = "/^.*(?=.{4,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
                                    if(!preg_match($pattern_up, $password)) {
                                        echo "Debe tener al menos 8 caracteres de largo, 1 mayúscula, 1 letra minúscula, 1 caracter espececial y 1 número.";
                                    } else {
                
                                        $hash_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
                                        $vacio = " ";
                                        
                                        require_once('../../modelo/conexion.php');
                                        $stmt1 = $conn->prepare("UPDATE tbl_usuarios SET contrasena = ?, validacion_token = ? WHERE id_usuario = ?;");
                                        $stmt1->bind_Param("ssi", $hash_password, $vacio, $id);
                                        $stmt1->execute();

                                        if($stmt1->error) {
                                            die("Fallo la conexion a la base de datos");
                                        } else {
                                        
                                            echo "Nueva contraseña creada correctamente";
                                            echo "<br>";
                                            
                                        }//Cierre octavo IF
                                    }//Cierre septimo IF    
                                } else {
                                    echo "fallo la conexion";
                                }//Cierre sexto IF
                            }//Cierre quinto IF
                        }else {
                            echo "no son iguales";
                        }//Cierre cuarto IF
                    }//Cierre tercer IF
                }//Cierre segundo IF
            } else {
                echo "Algo salió mal";
            }//Cierre primer IF
        }
    }