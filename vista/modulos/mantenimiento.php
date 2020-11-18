<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Gestion de usuario</h3>

          <!-- /.box-header -->
          <div class="box-body">

            <a href="nuevo-registrado.php" class="btn btn-success">Añadir Nuevo</a>
            <table id="registros" class="table table-bordered table-hover">
                <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha Registro</th>
                            <th>Articulos</th>
                            <th>Talleres</th>
                            <th>Regalo</th>
                            <th>Compra</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>

                <?php
                  try {
                    $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                    $sql .= "  JOIN regalos ";
                    $sql .= " ON registrados.regalo = regalos.ID_regalo ";
                    $resultado = $conn->query($sql);
                  } catch (Exception $e) {
                    $error = $e->getMessage();
                  }
                 while( $registrado = $resultado->fetch_assoc() ) { ?>
                    <tr>
                            <td>
                                <?php echo $registrado['nombre_registrado'] . " " . $registrado['apellido_registrado']; 
                                      $pagado = $registrado['pagado'];
                                      if($pagado):
                                           echo '<span class="badge bg-green">Pagado</span>';
                                      else:
                                            echo '<span class="badge bg-red">No Pagado</span>';
                                      endif;                                      
                                ?>
                            </td>
                            <td><?php echo $registrado['email_registrado']; ?></td>
                            <td><?php echo $registrado['fecha_registro']; ?></td>
                            <td>
                                <?php 
                                    $articulos = json_decode($registrado['pases_articulos'], true);
                                    $arreglo_articulos = array(
                                        'un_dia' => 'Pase 1 día',
                                        'pase_2dias' => 'Pase 2 días',
                                        'pase_completo' => 'Pase 3 días',
                                        'camisas' => 'Camisas',
                                        'etiquetas' => 'Etiquetas'
                                    );
                                    foreach($articulos as $llave => $articulo) {
                    
                                       if(array_key_exists('cantidad', $articulo)) {
                                          
                                         echo $articulo['cantidad'] . " " .  $arreglo_articulos[$llave] . "<br>";
                                       } else {
                                        echo $articulo . " " .  $arreglo_articulos[$llave] . "<br>";
                                       }
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $eventos_resultado = $registrado['talleres_registrados'];
                                    $talleres = json_decode( $eventos_resultado, true);
                               
                                    $talleres = implode("', '", $talleres['eventos']);
                                   

                                    $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE evento_id IN  ('$talleres') OR clave IN ('$talleres')  " ;
                                    // echo $sql_talleres;
                                    $resultado_talleres =  $conn->query($sql_talleres);
                                    
                                    
                                    
                                    while($eventos = $resultado_talleres->fetch_assoc()){
                                          echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<br>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $registrado['nombre_regalo']; ?></td>
                            <td>$ <?php echo $registrado['total_pagado']; ?></td>
                            
                            <td>
                                <a href="editar-registrado.php?id=<?php echo $registrado['ID_Registrado']; ?>" type="button" class="btn bg-orange btn-flat margin"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="#" data-id="<?php echo $registrado['ID_Registrado']; ?>" data-tipo="registrado" type="button" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                    </tr>
                <?php } ?>
                  
                    
                </tbody>
                <tfoot>
                    <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Articulos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
                    <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

