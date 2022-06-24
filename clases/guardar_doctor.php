<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
require '../conexion/conexion.php';

  $username = $_SESSION['nombreSesion'];

  $message = '';


  if (!empty($_POST['nombre']) && !empty($_POST['especialidad']) && !empty($_POST['activo']) && 
      !empty($_POST['cedula']) && !empty($_POST['telefono']) && !empty($_POST['email']) && 
      !empty($_POST['direccion']) && !empty($_POST['turno']) && !empty($_POST['docu'])) {

     $sql = "INSERT INTO doctores (nombre, especialidad, activo, cedula, telefono, email, direccion, turno,id_user)  
    VALUES (:nombre, :especialidad, :activo, :cedula, :telefono, :email, :direccion, :turno, :user)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nombre',$_POST['nombre']);
    $stmt->bindParam(':especialidad',$_POST['especialidad']);
    $stmt->bindParam(':activo',$_POST['activo']);
    $stmt->bindParam(':cedula',$_POST['cedula']);
    $stmt->bindParam(':telefono',$_POST['telefono']);
    $stmt->bindParam(':email',$_POST['email']);
    $stmt->bindParam(':direccion',$_POST['direccion']);
    $stmt->bindParam(':turno',$_POST['turno']);
    $stmt->bindParam(':user',$_POST['docu']);

    if ($stmt->execute()) { 

 $sqlud = "UPDATE users set asignado=1, permisos=2 where id='".$_POST['docu']."'";

    $stmtud = $conn->prepare($sqlud);
     $stmtud->execute();
     echo  $message = '1';

    } else {
     echo $message = '2';
    }
   

  } else{
    echo $message = '3';
  }


?>