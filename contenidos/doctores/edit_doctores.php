<?php session_start();
    require '../../conexion/conexion.php';

    $idu=$_POST['id'];



$sql = "SELECT * FROM doctores WHERE  id = '$idu' "; 

        $stmt = $conn->prepare($sql);
    	$stmt->execute();
          $row = $stmt->fetch();



?>
<style type="text/css">
	img.alineado{
  vertical-align: middle;
}


</style>

<form action="#" name="forma_update_doctor" id="forma_update_doctor" class="horizontal-form">

 <input type="hidden" id="id1" name="id1" value="<?php print $idu ?>">

								<h3>Datos Personales</h3>
								<div class="form-row">
								<div align="right">
       
</div>
					

    <div class="col-xs-12 col-sm-9">



      <label for="exampleInput1">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php print $row['nombre'] ?>">


      <label for="exampleInput1">Turno</label>
      <select name="turno" id="turno" class="form-control form-control-user">  
          
          <?php $sqlturno = "SELECT * FROM doctores WHERE id = '$idu'"; 

            $stmt = $conn->prepare($sqlturno);
            $stmt->execute();
         $row = $stmt->fetch();
         if ($row['turno']==1) {  ?>
           <option value="<?php print $row['turno']?>">Turno Matutino</option>
           <option value="2">Turno Vespertino</option>
        <?php  } else { ?>
<option value="<?php print $row['turno']?>">Turno Vespertino</option>
<option value="1">Turno Matutino</option>
       <?php } ?>


        </select>


      
   

      <label for="exampleInput2">Especialidad</label>

      <input type="text" class="form-control"  id="especialidad" name="especialidad" value="<?php print $row['especialidad'] ?>" >

      <label for="exampleInput1">Status</label>

      <input type="text" class="form-control" id="activo" name="activo" value="<?php print $row['activo'] ?>">
   

      <label for="exampleInput2">Teléfono</label>

      <input type="text" class="form-control"  id="telefono" name="telefono" value="<?php print $row['telefono'] ?>" >

      <label for="exampleInput2">Dirección</label>

      <input type="text" class="form-control"  id="direccion" name="direccion" value="<?php print $row['direccion'] ?>" >

      <label for="exampleInput2">Email</label>


      <input type="email" class="form-control form-control-user" id="email" name="email" value="<?php print $row['email'] ?>" >
     
      <label for="exampleInput2">Cédula</label>


      <input type="text" class="form-control form-control-user" id="cedula" name="cedula" value="<?php print $row['cedula'] ?>" >
    </div>


 </div><!--div from row    -->
                                   
		
			
		</form>
