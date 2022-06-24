<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión');window.location='../index.php'; </script>";
    }
    
      require '../conexion/conexion.php';

  $username = $_SESSION['nombreSesion'];
  $idC =  $_SESSION['user_id'];
  $message = '';
  $nCompleto = '';
  $usuario = '';

  if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['password']) && 
      !empty($_POST['repitePassword']) && $_POST['password'] == $_POST['repitePassword']) {

      $nCompleto = $_POST['nombre'] . " " . $_POST['apellido'];
      $usuario = $_POST['nombre'] . "." . $_POST['apellido'];

    $sql = "INSERT INTO users (nombreCompleto, status, permisos, usuario, password)  
    VALUES ('$nCompleto', 1, 1, '$usuario', :password)";
    $stmt = $conn->prepare($sql);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$password);
    
   

    if ($stmt->execute()) { 
    $records = $conn->prepare('SELECT id FROM users ORDER BY id desc LIMIT 1');
    
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $idu = $results['id'];
     
      $sql1 = "INSERT INTO bitacora (id_tabla, id_user, movimiento, id_capturista) VALUES ('1', '$idu', 'insert','$idC')";
      $stmt1 = $conn->prepare($sql1);
      $stmt1->execute();

     echo  $message = '1';

    } else {
     echo $message = '2';
    } 

      } else {
    echo $message = '3';
  }

  ?>