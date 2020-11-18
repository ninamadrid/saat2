<?php

//Como saber si se esta conectado a la base de datos
/*if($conn->ping()){
    echo "conectado";
} else {
    echo "error de conexion";
}*/


class Login{

    public function ctrLogin(){
    //verifica que sea lo que viene mediante el metodo $_POST
    if(isset($_POST['tipo']) == 'login') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $mayuscula = strtoupper($_POST['usuario']);

        try {
            if($usuario != $mayuscula){
                //AQUI EL MENSAJE DE QUE EL USUARIO TIENE QUE SER EN LETRAS MAYUSCULAS
                $respuesta = array();
                array_push($respuesta,"Lo sentimos, el nombre de usuario debe de ser en letras mayusculas");
            } else {
                require_once("../../modelo/conexion.php");

                $stmt = $conn->prepare("SELECT id_usuario, contrasena, rol_id FROM tbl_usuarios WHERE nombre_usuario = ?; ");
                $stmt->bind_Param("s", $usuario);
                $stmt->execute();
                $stmt->bind_result($id, $password_usuario, $rol_id);

                if($stmt->affected_rows){
                    $existe = $stmt->fetch();

                    while ($stmt->fetch()) {
                        $id_usuario = $id;
                    }

                    while ($stmt->fetch()) {
                        $rol = $rol_id;
                    }

                    if($existe){

                            $stmt1 = $conn->prepare("SELECT estado_usuario FROM tbl_usuarios WHERE nombre_usuario = ? OR id_usuario = ?; ");
                            $stmt1->bind_Param("si", $usuario, $id_usuario);
                            $stmt1->execute();
                            $stmt1->bind_result($estado_usuario);

                            while ($stmt1->fetch()) {
                                $estado = $estado_usuario;
                            }
                            //Si su estado es activo pasa a comprara las contrasenas
                            if ($estado =="ACTIVO"){                     

                                if(password_verify($password, $password_usuario)){
                                    session_start();
                                    $_SESSION['usuario'] = strtolower($usuario);
                                    $_SESSION['rol_id'] = $rol;
                                    //$_SESSION['ingreso'] = $primer_ingreso;
                                    $respuesta = array(
                                    'resultado' => 'exito',
                                    'usuario' => $usuario);
        
                                    header('location:../../index.php');
                                } else {
                                    $respuesta = array();
                                    array_push($respuesta,"La contrasena o nombre de usuario son incorrectos");
                                }
                            } elseif ($estado == "BLOQUEADO"){
                                $respuesta = array();
                                array_push($respuesta,"USUARIO BLOQUEADO");
                            } elseif ($estado == "NUEVO"){
                                header("location:conf_preguntas.php");
                            }

                    } else {
                        
                        $temp ='<script> Push.create("Fundación AmiTigra",{ body:" hola ", icon: "../vista/img/logo.png ", timeout:4000,
                        onclick: function(){ window.location="/index.php";
                        this.close();}
                        }); </script>'; echo $temp;
                    }
                } else {
                    //$respuesta = array();
                    //AQUI UN MENSAJE DE ERROR
                    //array_push($respuesta,"usuario no existe");
                    $respuesta->$stmt;
                } 

                $stmt->close();
                $conn = null;
            }
                
        } catch(Exception $e) {
            die("se produjo un error". $e->getMessage());
        }
        //die(json_encode($respuesta));
    }

    }
}