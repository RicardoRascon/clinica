<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
require '../conexion/conexion.php';

  $username = $_SESSION['nombreSesion'];

  $message = '';


  if (!empty($_POST['nombre']) && !empty($_POST['duracion'])) {

     $sql = "INSERT INTO tipo_consulta (nombre, activo, duracion) VALUES (:nombre, '1', :duracion)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nombre',$_POST['nombre']);
    $stmt->bindParam(':duracion',$_POST['duracion']);
   

    if ($stmt->execute()) { 
     echo  $message = '1';

    } else {
     echo $message = '2';
    }
   

  } else{
    echo $message = '3';
  }


?>