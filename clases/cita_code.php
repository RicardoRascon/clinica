<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión');  

    window.location='../index.php'; 



    </script>";
    }
    
    require '../conexion/conexion.php';   
    $where='';
    $username = $_SESSION['nombreSesion']; 
    $permisos = $_SESSION['permisos']; 

    $doctor = $_POST['doc'];
    $fecha = $_POST['fecha'];


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






    if ($doctor!='' && $fecha!='') {
        
    

    if($doctor != '' && $fecha!='') $where .= "and  id_doctor LIKE '%".$doctor."%' and fecha_cita LIKE '%".$fecha."%' ";


?>
<form action="#" name="forma_generar_cita" id="forma_guardarPDF" class="horizontal-form" enctype=multipart/form-data>
<div class="portlet box purple-plum">
    <div class="portlet-title">
        <!-- <div class="caption fjalla">
            <a href="#" data-toggle="modal"><i class="fa fa-file-o"></i></a>Total Registros
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
        </div> 
        <div class="caption fjalla">
            <i class="fa fa-user"> </i> Lista de Usuarios
        </div>-->
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
                    <th width="5%"> Firma </th>
                      
                    <th width="15%"> Opciones </th>
                   
                    
                      
                </tr>
            </thead>

            <tbody>
            	<?php


                    $sql = "SELECT d.id,a.nombre as doctor, b.nomcom, c.nombre as consulta, d.fecha_cita, e.hora, d.comentarios,d.archivo FROM citas d 
                    LEFT JOIN doctores a on d.id_doctor = a.id 
                    LEFT JOIN clientes b on d.id_cliente = b.id
                    LEFT JOIN tipo_consulta c on d.id_tipo_consulta = c.id
                    LEFT JOIN $tablax e on d.hora_cita = e.id
                    WHERE  d.id_doctor != '' ".$where."group by c.nombre,d.fecha_cita,b.nomcom order by e.hora "; 

                    $stmt = $conn->prepare($sql);
   
                    $stmt->execute();
                    while($row = $stmt->fetch() ) {



                     $sql1 = "SELECT concluida FROM citas WHERE id = '".$row['id']."'"; 

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

                        <?php if($row['archivo'] == "0"){?>
                            <a  title="Firma" href="javascript:;" onclick="javascript: subirPDF('<?php print $row['id'] ?>')">  
                            <img src="../img/subir.png" alt="Firma" height="40" width="40"></a> 
                        
                         <?php } else { ?> 
                            <a  title="Firma" href="javascript:;" onclick="javascript: abrirPDF('<?php print $row['id'] ?>')">  
                            <img src="../img/pdf.png" alt="Firma" height="40" width="40"></a> 

                        <?php }  ?> 


                    </td>
        
                    <td width="15%">

 <img src="../img/delete.png" alt="Desactivar" height="40" width="40"></a> 

                     <?php if($row1['concluida'] == 0 && $permisos != 1 && $row['archivo'] != "0"){?>
                        <a  title="Resumen" href="javascript:;" onclick="javascript: resumen('<?php print $row['id'] ?>')">  
                        <img src="../img/edit.png" alt="Editar" height="40" width="40"></a> 
                        <a  title="Cancelar Cita" href="javascript:;" onclick="javascript: falto('<?php print $row['id'] ?>')">  
                       

                        <?php } else if($row1['concluida'] == 1 && $permisos != 1 && $row['archivo'] != "0"){ ?> 
                            <a  title="Revisar" href="javascript:;" onclick="javascript: ver('<?php print $row['id'] ?>')">  
                            <img src="../img/search.png" alt="Editar" height="40" width="40"></a>
                        </td>

                     <?php } else if ($row1['concluida'] == 2 && $permisos != 1 && $row['archivo'] != "0") { ?> 
                            <a>Cancelada  </a>
                        </td>
<?php } else { ?> 
<a>Sin Opciones</a>
<?php } 
                ?>
                </tr>
                <?php } 
                ?>
                
            </tbody>
        </table>

    </div>
</div>
</form>
 <?php 
} else{

   print 'Favor Introducir Filtro de Busqueda....';
 }
                ?>