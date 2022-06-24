<?php session_start();
    require '../../conexion/conexion.php';

    $id=$_POST['id'];

    $sql = "SELECT * FROM citas_concluidas WHERE  id_cita = '$id' "; 

      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetch();

?>
<style type="text/css">
  img.alineado{
  vertical-align: middle;
}


</style>

<form action="#" name="forma_can_cita" id="forma_can_cita" class="horizontal-form">

 <input type="hidden" id="id1" name="id1" value="<?php print $id ?>">

        <div class="col">       
  <label for="resumen"><h2>¿Está seguro que desea cancelar la cita?</h2></label>
</div>
    


 
                                   
    
      
    </form>