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

<form action="#" name="forma_res_cita" id="forma_res_cita" class="horizontal-form">

 <input type="hidden" id="id1" name="id1" value="<?php print $id ?>">

        <div class="col">       
  <label for="resumen">Resumen</label>
</div>
    <div class="col">
      
      <textarea class="form-control" id="resumen" rows="10" name="resumen" disabled ><?php print $row['resumen'] ?></textarea>

  </div>


 
                                   
    
      
    </form>
