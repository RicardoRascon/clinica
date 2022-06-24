<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
    require '../conexion/conexion.php';
    $where='';
    $username = $_SESSION['nombreSesion']; 
    $cliente = $_POST['cliente'];

    





    if ($cliente!='') {
        
    

    if($_POST['cliente'] != '') $where .= " AND pension LIKE '%".$_POST['cliente']."%' OR nomcom LIKE '%".$_POST['cliente']."%'";


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
        <table width="100%" class="table table-striped table-hover" id="sample_citas">
            <thead>
                <tr>
                	
                    <th width="10%"> Pension </th>
                    <th width="20%"> Nombre </th>
                 
                    <th width="10%"> Telefono </th>
                    <th width="15%"> Email </th>
                    <th width="20%"> Dirección </th>
                    <th width="10%"> Editar </th>
                     <th width="10%"> Cita </th>
                      
                </tr>
            </thead>

            <tbody>
            	<?php
                 $sql = "SELECT id,pension, nomcom, sexo, tipo, telefono, email, direccion FROM clientes WHERE  pension != '' ".$where.""; 

                    $stmt = $conn->prepare($sql);
   
                    $stmt->execute();
                    while($row = $stmt->fetch() ) {
				?>

                <tr class="odd gradeX">
                	 
                    <td width="10%"><?php print $row['pension']?></td>
                    <td width="30%"><?php print utf8_encode($row['nomcom']); ?></td>
                    <td width="10%"><?php print utf8_encode($row['telefono']); ?></td>
                    <td width="20%"> <?php print utf8_encode($row['email']); ?></td>
                    <td width="10%"><?php print utf8_encode($row['direccion']); ?></td>


                    <?php


                    $sql = "SELECT id_cliente FROM antecedentes

                 WHERE  id_cliente = ".$row['id']." "; 

                   $sth = $conn->prepare($sql);
                   $sth->execute();
          
                    if ($sth->rowCount() == 0) {    ?>

                         <td width="10%"><a  title="Editar" href="javascript:;" onclick="javascript: edituser('<?php print $row['id'] ?>')">  
                        <img src="../img/edit.png" alt="Editar" height="40" width="40"></a> 

                    </td>

                    <?php
  
                                } else {

                                    ?>

                                    <td width="10%"><a  title="Ver" href="javascript:;" onclick="javascript: veruser('<?php print $row['id'] ?>')">  
                        <img src="../img/registro.png" alt="Ver" height="40" width="40"></a> 

                                        <?php
  
                                        }

                                        ?>

                   


                     <td width="10%">   <a  title="Ver el Registro" href="javascript:;" onclick="javascript: gencita('<?php print $row['id'] ?>')">  
                        <img src="../img/next.png" alt="Generar Cita" height="40" width="40"></a></td>

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