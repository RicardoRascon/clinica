<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 
    window.location='../index.php';
    </script>";
    }
    
  require '../../conexion/conexion.php';

  $doc= $_POST['doc'];
 $fec= $_POST['fec'];
  $tc= $_POST['tc'];


if ($tc==1) {
 $tablax='hora_consulta';

}else{
 $tablax='hora_consulta_ves';
 
}


?>
    <div class="col-xs-12 col-sm-8">
        <label for="exampleInput1">Hora de Consulta</label>
        <select name="hora_consulta" id="hora_consulta" class="form-control form-control-user">  
          <option disabled selected>Seleccione la Hora de la Consulta</option> 
 <?php

           $sqldoc = "SELECT a.id,DATE_FORMAT(a.hora,'%h:%i:%s %p')as hora  FROM $tablax a 
     WHERE  a.id NOT IN  (SELECT  b.hora_cita FROM  citas b where b.fecha_cita ='$fec'
       and b.id_doctor='$doc' )"; 

            $stmt = $conn->prepare($sqldoc);
            $stmt->execute();
            $duracion=1;

            $numbers = array();

              while($row = $stmt->fetch() ) {
                  if ($duracion<2) {
                     $duracion++;
                      continue;
                   $numbers[] = $row['id'];
                         }else{


  for ($i = 0, $max = count($numbers) - 2; $i < $max; ++$i)
     if ($numbers[$i] == $numbers[$i + 1] - 1 && $numbers[$i] == $numbers[$i + 2] - 2){
       return $i;
     }else{
        return false; 
     }
    
    


                    ?>
      
          <option value="<?php print $row['id']?>"><?php print $row['hora']?></option>
             <?php 

             $duracion=1;

                  }
                     
                            }  





 
              ?>

        </select>

        <div class="col-xs-12 col-sm-12">
        <label for="exampleInput2">Comentarios</label>
        <textarea class="form-control form-control" name="coments" id="coments" placeholder="Describa"></textarea>
      </div>

      
      <div class="form-group row">
          <div class="col-sm-4 ">
              <span> Ingrese el Documento</span>
          </div>
          <div class="col-sm-8">
              <input class="btn btn-primary " type="file" value="Examinar" name="archivo" id="archivo">
          </div>
      </div>

      </div>