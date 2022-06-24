<?php  session_start();
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment; filename=".$_POST['nombre_archivo'].".xls");
	header("Pragma: no-cache");
header("Expires: 0");
$fecha=strftime("%d-%m-%Y");
	require '../conexion/conexion.php';
	
	 $sql = $_POST['la_query'];

	  $sql = str_replace("\'", "'", $sql);

	//print $sql;
	
	 $stmt = $conn->prepare($sql);
   
                $stmt->execute();
             
 $colcount = $stmt->columnCount();
?>
<html>
<head>
</head>
<body>
<table border="1" bordercolor="#C7C7C7"><tr><td colspan="5"><b>
	<CENTER> REPORTE DE BITACORA INVENTARIO <?php  echo $fecha; ?></td></tr><tr>
	<?php

for ($i = 0; $i < $colcount; $i++) {
    $col = $stmt->getColumnMeta($i);
    $columns[] = $col['name'];

     ?><td>&nbsp;<b> 
       <?php 
     

       print_r($columns[$i]); ?>
      </td>
       <?php 
}

 ?>
	
</tr>		
<?php
while($row = $stmt->fetch()){ ?>
	<tr><?php
    	for($x = 0; $x <$colcount; $x++){
    		?>  <td><?=ucwords(strtolower(mb_convert_encoding($row[$x],  "ISO-8859-1", "UTF-8")))?></td><?php 

		} ?>
    </tr><?php
}
?>
</table>
</body>
</html>