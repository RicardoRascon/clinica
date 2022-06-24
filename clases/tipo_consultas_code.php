<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    

    require '../conexion/conexion.php';
    $where='';
    $username = $_SESSION['nombreSesion']; 


    $nombre = $_POST['nombre'];

  
        
    

    if($_POST['nombre'] != '') $where .= " AND nombre LIKE '%".$_POST['nombre']."%'";


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
        <table width="100%" class="table table-striped table-hover" id="sample_usuarios4">
            <thead>
                <tr>
                  
                 
                    <th style="padding-left: 10%"> Nombre </th>
                    <th style="padding-left: 10%"> Duración </th>
                
                    
                      
                </tr>
            </thead>

            <tbody>
              <?php
      $sql = "SELECT id,nombre,duracion FROM tipo_consulta WHERE  nombre != '' ".$where.""; 

                    $stmt = $conn->prepare($sql);
   
                    $stmt->execute();
                    while($row = $stmt->fetch() ) {
        ?>

                <tr class="odd gradeX">
                   
                    <td style="padding-left: 10%"><?php print $row['nombre']?></td>

                    
                    <?php if ($row['duracion']==1) { ?>
                        <td style="padding-left: 10%">30 minutos</td>
                    <?php } ?>

                    <?php if ($row['duracion']==2) { ?>
                        <td style="padding-left: 10%">1 hora</td>
                    <?php } ?>

                    <?php if ($row['duracion']==3) { ?>
                        <td style="padding-left: 10%">1 hora 30 minutos</td>
                    <?php } ?>

                    <?php if ($row['duracion']==4) { ?>
                        <td style="padding-left: 10%">2 horas</td>
                    <?php } ?>

                    <?php if ($row['duracion']==5) { ?>
                        <td style="padding-left: 10%">2 horas 30 minutos</td>
                    <?php } ?>

                    <?php if ($row['duracion']==6) { ?>
                        <td style="padding-left: 10%">3 horas</td>
                    <?php } ?>
                    
                    



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
</div> 