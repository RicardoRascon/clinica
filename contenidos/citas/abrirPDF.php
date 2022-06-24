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

<form action="#" name="abrirPDF" id="abrirPDF" class="horizontal-form">


  <iframe src='<?php print $row['archivo'] ?>' width ='100%' height ='600px'></iframe>


 
  </div>


 
                                   
    
      
    </form>
