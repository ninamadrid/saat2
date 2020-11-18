<?php

$server = 'localhost';
$user_name = 'root';
$pass = '';
$data_base = 'saat';

try {
$conn = new mysqli($server, $user_name, $pass, $data_base);
} catch (mysqlException $e){
    die('Error de conexion: '.$e->getMessage());
}