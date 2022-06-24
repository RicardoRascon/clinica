<?php session_start();



if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
    require '../conexion/conexion.php';

    $username = $_SESSION['nombreSesion'];


    $doc = $_POST['doc'];
    $fecha = $_POST['fecha'];
    $tipo_consulta = $_POST['tipo_consulta'];
    $hora_consulta = $_POST['hora_consulta'];

    $sql = "SELECT * FROM citas WHERE id_doctor =".$doc." and fecha_cita ="."'". $fecha."'"." and hora_cita =".$hora_consulta;

    $stmt = $conn->prepare($sql);
   
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row == null) {
    	echo "Fecha disponible";
    } else {
    	echo "Fecha ocupada";
    }
?>