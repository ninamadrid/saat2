<?php

include "../modelo/conexion.php";

$res = array( 'error' => false );
$action = '';

if ( isset( $_GET['action'] ) ) {
  $action = $_GET['action'];
}

switch($action){
    
    case 'obtenerProducto': // OBTIENE UN PRODUCTO POR NOMBRE
        $producto = $_GET['nombreProducto'];
        $sql = "SELECT 
        nombre_producto, id_producto
        FROM tbl_producto WHERE nombre_producto = '".$producto."'";
        $result = $conn->query($sql);
        $producto_db = array();
        while ( $row = $result->fetch_assoc() ) {
            array_push( $producto_db, $row );
        }
        $res['producto'] = $producto_db;
        break;

    case 'registrarProducto': // REGISTRA UN PRODUCTO
        $nombreProducto = $_POST['nombreProducto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $tipoProducto = $_POST['tipo_producto'];
        $usuario_actual = $_POST['usuario_actual'];
        $fecha = date('Y-m-d H:i:s', time());

        if (empty($_POST['nombreProducto']) || empty($_POST['cantidad']) || empty($_POST['precio']) || ((int)$_POST['tipo_producto'] > 0 &&  empty($_POST['tipo_producto']) || empty($_POST['usuario_actual']))) {
            $res['msj'] = 'Es necesario rellenar todos los campos';
            $res['error'] = true;
        } else {
            try {
                $sql = $conn->prepare("INSERT INTO tbl_producto (nombre_producto, cant_producto, precio, id_tipo_producto, creado_por,fecha_creacion, modificado_por, fecha_modificacion) VALUES (?,?,?,?,?,?,?,?)");
                $sql->bind_param("sidissss", $nombreProducto, $cantidad, $precio, $tipoProducto, $usuario_actual, $fecha, $usuario_actual, $fecha);
                $sql->execute();

                if ($sql->error) {
                    $res['msj'] = "Se produjo un error al momento de registrar el producto";
                    $res['error'] = true;
                } else {
                    $res['msj'] = "Producto Registrado Correctamente";
                }
                // $sql->close();
                // $sql = null;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        
        case 'obtenerProductos':
            try {								
                $sql = "SELECT nombre_articulo,existencia, costo, fecha_entrada FROM tbl_inventario";
                $resultado = $conn->query($sql);
                
                
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        break;
        case 'eliminarProducto':
            if(isset($_POST['id_inventario'])){
                $id_inventario = $_POST['id_inventario'];
                $sql = "UPDATE tbl_inventario SET estado = 0 WHERE id_inventario = ".$id_inventario;
                $resultado = $conn->query($sql);
                if ($resultado == 1) {
                    $res['msj'] = "Producto Eliminado  Correctamente";
                } else {
                    $res['msj'] = "Se produjo un error al momento de eliminar el producto";
                    $res['error'] = true;
                }
                
            }else{
                $res['msj'] = "No se envió el id del producto a eliminar";
                $res['error'] = true;
            }
        break;
        case 'actualizarProducto':
            if(  isset($_POST['id_inventario'])
                && isset($_POST['nombre_inventario']) && isset($_POST['existencia']) && isset($_POST['costo'])
            ){
               $id_inventario = $_POST['id_inventario'];
                $nombreP = $_POST['nombre_inventario'];
                $existenciaP = $_POST['existencia'];
                $costoP = $_POST['costo'];
                //echo ($id_inventario);
                $sql = "UPDATE tbl_inventario 
                        SET nombre_articulo='$nombreP', existencia=$existenciaP, costo=$costoP
                        WHERE id_inventario=".$id_inventario;
                $resultado = $conn->query($sql);
                
                if ($resultado == 1) {
                    $res['msj'] = "Producto Edito  Correctamente";
                } else {
                    $res['msj'] = "Se produjo un error al momento de Editar el producto ";
                    $res['error'] = true;
                }
                
            }else{
                //print_r($id_inventario);
                $res['msj'] = "Las variables no estan definidas";
                $res['error'] = true;
                
            }
            
        break;
        
        default:
        break;
}

$conn->close();
header( 'Content-Type: application/json' );
//echo $res['solicitudes'][0]['NombrePractica'];
echo json_encode($res);