<?php 
try{
    $idProducto = 0;
    $nombreP ="";
    $cantidadP=0;
    $precioP=0;
    $tipoProducto=0;
    if( isset($_POST['idProducto']) && !empty($_POST['idProducto'])){
        $idProducto = $_POST['idProducto'];
    }
        if ($idProducto == 0){

                if((isset($_POST['nombreProducto']) && !empty($_POST['nombreProducto'])) &&
                (isset($_POST['cantidad']) && !empty($_POST['cantidad'])) && (isset($_POST['precio']) && !empty($_POST['precio'])) && 
                (isset($_POST['tipo_producto']) && !empty($_POST['tipo_producto']))){
                    $nombreProducto = $_POST['nombreProducto'];
                    $cantidad = $_POST['cantidad'];
                    $precio = $_POST['precio'];
                    $tipoProducto = 1;//$_POST['tipo_producto'];
                    $usuario_actual = $_POST['usuario_actual'];
                    $fecha=date('Y-m-d H:i:s',time());

                    if(empty($_POST['nombreProducto']) || empty($_POST['cantidad']) || empty($_POST['precio']) || ((int)$_POST['tipo_producto'] > 0 &&  empty($_POST['tipo_producto']) ||empty($_POST['usuario_actual'])) ){
                            
                        $alert='<p class=" msg_error"> Todos los campos son obligatorios. </p>';
                    }else{                              
                            include "./modelo/conexion.php"; 
                                
                            $sql=$conn->prepare("INSERT INTO tbl_producto (nombre_producto, cant_producto, precio, id_tipo_producto, creado_por,fecha_creacion, modificado_por, fecha_modificacion) VALUES (?,?,?,?,?,?,?,?);");
                            $sql->bind_param("sidissss",$nombre,$cant,$pre,$tipo,$usuario_actual,$fecha,$usuario_actual,$fecha);
                            $sql->execute();
                                                                
                        if($sql->error){
                                echo "<p class='mensaje error'>";
                                echo "Se produjo un error al momento de registrar el producto"; echo "</p>";
                            }else{                                  
                                echo "<p class='mensaje'>";
                                echo "El producto se agrego correctamente";
                                echo "</p>";
                            }       
                    // $sql-
                    
                
                }
        }else{
            

        }
    
   
}
}catch (Exception $e) {
    echo $e->getMessage();
}