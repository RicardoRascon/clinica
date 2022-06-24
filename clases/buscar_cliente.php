<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
require '../conexion/conexion.php';



  $username = $_SESSION['nombreSesion'];
  $cliente = $_POST['cliente'];

  $sql = "SELECT * FROM clientes WHERE nomcom = '$cliente' or pension = '$cliente'";

  $stmt = $conn->prepare($sql);

  if ($stmt->execute()) {
      
  }

?>