<?php session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 
    window.location='../../index.php'; 
    </script>";
    }
    require '../../conexion/conexion.php';
    $where='';
    $username = $_SESSION['nombreSesion']; 
    $producto= $_POST['producto'];

if($_POST['producto'] != '') $where .= " AND descripcion LIKE '%".$_POST['producto']."%'";


       ?>
<div class="portlet box purple-plum">
    <div class="portlet-title">
    </div>
    <div class="portlet-body">
        <table width="100%" class="table table-striped table-hover" id="sample_usuarios2">
            <thead>
                <tr>
                	
                    <th width="20%"> Id </th>
                    <th width="20%"> Descripcion </th>
                    <th width="20%"> Cantidad </th>
                    <th width="20%">Unidad </th>
                    <th width="20%"> Opcion </th>
                   
                </tr>
            </thead>

            <tbody>

            	<?php

                    $sql = "SELECT * FROM productos WHERE  descripcion != '' ".$where." "; 

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch() ) {

                        if ($total_unidades=$row['umax']) {
                            $cantidad=$row['cantidad']-1;
                            # code...
                        }else {
                           $cantidad=$row['cantidad'];
                        }
				              ?>
                        <?php if ($cantidad<=$row['stockmin']){
                        ?>

                         <tr class="odd gradeX" style="background-color: red; color: #fff">
            
                	    <?php }else{ ?>

                           <tr class="odd gradeX">

                             <?php }?>

                    <td  width="25%"><?php print $row['id']?></td>
                    <td  width="25%"><?php print $row['descripcion']; ?></td>
                    
                    <td  width="25%"><?php print $cantidad; ?></td>

                     <td  width="25%"><?php print  $total_unidades=($row['umax']-$row['unidad']);?></td>
                    <td  width="25%"><a  title="Editar" href="javascript:;" 
                        onclick="javascript: edituser('<?php print $row['id'] ?>')">  

                         <a  title="Actualizar" href="javascript:;"
                             onclick="javascript: update_inv('<?php print $row['id'] ?>')">  
                        <img src="../img/update.png" alt="Activar" height="35" width="35"></a>
                 
                        </td>

                </tr>
                <?php } 
				?>

            </tbody>
        </table>
    </div>
</div> 

 <form id="envia_excel1" name="envia_excel1" method="post" action="../php/rep_inventario_xls.php" style="margin:0px; border:0px">

      <input type="hidden" value="<?=$sql?>" name="la_query" id="la_query">
  
        <input type="hidden" value="reporte_de_inventario" name="nombre_archivo" id="nombre_archivo">
       <center><input type="submit" value="Exportar" name="imprimir"> 
    </div>