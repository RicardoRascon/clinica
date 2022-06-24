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

  <title>Clínica S.U.T.S.P.E.S.</title>

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
          <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Registro de Doctores</h1>

                  <?php if (!empty($message)): ?>
                    <p><?= $message ?></p>
                  <?php endif;?>
                </div>
                <form class="user" method="post" id="doc" name="doc" target="">
                  <div class="form-group row">
                    
                    <div class="col-sm-6">
                      <input type="text" class="form-control " id="nombre" name="nombre"
                        placeholder="Ingresa el Nombre">
                    </div>




                    <div class="col-sm-6">
                      
                        <select name="turno" id="turno" class="form-control ">  
          <option disabled selected>Seleccione Turno</option> 
           <option value="1">Matutino</option>
            <option value="2">Vespertino</option>  
             <option value="3">Doble Turno</option> 
          
            
        </select>


                    </div>




                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
      <input type="text" class="form-control " id="especialidad" name="especialidad"
                        placeholder="Ingresa la Especialidad">
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 ">
                      <select class="form-control" name="activo" id="activo">
                       <option value="" disabled selected>¿Activo o Inactivo?</option>
                        <option value="1">ACTIVO</option>
                        <option value="2">INACTIVO</option>

                      </select>
                    </div>

                    <div class="col-sm-6">
              <input type="text" class="form-control " id="cedula" name="cedula"
                        placeholder="Ingresa la Cédula Profesional">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
              <input type="text" class="form-control " id="telefono" name="telefono" placeholder="Ingresa el Teléfono">
                    </div>
                    <div class="col-sm-6">
           <input type="email" class="form-control " id="email" name="email" placeholder="Ingresa el email" >
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
              <input type="text" class="form-control " id="direccion" name="direccion"
                        placeholder="Ingresa la Dirección" >
                    </div>
                    
                  </div>
                  <!--<div class="form-group">
                    <input type="text" class="form-control form-control-user" id="usuario" name="usuario"
                      placeholder="Ingresa el nombre de Usuario">
                  </div>-->
                  <div class="form-group row">
                    <div class="col-sm-12">
                   <select name="docu" class="form-control " id="docu">  
                     <option disabled selected>Seleccione Doctor</option> 
                       <?php $sqldoc = "SELECT * FROM users WHERE status = 1 and asignado=0"; 
                         $stmt = $conn->prepare($sqldoc);
                    $stmt->execute();
                                                                  
                  while($row = $stmt->fetch() ) {
                      ?>
          <option value="<?php print $row['id']?>"><?php print $row['nombreCompleto']?></option>
                           <?php }?>

              </select>

                 </div>
                    
                  </div>
                  
                  <a><input type="button" name="registro" id="registro" value="Registrar Doctor" class="btn btn-primary " onclick="SaveDoc()"></a>
                  
                    
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
    
    
    function SaveDoc(){

      document.getElementById("registro").style.display = "none"; 
      
    $.ajax({
      type: "POST",
      url: "../clases/guardar_doctor.php",
      data: $("#doc").serialize(),
      cache: false,
      async: true,
      success: function(response){
        var str = response;
        str = str.replace(/^\s*|\s*$/g,"");
      //alert(str);
        if(str == "1"){
          alert("Registrado Ingresado con Exito");
          
          document.getElementById("doc").reset();
        document.getElementById("registro").style.display = "block"; 
        }else if(str == "2"){
          
          alert("Error al Crear Usuario");
          document.getElementById("registro").style.display = "block"; 
        }
        else if(str == "3"){
         
          alert("Existen Campos Vacíos");
         document.getElementById("registro").style.display = "block"; 
        
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
