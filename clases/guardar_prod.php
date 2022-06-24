<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión');window.location='../index.php'; </script>";
    }
    
      require '../conexion/conexion.php';

  $username = $_SESSION['nombreSesion'];
  $idu =  $_SESSION['user_id'];
  $message = '';
 

  if (!empty($_POST['desc']) && !empty($_POST['can'])
   && !empty($_POST['umax']) &&  !empty($_POST['stock']) ){

  

    $sql = "INSERT INTO productos (descripcion, cantidad, umax,stockmin)  
    VALUES (:desca,:can,:umax,:stock) ";
    $stmt = $conn->prepare($sql);
   
    $stmt->bindParam(':desca',$_POST['desc']);
    $stmt->bindParam(':can',$_POST['can']);
    $stmt->bindParam(':umax',$_POST['umax']);
    $stmt->bindParam(':stock',$_POST['stock']);

    if ($stmt->execute()) { 

 $records1 = $conn->prepare('SELECT * FROM productos ORDER BY id desc LIMIT 1');
    
    $records1->execute();
    $results1 = $records1->fetch(PDO::FETCH_ASSOC);
    $idu1 = $results1['id'];
    $can=$results1['cantidad'];

     
      $sql1 = "INSERT INTO bitacora_productos (id_producto,cantidad_add,user,movimiento) VALUES ('$idu1','$can','$idu',1)";
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