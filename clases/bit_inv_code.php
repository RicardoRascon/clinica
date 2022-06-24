<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); window.location='../index.php'; </script>";
    }
    
    require '../conexion/conexion.php';   
    $where='';
    $username = $_SESSION['nombreSesion']; 


   
    $fechaI = $_POST['fechaI'];
    $fechaF = $_POST['fechaF'];


    if($fechaI!='' && $fechaF!='' || $fechaI!='mm/dd/yyyy' && $fechaF!='mm/dd/yyyy' ){
     $where .= "WHERE c.fecha BETWEEN '".$fechaI."' AND '".$fechaF."' ";


} else {

   print 'Favor Introducir Filtro de Busqueda....';
 }
               

        
    




?>
    <div class="portlet box purple-plum">
        <div class="portlet-title">
        
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover" id="sample_usuarios3">
                <thead>
                    <tr>
                	
                   
                        <th width="20%"> Id Consulta</th>
                        <th width="20%"> Producto </th>
                        <th width="20%"> Cantidad </th>
                        <th width="20%"> Fecha</th>
                        <th width="20%"> Usuario</th>
                       
                    
                      
                    </tr>
                </thead>

                <tbody>
            	   <?php


      $sql = "SELECT a.id AS id_consulta,b.descripcion,c.cantidad,c.fecha,d.nombrecompleto as usuario 
      from  bitacora_inv_citas c
     left join  citas a on a.id= c.id_cita
     left join productos b on c.id_producto=b.id
     left join users d on c.id_user=d.id ".$where." order by a.id"; 

                        $stmt = $conn->prepare($sql);
       
                        $stmt->execute();
                        while($row = $stmt->fetch() ) {



                         
				    ?>

                    <tr class="odd gradeX">
                	 
                    
                    <td width="20%"><?php print utf8_encode($row['id_consulta']); ?></td>
                    <td width="20%"><?php print utf8_encode($row['descripcion']); ?></td>
                    <td width="10%"><?php print utf8_encode($row['cantidad']); ?></td>
                    <td width="10%"><?php print utf8_encode($row['fecha']); ?></td>
                    <td width="20%"> <?php print utf8_encode($row['usuario']); ?></td>
        
                    <td width="5%">


                    </tr>
                <?php } 
				?>
            </tbody>
        </table>


    </div>
</div> 



 <form id="envia_excel1" name="envia_excel1" method="post" action="../php/rep_bitinv_xls.php" style="margin:0px; border:0px">

      <input type="hidden" value="<?=$sql?>" name="la_query" id="la_query">
  
        <input type="hidden" value="reporte_de_bitacora" name="nombre_archivo" id="nombre_archivo">
       <center><input type="submit" value="Exportar" name="imprimir"> 
    </div>