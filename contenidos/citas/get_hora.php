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
$hora_inicial='08:00';
  $counter=13;
}else{
 $tablax='hora_consulta_ves';
 $hora_inicial='14:00'; 
  $counter=12;
}
$minutoAnadir=0;

?>
    <div class="col-xs-12 col-sm-8">
        <label for="exampleInput1">Hora de Consulta</label>
        <select name="hora_consulta" id="hora_consulta" class="form-control form-control-user">  
          <option disabled selected>Seleccione la Hora de la Consulta</option> 
 <?php


for ($i=0; $i < $counter ; $i++) { 
  # code...

             $segundos_horaInicial=strtotime($hora_inicial);
              $segundos_minutoAnadir=$minutoAnadir*60;
              $nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);




           $sqldoc = "SELECT a.id,DATE_FORMAT(a.hora,'%H:%i')as hora  FROM $tablax a 
     WHERE  a.id NOT IN  (SELECT  b.hora_cita FROM  citas b where b.fecha_cita ='$fec'
       and b.id_doctor='$doc' and concluida !=2 ) and a.hora='$nuevaHora'"; 

            $stmt = $conn->prepare($sqldoc);
            $stmt->execute();
             $row = $stmt->fetch();
                 
                 if ($row['id']=='') {

                    $sqlnh = "SELECT id from $tablax  where hora='$nuevaHora'"; 

            $stmtnh = $conn->prepare($sqlnh);
            $stmtnh->execute();
             $rownh = $stmtnh->fetch();
 
 ?>
<option value="<?php print $rownh['id']?>" style="background-color:red; color: #fff; " disabled ><?php print $nuevaHora ?></option>

 <?php
                  $hora_inicial=$nuevaHora;
                 $minutoAnadir=30;
                 }else{ 
          

                    ?>
      
          <option value="<?php print $row['id']?>"><?php print $row['hora']?></option>
             <?php 
                $hora_inicial=$row['hora'];
              $minutoAnadir=30;
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