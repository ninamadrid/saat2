<!-- Modal -->
<div class="modal fade" id="#productonuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
$('#productoNuevo').on('shown.bs.modal', function () {
  $('#tabla').trigger('producto.php')
})
</script>
<!--  
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar producto</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Nombre: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Nombre del producto" name="productName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Cantidad: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Stock" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group        	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Precio: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Precio" name="rate" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-   	        

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Tipo de PRoducto: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName" name="brandName">
				      	<option value="">-- Selecciona --</option>
				      	<?php 
				      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group				        	         	       

	        <div class="form-group">
	        	<label for="productStatus" class="col-sm-3 control-label">Estado: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus">
				      	<option value="">-- Selecciona --</option>
				      	<option value="1">Entrada</option>
				      	<option value="2">salida</option>
				      </select>
				    </div>
	        </div>  /form-group         	        
	      </div> /modal-body 
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div>  /modal-footer       
     	</form>  /.form -  
    </div> /modal-content -- 
  </div> /modal-dailog 
</div> 
