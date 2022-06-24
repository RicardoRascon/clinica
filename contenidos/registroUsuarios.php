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

    <title>Registro de Usuario</title>



    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/fonts1.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    
 <script src="../js/jquery-1.11.0.min.js"></script>
  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php include '../clases/menuPage.php';?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <?php include '../clases/topBar.php';?>

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Registro de Usuario</h1>

                  <?php if (!empty($message)): ?>
                    <p><?= $message ?></p>
                  <?php endif;?>
                </div>
                <form class="user" method="post" id="user" name="user" target="">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control " id="nombre" name="nombre"
                        placeholder="Ingresa el Nombre">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control " id="apellido" name="apellido"
                        placeholder="Ingresa el Apellido">
                    </div>
                  </div>


                
                  <!--<div class="form-group">
                    <input type="text" class="form-control form-control-user" id="usuario" name="usuario"
                      placeholder="Ingresa el nombre de Usuario">
                  </div>-->
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control " id="password" name="password"
                        placeholder="Contraseña">
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control " id="repitePassword"
                        name="repitePassword" placeholder="Confirmar Contraseña">
                    </div>
                  </div>
                  <a><input type="button" name="registro" value="Registrar Cuenta" class="btn btn-primary " onclick="SaveUser()"></a>
                  
                    
                 
                  
                  <div id="cargar"> </div>
              </div>
            </div>
          </div>
        </div>
      </div><br>

          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include '../clases/footer.php';?>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
      <?php include '../clases/logoutModal.php'; ?>
    <!--<div id="waiting_Layer" style="visibility:hidden;"><br />
    <fieldset style="background-color:transparet;">      
        <table width="100%" height="20" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td >
                  <img src="../img/loader.gif" border="0" width="30px"/>
                </td>
                <td width="98%" align="left">
                  &nbsp;Cargando Datos, espere...
                </td>
            </tr>
        </table>
    </fieldset>
  </div> -->
    </div>
    <script>
    
    
    function SaveUser(){
      $("#cargar").html($("#waiting_Layer").html());
    $.ajax({
      type: "POST",
      url: "../clases/guardar_user.php",
      data: $("#user").serialize(),
      cache: false,
      async: true,
      success: function(response){
        var str = response;
        str = str.replace(/^\s*|\s*$/g,"");
      //alert(str);
        if(str == "1"){
          alert("Registrado Ingresado con exito");
          //document.getElementById("waiting_Layer").style.visibility="hidden";
          document.getElementById("user").reset();
        //  $("#myModal").modal('toggle');
        }else if(str == "2"){
          //|1document.getElementById("waiting_Layer").style.visibility="hidden";
          alert("Error al crear Usuario/ posible duplicado");
          //$("#div_error").html(str);
        }
        else if(str == "3"){
         
          alert("Contraseñas no Coinciden favor de intentarlo de nuevo...");
          document.getElementById("cargar").style.display="none";
        
        }
        
      },
      error: function(html, textStatus, errorThrown){
        alert("No se ha podido realizar la operación.");
      }
    });
  }</script>


  </body>



  </html> 