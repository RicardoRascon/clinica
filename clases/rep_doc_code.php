<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php'; 



    </script>";
    }
    
    require '../conexion/conexion.php';   
    $where='';
    $username = $_SESSION['nombreSesion']; 


    $doctor = $_POST['doc'];
    $fechaI = $_POST['fechaI'];
    $fechaF = $_POST['fechaF'];
    $consulta = $_POST['consulta'];
    $status = $_POST['status'];


     

$sqld = "SELECT turno from doctores where id='$doctor'"; 
        $stmtd = $conn->prepare($sqld);
        $stmtd->execute();
        $rowd = $stmtd->fetch();

        if ($rowd['turno']==1) {
            $tablax='hora_consulta';
        }else if ($rowd['turno']==2){
          $tablax='hora_consulta_ves';
        } else {
            $tablax='hora_consulta_doble';
        }


 if($doctor != '' && $fechaI=='' && $fechaF=='' && $consulta =='' && $status ==''){
$where .= "AND a.id ='".$doctor."'";

  }
   elseif($doctor == '' && $fechaI!='' && $fechaF!='' && $consulta =='' && $status ==''){
$where .= "AND d.fecha_cita BETWEEN '".$fechaI."' AND '".$fechaF."'";

  }
   elseif($doctor == '' && $fechaI=='' && $fechaF=='' && $consulta !='' && $status ==''){
$where .= "AND c.id ='".$consulta."'";

  }
   elseif($doctor == '' && $fechaI=='' && $fechaF=='' && $consulta =='' && $status !=''){
$where .= "AND d.concluida = '".$status."'";

  }

   if($doctor != '' && $fechaI=='' && $fechaF=='' && $consulta =='' && $status ==''){
$where .= "AND a.id ='".$doctor."'";

  }
   if($doctor != '' && $fechaI=='' && $fechaF=='' && $consulta =='' && $status ==''){
$where .= "AND a.id ='".$doctor."'";

  }

    elseif($doctor != '' && $fechaI!='' && $fechaF!='' && $consulta =='' && $status ==''){
$where .= "AND  a.id ='".$doctor."' AND d.fecha_cita BETWEEN '".$fechaI."' AND '".$fechaF."' ";

  }
 

  elseif($doctor != '' && $fechaI!='' && $fechaF!='' && $consulta !='' && $status ==''){
     $where .= "AND   a.id ='".$doctor."' AND d.fecha_cita BETWEEN '".$fechaI."' AND '".$fechaF."' AND c.id ='".$consulta."' ";
}elseif($doctor!='' && $fechaI!='' && $fechaF!='' && $consulta!='' && $status!=''){

     $where .= "AND a.id ='".$doctor."' AND d.fecha_cita BETWEEN '".$fechaI."' AND '".$fechaF."' AND c.id ='".$consulta."' AND d.concluida = '".$status."' ";

 
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
                	
                   
                        <th width="20%"> Cliente </th>
                        <th width="20%"> Tipo de Consulta </th>
                        <th width="10%"> Fecha</th>
                        <th width="10%"> Hora</th>
                        <th width="20%"> Comentarios </th>
                        <th width="5%"> Seguimiento </th>
                    
                      
                    </tr>
                </thead>

                <tbody>
            	   <?php


                       $sql = "SELECT d.id as cita,a.id as id_doctor, b.nomcom,c.id as id_consulta, c.nombre as consulta,
                       d.concluida as id_status,d.fecha_cita, e.hora, d.comentarios FROM citas d 
                        LEFT JOIN doctores a on d.id_doctor = a.id 
                        LEFT JOIN clientes b on d.id_cliente = b.id
                        LEFT JOIN tipo_consulta c on d.id_tipo_consulta = c.id
                        LEFT JOIN $tablax e on d.hora_cita = e.id
                        WHERE  a.id != '' ".$where."group by c.nombre,d.fecha_cita order by e.hora "; 

                        $stmt = $conn->prepare($sql);
       
                        $stmt->execute();
                        while($row = $stmt->fetch() ) {



                            $sql1 = "SELECT concluida FROM citas WHERE id = '".$row['cita']."'"; 

                            $stmt1 = $conn->prepare($sql1);
       
                            $stmt1->execute();
                            $row1 = $stmt1->fetch();  
				    ?>

                    <tr class="odd gradeX">
                	 
                    
                    <td width="20%"><?php print utf8_encode($row['nomcom']); ?></td>
                    <td width="20%"><?php print utf8_encode($row['consulta']); ?></td>
                    <td width="10%"><?php print utf8_encode($row['fecha_cita']); ?></td>
                    <td width="10%"><?php print utf8_encode($row['hora']); ?></td>
                    <td width="20%"> <?php print utf8_encode($row['comentarios']); ?></td>
        
                    <td width="5%">



                        <?php if($row1['concluida'] == 0){?>
                        <a>Pendiente  </a>

                        <?php } else if($row1['concluida'] == 1){ ?> 
                            <a  title="Revisar" href="javascript:;" onclick="javascript: ver('<?php print $row['id'] ?>')">  
                            <img src="../img/search.png" alt="Editar" height="40" width="40"></a>
                        </td>

                     <?php } else { ?> 
                            <a>Cancelada  </a>
                    </td>
                        <?php }  ?> 

                    </tr>
                <?php } 
				?>
            </tbody>
        </table>


    </div>
</div> 



 <form id="envia_excel1" name="envia_excel1" method="post" action="../php/rep_doctores_xls.php" style="margin:0px; border:0px">

      <input type="hidden" value="<?=$sql?>" name="la_query" id="la_query">
  
        <input type="hidden" value="reporte_de_doctor" name="nombre_archivo" id="nombre_archivo">
       <center><input type="submit" value="Exportar" name="imprimir"> 
    </div>