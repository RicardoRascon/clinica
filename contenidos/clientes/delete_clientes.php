<?php 
    require '../../conexion/conexion.php';

   $id=$_POST['id1'];
 $sql = "DELETE from clientes WHERE id = '$id'";
 $stmt = $conn->prepare($sql);
$stmt->execute();
$count=$stmt->rowCount();
if ($count>0){
    echo '1';
} else{
    echo '2';
}

?>