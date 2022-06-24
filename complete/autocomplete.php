<?php
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	 require '../conexion/conexion.php';
	$sql="SELECT descripcion FROM productos WHERE descripcion LIKE '%$my_data%' ORDER BY descripcion";
	$stmt = $conn->prepare($sql);
     $stmt->execute();
                                                                  
     while($row = $stmt->fetch() ) {
     echo $row['descripcion']."\n";
       }
         ?>
   
	