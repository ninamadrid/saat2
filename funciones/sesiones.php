<?php
    function usuario_autenticado(){
        if(!revisar_usuario() && !revisar_rol()){
            header('location:vista/modulos/login.php');
            exit();
        }
    }
    function revisar_usuario(){
        return isset($_SESSION['usuario']);
    }

    function revisar_rol(){
        return isset($_SESSION['rol_id']);
    }

    session_start();
    usuario_autenticado();
    ?>