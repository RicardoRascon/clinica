<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
    require '../conexion/conexion.php';
    $where='';
    $username = $_SESSION['nombreSesion']; 


    $usuario = $_POST['usuario'];

    if ($usuario!='') {
        
    

    if($_POST['usuario'] != '') $where .= " AND nombre LIKE '%".$_POST['usuario']."%'";


?>
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
        <table width="100%" class="table table-striped table-hover" id="sample_usuarios3">
            <thead>
                <tr>
                	
                   
                    <th width="20%"> Nombre </th>
                    <th width="20%"> Especialidad </th>
                    <th width="20%"> Status </th>
                    <th width="20%"> Turno </th>
                    <th width="20%"> Opciones </th>
                  
                    
                      
                </tr>
            </thead>

            <tbody>
            	<?php
      $sql = "SELECT id,nombre, especialidad, activo, turno FROM doctores WHERE  nombre != '' ".$where.""; 

                    $stmt = $conn->prepare($sql);
   
                    $stmt->execute();
                    while($row = $stmt->fetch() ) {
				?>

                <tr class="odd gradeX">
                	 
                    <td  width="20%"><?php print $row['nombre']?></td>
                    <td  width="20%"><?php print utf8_encode($row['especialidad']); ?></td>
                    <?php 
                    if ($row['activo'] == 1) { ?>
                        
                        <td  width="20%">Activo</td>

                    <?php } else {?>
                        <td  width="20%">Inactivo</td>
                     <?php } ?>   
                    
                    
                    <?php 
                    if ($row['turno'] == 1) { ?>
                        
                        <td  width="20%">Matutino</td>

                    <?php } else{?>
                        <td  width="20%">Vespertino</td>
                     <?php } ?>



                    
                    <td  width="20%"><a  title="Editar" href="javascript:;" 
                        onclick="javascript: edituser('<?php print $row['id'] ?>')">  
                        <img src="../img/edit.png" alt="Editar" height="35" width="35"></a> 

                        <?php if ($row['activo']==1) {  ?>

                           <a  title="Desactivar" href="javascript:;"
        onclick="javascript: change_status('<?php print $row['id'] ?>','<?php print $row['nombre']?>',1)">  
                        <img src="../img/delete.png" alt="Desactivar" height="35" width="35"></a>
                           
                       <?php }else{ ?>

                         <a  title="Activar" href="javascript:;"
          onclick="javascript: change_status('<?php print $row['id'] ?>','<?php print $row['nombre'] ?>',2)">  
                        <img src="../img/activar.png" alt="Activar" height="35" width="35"></a>
                  <?php  } ?>

                      
                       
                        </td>



                </tr>
                <?php } 
				?>
            </tbody>
        </table>


        <!-- <div>
            <h3 class="raleway">balance actual:</h3>
            <h1 class="fjalla" id="balanceactual">$80,000</h1>
        </div> -->
    </div>
</div> <?php 
} else{

   print 'Favor Introducir Filtro de Busqueda....';
 }
                ?>