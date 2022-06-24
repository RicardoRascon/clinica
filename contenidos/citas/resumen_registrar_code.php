<?php session_start();
 require '../../conexion/conexion.php';
 
////Datos Personales
$id=$_POST['id1']; 
$capturista = $_SESSION['user_id']; 
$resumen = $_POST['resumen'];


     $sql = "INSERT INTO citas_concluidas (id_cita, capturista, resumen) VALUES ('$id', '$capturista', '$resumen')";


    $stmt = $conn->prepare($sql);


  if ($stmt->execute()) {

 $cit = "SELECT * FROM citas where id= '$id'";
 $stmtc = $conn->prepare($cit);
  $stmtc->execute();
  $rowc = $stmtc->fetch();
   
   $cli = $rowc['id_cliente'];
    $tc = $rowc['id_tipo_consulta'];
      $fec = $rowc['fecha_cita'];


    $sqlup = "UPDATE citas SET concluida = 1 WHERE id_cliente='$cli' and id_tipo_consulta='$tc' and fecha_cita='$fec' ";
    $stmtup = $conn->prepare($sqlup);
    
  if ($stmtup->execute()){

if ( !empty($_POST['des'] ) && is_array($_POST['des'] ) ) { 
    $can=$_POST['can'];
  
    foreach ( $_POST['des']  as $index => $nf ) { 

////paso1 
   $sqlu1 = "UPDATE productos SET unidad =unidad + '$can[$index]'
    where descripcion= '$nf'";
   $stmtu1 = $conn->prepare($sqlu1);
   $stmtu1->execute();


 $unidad = "SELECT * FROM productos where descripcion= '$nf'";
 $stmtu = $conn->prepare($unidad);
  $stmtu->execute();
  $rowu = $stmtu->fetch();
    $cantidad = $rowu['cantidad'];
    $unidad = $rowu['unidad'];
    $umax = $rowu['umax'];
    $idp = $rowu['id'];

 while ( $unidad >= $umax ) {

     $sql2 = "UPDATE productos SET unidad =unidad-'$umax', cantidad = cantidad-1
    where descripcion= '$nf'";
   $stmt2 = $conn->prepare($sql2);
   $stmt2->execute();

    $unidadx = "SELECT * FROM productos where descripcion= '$nf'";
 $stmtux = $conn->prepare($unidadx);
  $stmtux->execute();
  $rowux = $stmtux->fetch();
    $cantidad = $rowux['cantidad'];
    $unidad = $rowux['unidad'];
    $umax = $rowux['umax'];



 }

   $sqlbitacora = "INSERT INTO bitacora_inv_citas
   (id_producto, id_cita,cantidad, id_user)
    VALUES ( '$idp','$id', '$can[$index]','$capturista')";
   $stmtb = $conn->prepare($sqlbitacora);
     $stmtb->execute();
  

 }



 echo '1';

  
  } else{
   
 echo '2';
  }

 } 

} else{
  echo '3';
}



?>