<?php session_start();


if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
  /*if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";


  }*/

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

  <title>Clínica S.U.T.S.P.E.S.</title>

  <!-- Custom fonts for this template-->
   
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
          <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Registro de Tipos de Consultas</h1>

                  <?php if (!empty($message)): ?>
                    <p><?= $message ?></p>
                  <?php endif;?>
                </div>
                <form class="user" method="post" id="tipoCon" name="tipoCon" target="">
                  <div class="form-group row">
                    <div class="col-sm-5">
                      <span> Nombre de la Consulta</span>
                      <input type="text" class="form-control " id="nombre" name="nombre"
                        placeholder="Ingresa el Nombre del Tipo de Consulta">
                    </div>

                    <div class="col-sm-5">
                      <span> Duración de la Consulta</span>
                      <select name="duracion" class="form-control " id="duracion">
                        <option disabled selected>Seleccione la Duración</option>
                        <option value="1">30 minutos</option>
                        <option value="2">1 hora</option>
                        <option value="3">1 hora con 30 minutos</option>
                        <option value="4">2 horas</option>
                        <option value="5">2 horas con 30 minutos</option>
                        <option value="6">3 horas</option> 
                      </select>
                    </div>
                    
                  </div>
                  <div class="form-group row">
                  
                    
                  </div>
                  
                  
                  <!--<div class="form-group">
                    <input type="text" class="form-control form-control-user" id="usuario" name="usuario"
                      placeholder="Ingresa el nombre de Usuario">
                  </div>-->
                  
                  <a><input type="button" name="registro" value="Registrar Tipo de Consulta" class="btn btn-primary" onclick="SaveTipoCon()"></a>
                  
                    
                 </form>
                  
                  
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

<script>
    

function SaveTipoCon(){
      
    $.ajax({
      type: "POST",
      url: "../clases/guardar_tipo_consulta.php",
      data: $("#tipoCon").serialize(),
      cache: false,
      async: true,
      success: function(response){
        var str = response;
        str = str.replace(/^\s*|\s*$/g,"");
      //alert(str);
        if(str == "1"){
          alert("Registrado Ingresado con Exito");
          
          document.getElementById("tipoCon").reset();
        
        }else if(str == "2"){
          
          alert("Error al Crear Tipo de Consulta");
          
        }
        else if(str == "3"){
         
          alert("Existen Campos Vacíos");
         
        
        }
        
      },
      error: function(html, textStatus, errorThrown){
        alert("No se ha podido realizar la operación.");
      }
    });
  }


</script>




</body>

</html>
