<?php 
  //include_once('template/footer.php');

  

    class OlvideContrasena{

        public function ctrOlvideContrasena(){

            require_once('../../funciones/config_serverMail.php');
            require_once('../../funciones/gen-tkn.php');
            require_once('../../modelo/conexion.php');

            if(isset($_POST['submit'])) {
                $correo = $_POST['email'];

                //require_once('config/config.php');
                $stmt = $conn->prepare("SELECT id_usuario FROM tbl_usuarios WHERE correo = ?; ");
                $stmt->bind_param('s', $correo);
                $stmt->execute();
                $stmt->bind_Result($id_usuario);
                //$id = $stmt->bind_Result($id_usuario);

                //Capturar el ID del usuario al que se le enviara el correo
                while ($stmt->fetch()) {
                    $id = $id_usuario;
                    echo $id;
               }

                if($stmt->affected_rows) {
                    $existe = $stmt->fetch();
                    if(!$existe){
                        if(!isset($_COOKIE['_unp_'])) {
                            //$correo = $_POST['email'];
                            
                            date_default_timezone_set("America/Tegucigalpa");

                            $mail->addAddress($_POST['email']);
                            $tkn = getToken(32);
                            $encode_token = base64_encode(urlencode($tkn));
                            $email = base64_encode(urlencode($correo));
                            $expire_date = date("Y-m-d H:i:s", time() + 60 * 2);
                            $expire_date = base64_encode(urlencode($expire_date));
                            
                            //Se incluye la CONEXION
                            require_once('../../modelo/conexion.php');
                            $stmt1 = $conn->prepare("UPDATE tbl_usuarios SET validacion_token = '$tkn' WHERE id_usuario = ?;");
                            $stmt1->bind_Param('i', $id);
                            $stmt1->execute();

                            if($stmt1->error) {
                                die("error en la conexion" . mysqli_error($conn));
                            } else {
                                $mail->Subject = "Confirmacion cambio de contrasena Fundacion AMITIGRA";
                                $mail->Body = "<h4>Se solicitó recientemente cambiar la contraseña de su cuenta.</h4>
                                            <p>Si usted ha solicitado el cambio de contraseña, pulse el siguiente enlace para establecer una nueva contraseña:</p>
                                            <a href='localhost/aprendiendoPHP/saat-proyecto-amitigra/vista/modulos/nueva_contrasena.php?eid={$correo}&tkn={$encode_token}&exd={$expire_date}'>Haga clic aquí para cambiar su contraseña</a>
                                            <p>De no ser asi ignore el enlace :)</p>
                                            <p> <spam>Nota:</spam> este enlace es válido por 20 minutos.</p>";

                                if($mail->send()) {
                                    echo '<script>
                                                if (window.history.replaceState){
                                                window.history.replaceState(null, null, window.location.href);
                                                }
                                            </script>';
                                    setcookie('_unp_', getToken(16), time() + 60 * 2, '', '', '', true);
                                    echo "<div>Verifique su correo electrónico para el enlace de restablecimiento de contraseña</div>";
                                    echo $id;
                                }
                            }
                        } else {
                            echo "<div>Debe esperar al menos 20 minutos para recibir otra solicitud.</div>";
                        }
                    }else{
                    echo '<div class=""> <strong>Error!</strong> correo o nombre de usuario no encontrado</div>';
                    }
                } else {
                    echo "<div>¡Lo siento! el usuario no fue encontrado</div>";
                }
                $stmt->close();
                $stmt = null;
            }
        }
    }