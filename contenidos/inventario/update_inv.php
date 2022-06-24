<?php session_start();
    require '../../conexion/conexion.php';

    $idu=$_POST['id'];



$sql = "SELECT * FROM productos WHERE  id = '$idu' "; 

        $stmt = $conn->prepare($sql);
    	$stmt->execute();
          $row = $stmt->fetch();



?>
<style type="text/css">
	img.alineado{
  vertical-align: middle;
}


</style>

<form action="#" name="forma_update_inv" id="forma_update_inv" class="horizontal-form">

 <input type="hidden" id="id1" name="id1" value="<?php print $idu ?>">

								<h3>Agregar Stock a Producto</h3>
								<div class="form-row">
								
                <div class="col-xs-4 col-sm-9">


   <label for="exampleInput1">Producto:  <?php print $row['descripcion'] ?></label>
    </div>

         <div class="col-xs-4 col-sm-9">
      <label for="exampleInput1">Cantidad Actual:  <?php print $row['cantidad'] ?></label>
       </div>

            <div class="col-xs-4 col-sm-9">
      <input type="text" class="form-control" id="cantidad" name="cantidad"  placeholder="Cantidad que Agregara a este Producto">
    </div>


     
     
      
    </div>


   


 </div><!--div from row    -->
                                   
		
			
		</form>
