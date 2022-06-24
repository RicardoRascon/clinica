<?php session_start(); 



if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>"; 
    }

    $id_user = $_SESSION['user_id'];

    require '../conexion/conexion.php';

    $username = $_SESSION['nombreSesion'];


    $sqlus = "SELECT * FROM users WHERE id = '$id_user'";

    $stmt = $conn->prepare($sqlus);
    $stmt->execute();
    $row = $stmt->fetch();


  $sqld = "SELECT * FROM doctores WHERE id_user = '".$row['id']."' ";

    $stmtd = $conn->prepare($sqld);
    $stmtd->execute();
    $rowd = $stmtd->fetch();


?>
<!DOCTYPE html>
<html lang="en">
 
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <style type="text/css">

.modal1 > .modal-dialog {
    width:100% !important;
}
        </style>

        <title>Clínica S.U.T.S.P.E.S.</title>

        <!-- Custom fonts for this template-->
        

        <link href="../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this template-->

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../complete/migrate.js"></script>

  
 

         <script  src="../datatable/jquery.dataTables.js" type="text/javascript"></script>

             <script src="../datatable/dataTables.tableTools.min.js"></script>

         <script src="../datatable/dataTables.bootstrap.js"></script>

        <script src="../datatable/table-advanced.js"></script>
        
     
         <script src="../js/bootbox.min.js" type="text/javascript"></script>
        </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include '../clases/menuPage.php'; ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <?php include '../clases/topBar.php'; ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1>Reporte Doctores</h1><br>
                                                   
                                                        <div class="form-group row">
                                                           
                                                            <div class="col-sm-3">
                                                                
                                                                <span>Personal</span>

                                                                <select name="doc" class="form-control form-control-user" id="doc">  
                                                                  <option disabled selected value="">Seleccione Doctor</option> 
                                                                  <?php $sqldoc = "SELECT * FROM doctores WHERE activo = 1"; 

                                                                    $stmt = $conn->prepare($sqldoc);
                                                                    $stmt->execute();
                                                                  
                                                                    while($row = $stmt->fetch() ) {
                                                                   
                                                                  ?>
      
                                                                  <option value="<?php print $row['id']?>"><?php print $row['nombre']?></option>
                                                                      <?php }?>

                                                                </select>
                                                            </div>

                                                            
                                            
                                                              <div class="col-sm-2 ">
                                                                <span>Fecha Inicial</span>
                                                                <input type="date" class="form-control form-control" id="fechaI" name="fechaI">
                                                              </div>

                                                              <div class="col-sm-2 ">
                                                                <span>Fecha Final</span>
                                                                <input type="date" class="form-control form-control" id="fechaF" name="fechaF">
                                                              </div>



                                                              <div class="col-sm-3">
                                                                
                                                                <span>Consulta</span>

                                                                <select name="consulta" class="form-control form-control-user" id="consulta">  
                                                                  <option value ='' >Seleccione Consulta</option> 
                                                                  <?php $sqldoc = "SELECT * FROM tipo_consulta WHERE activo = 1"; 

                                                                    $stmt = $conn->prepare($sqldoc);
                                                                    $stmt->execute();
                                                                  
                                                                    while($row = $stmt->fetch() ) {
                                                                   
                                                                  ?>
      
                                                                  <option value="<?php print $row['id']?>"><?php print $row['nombre']?></option>
                                                                      <?php }?>

                                                                </select>
                                                            </div>
                                      

                                                            <div class="col-sm-2">
                                                                
                                                                <span>Status</span>

                                                                <select name="status" class="form-control form-control-user" id="status">  
                                                                  <option value ='' >Seleccione Status</option> 
                                                                  <option value = 0> Pendientes</option>
                                                                  <option value = 1> Concluidas</option>
                                                                  <option value = 2> Canceladas</option>
      
                                                                  

                                                                </select>
                                                            </div>

                                                          
                                                            
                                                          
                                                        </div><br><center>
                                                          <div class="col-sm-1" >
                                                                <a><input type="button" name="boton_buscar" value="Buscar" class="btn btn-success btn-user btn-block pull-right" onclick="Buscar()"></a>
                                                            </div>
                                                    
                                                        <div class="form-group row">
                                                            <div class="panel-body">
                                                                <br>
                                                                <hr>
                                                                
                                                                 
                                                            </div>
                                                        </div>
                                            
                                                </div>
                                                  <div id="tabla_cliente"></div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                    <!-- Footer -->
                    <?php include '../clases/footer.php'; ?>
                    <!-- End of Footer -->
                </div>
                <!-- End of Content Wrapper -->
            </div>
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
          <?php include '../clases/logoutModal.php'; ?>



        <script>


  


$(document).keypress(function(event){
    
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
       Buscar();    
    }
    
});


            function Buscar(){
              var doc= document.getElementById('doc').value;

         
              var fechaI= document.getElementById('fechaI').value;
              var fechaF= document.getElementById('fechaF').value;
              var consulta= document.getElementById('consulta').value;
              var status= document.getElementById('status').value;

                //$("#div_tabla").html($("#waiting_Layer").html());
                $.ajax({
                    type: "POST",
                    url: "../clases/rep_doc_code.php",
                      data: "doc="+ doc + "&fechaI=" + fechaI + "&fechaF=" + fechaF + "&consulta=" + consulta + "&status=" + status,
                    cache: false,
                    async: true,
                    success: function(response){
                        var str = response;
                        str = str.replace(/^\s*|\s*$/g,"");
                       // alert(str);
                
                            $("#tabla_cliente").html(response);
                            TableAdvanced.init();

                        },
                    error: function(html, textStatus, errorThrown){
                        alert("No se ha podido realizar la operación.");
                    }
                });
            }   


      function ver(id){ 

   var str = "";
    $.ajax({
        type: "POST",
        url: "citas/ver_res.php",
        data: "id="+ id,
        cache: false,
        async: true,
        success: function(response){
            str = response;
            str = str.replace(/^\s*|\s*$/g,"");
         // alert(str);

            bootbox.dialog({
                message: str,
                className: "modal1",
                
                buttons: {
                  main: {
                    label: "Cerrar",
                    className: "btn btn-danger",
                    callback: function() {
                      //alert("Primary button");
                    }
                  },
                  
                }
            });
            
        },
        error: function(html, textStatus, errorThrown){
            alert("No se ha podido realizar la operación.");
        }
    });

    
}       






    




        </script>
    </body>
</html> 