<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión');window.location='../../index.php'; </script>";
    }
    
  	$userx = $_SESSION['user_id'];
    require '../../conexion/conexion.php'; 

   $id=$_POST['id1'];
   $can = $_POST['cantidad'];
   
	 $sql = "UPDATE productos SET cantidad = cantidad +'$can' WHERE id = '$id'";
	 $stmt = $conn->prepare($sql);


		if ($stmt->execute()) { 


   		$sql1 = "INSERT INTO bitacora_productos (id_producto,cantidad_add,user,movimiento) 
   		VALUES ('$id','$can','$userx',2)";
     	 $stmt1 = $conn->prepare($sql1);
     	 $stmt1->execute();
 

$count=$stmt1->rowCount();
if ($count>0){
    echo '1';
} else{
    echo '2';
}

}else{
	 echo '3';
}


?>