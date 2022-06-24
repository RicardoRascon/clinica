<?php 
    require '../../conexion/conexion.php';

   $id=$_POST['id1'];
   $pension = $_POST['pension'];
   $nombre = $_POST['nombre'];
   $direccion = $_POST['direccion'];
   $email = $_POST['email'];
   $telefono = $_POST['telefono'];
   $fechanac = $_POST['fechanac'];
   $comentarios = $_POST['comentarios'];




	 $sql = "UPDATE clientes SET pension = '$pension', nomcom = '$nombre', direccion = '$direccion', email = '$email', telefono = '$telefono', fechanac = '$fechanac', comentarios = 'comentarios' WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
$stmt->execute();
$count=$stmt->rowCount();
if ($count>0){
    echo '1';
} else{
    echo '2';
}


?>