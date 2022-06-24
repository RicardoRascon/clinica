<?php session_start();

require '../../conexion/conexion.php'; 

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); window.location='../index.php'; </script>";
    }

    $capturista = $_SESSION['user_id'];
    $id=$_POST['id1'];
   
	$sql = "INSERT INTO citas_concluidas (id_cita, capturista, resumen) VALUES ('$id', '$capturista', 'Cita Cancelada')";

       $stmt = $conn->prepare($sql);


  if ($stmt->execute()) {

  $sqlc = "SELECT * FROM citas  WHERE id = '$id'";
    $stmtc = $conn->prepare($sqlc);
    $stmtc->execute();
     $rowc = $stmtc->fetch(); 

  $cliente= $rowc['id_cliente'];
   $tipo_cita= $rowc['id_tipo_consulta'];
    $fecha= $rowc['fecha_cita'];


   $sqlup = "UPDATE citas SET concluida = 2 
    WHERE id_cliente='$cliente' and id_tipo_consulta='$tipo_cita' and fecha_cita='$fecha'";
    $stmtup = $conn->prepare($sqlup);
    $stmtup->execute();
  }


  $count=$stmtup->rowCount();
  if ($count>0){
    echo '1';

  } else{
    
    echo '2';
  }


?>