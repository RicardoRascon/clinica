<?php 
    require '../../conexion/conexion.php';

   $id=$_POST['id1'];
   $nombre = $_POST['nombre'];
   $especialidad = $_POST['especialidad'];
   $telefono = $_POST['telefono'];
   $direccion = $_POST['direccion'];
   $email = $_POST['email'];
   $cedula = $_POST['cedula'];
   



	 $sql = "UPDATE doctores SET nombre = '$nombre', especialidad = '$especialidad', telefono = '$telefono', direccion = '$direccion', email = '$email', cedula = '$cedula' WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
$stmt->execute();
$count=$stmt->rowCount();
if ($count>0){
    echo '1';
} else{
    echo '2';
}


?>