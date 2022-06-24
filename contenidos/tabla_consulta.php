<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php'; 



    </script>";
    }
    
    require '../conexion/conexion.php';

    $username = $_SESSION['nombreSesion'];
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

         <script src="../js/jquery-1.11.0.min.js"></script>


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
                                        <div class="col-lg-10">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Busqueda de Tipos de Consulas</h1>
                                                    <form class="user" method="post" id="form_buscar" name="form_buscar">
                                                        <div class="form-group row">
                                                            <div class="col-sm-2 ">
                                                                <span> Buscar</span>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Ingresa el Nombre del Tipo de Consulta" >
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a><input type="button" name="boton_buscar" value="Buscar" class="btn btn-primary" onclick="Buscar()"></a>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a><input type="button" name="boton_usuario" value="Agregar Tipo de Consulta" class="btn btn-primary" onClick="window.location = '../contenidos/tipoConsulta.php'"></a>
                                                            </div>
                                                          
                                                        </div>
                                                    
                                                        <div class="form-group row">
                                                            <div class="panel-body">
                                                                <br>
                                                                <hr>
                                                                
                                                                 
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                  <div id="tabla_tipo_consultas"></div>
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
            function Buscar(){

                //$("#div_tabla").html($("#waiting_Layer").html());
                $.ajax({
                    type: "POST",
                    url: "../clases/tipo_consultas_code.php",
                    data: $("#form_buscar").serialize(),
                    cache: false,
                    async: true,
                    success: function(response){
                        var str = response;
                        str = str.replace(/^\s*|\s*$/g,"");
                       // alert(str);
                
                            $("#tabla_tipo_consultas").html(response);
                            TableAdvanced.init();

                        },
                    error: function(html, textStatus, errorThrown){
                        alert("No se ha podido realizar la operación.");
                    }
                });
            }   




             
        </script>
    </body>
</html> 