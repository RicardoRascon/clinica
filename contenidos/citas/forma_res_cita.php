<?php session_start();

require '../../conexion/conexion.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
$capturista = $_SESSION['user_id'];
$resumen = $_POST['resumen'];
  

  $id=$_POST['id1'];
   



	$sql = "INSERT INTO citas_concluidas (id_cita, capturista, resumen) VALUES ('$id', '$capturista', '$resumen')";


	$stmt = $conn->prepare($sql);


  if ($stmt->execute()) {

    $sqlup = "UPDATE citas SET concluida = 1 WHERE id = '$id'";
    $stmtup = $conn->prepare($sqlup);
    $stmtup->execute();
  }

  $count=$stmt->rowCount();
  if ($count>0){
    echo '1';
  } else{
    echo '2';
  }


?>