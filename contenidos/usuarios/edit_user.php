<?php session_start();
    require '../../conexion/conexion.php';

    $idu=$_POST['id'];



$sql = "SELECT * FROM clientes WHERE  id = '$idu' "; 

        $stmt = $conn->prepare($sql);
    	$stmt->execute();
          $row = $stmt->fetch();



?>
<style type="text/css">
	img.alineado{
  vertical-align: middle;
}


</style>

<form action="#" name="forma_update_user" id="forma_update_user" class="horizontal-form">

 <input type="hidden" id="id1" name="id1" value="<?php print $idu ?>">

								<h3>Datos Personales</h3>
								<div class="form-row">
								<div align="right">
      
     <img class="alineado" src="<?php print $row["foto"];?>" alt="Foto" height="200" width="180"> 
</div>
					

    <div class="col-xs-12 col-sm-9">



      <label for="exampleInput1">Pension</label>
      <input type="text" class="form-control" id="pension" name="pension" value="<?php print $row['pension'] ?>">
   

      <label for="exampleInput2">Nombre Completo</label>

      <input type="text" class="form-control"  id="nombre" name="nombre" value="<?php print $row['nomcom'] ?>" >

      <label for="exampleInput1">Dirección</label>

      <input type="text" class="form-control" id="direccion" name="direccion" value="<?php print $row['direccion'] ?>">
   

      <label for="exampleInput2">Email</label>

      <input type="text" class="form-control"  id="email" name="email" value="<?php print $row['email'] ?>" >

      <label for="exampleInput2">Teléfono</label>

      <input type="text" class="form-control"  id="telefono" name="telefono" value="<?php print $row['telefono'] ?>" >

      <label for="exampleInput2">Fecha de Nacimiento</label>


      <input type="date" class="form-control form-control-user" id="fechanac" name="fechanac" value="<?php print $row['fechanac'] ?>" >
     
      
    </div>


    <div class="col">
      <label for="comentarios">Comentarios</label>
      <textarea class="form-control" id="comentarios" rows="3" name="comentarios" value="<?php print $row['comentarios'] ?>"></textarea>

  </div>


 </div><!--div from row    -->
                                   
		
			
		</form>
