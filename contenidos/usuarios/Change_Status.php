<?php 
    require '../../conexion/conexion.php';

   $id=$_POST['id1'];
   $status=$_POST['valx'];

  if ($status==1) {
  	$status_new=2;
  }else{
$status_new=1;

  }

  $sql = "UPDATE users set status= '$status_new' WHERE id = '$id'";
 $stmt = $conn->prepare($sql);
$stmt->execute();
$count=$stmt->rowCount();
if ($count>0){
    echo '1';
} else{
    echo '2';
}

?>