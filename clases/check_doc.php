<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
  require '../conexion/conexion.php';

  $turn1 = $_POST['turn1'];
?>


<label for="exampleInput1">Doctor</label>
<select name="doc" id="doc" class="form-control form-control-user" onchange="reseta();"> 
        



          <option disabled selected>Seleccione Doctor</option> 
          <?php $sqldoc = "SELECT * FROM doctores WHERE activo = 1 AND turno = '$turn1' or turno=3"; 

            $stmt = $conn->prepare($sqldoc);
            $stmt->execute();
        
            while($row = $stmt->fetch() ) {
              print 'hola';
          ?>
      
          <option value="<?php print $row['id']?>"><?php print $row['nombre']?></option>
            <?php }?>

        </select> 
                                                               
                                                       