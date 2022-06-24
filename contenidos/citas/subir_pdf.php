<?php session_start();
    require '../../conexion/conexion.php'; 

    $id=$_POST['id'];

   $sql = "SELECT * FROM citas WHERE  id = '$id' "; 

      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetch();

?>
<style type="text/css">
  img.alineado{
  vertical-align: middle;
}


</style>

<form action="#" name="forma_subirPDF" id="forma_subirPDF" class="horizontal-form">

  <input type="hidden" name="id1" id="id1" value=<?php print $id?>>


  <div class="form-group row">
          <div class="col-sm-4 ">
              <span> Ingrese el Documento</span>
          </div>
          <div class="col-sm-8">
              <input class="btn btn-primary " type="file" value="Examinar" name="archivo" id="archivo">
          </div>
      </div>


 
  </div>


 
                                   
    
      
    </form>

