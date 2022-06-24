<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
require '../conexion/conexion.php';

$username = $_SESSION['nombreSesion'];

$Permisos = $_SESSION['permisos'];
?>

<!DOCTYPE html>
<html lang="en">
 
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de Clientes</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/fonts1.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">


 <script src="../js/jquery-1.11.0.min.js"></script>
  
  
<script src="../js/bootstrap.min.js"></script>


  
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

    
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 ">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                     
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personales</a>

                                    
                                    </div>
                                </nav>
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">


                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><div id="divex"><div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Datos del Paciente</h1>
                                        <?php if (!empty($message)) : ?>
                                        <p><?= $message ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" method="post" name="formclientes" id="formclientes" target="" enctype=multipart/form-data> 
                                        <div class="form-group row">

                                            <div class="col-sm-6 ">
                                                <select class="form-control" name="tipo" id="tipo"   onchange="pen(this.value)">
                                                    <option value="" disabled selected>Seleccione Tipo</option>
                                                    <option value="0">AGREMIADO</option>
                                                    <option value="1">EXTERNO</option>

                                                </select>
                                            </div>


                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control" id="pension" name="pension" placeholder="Ingresa el numero de Pension" style="display:none">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre Completo">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6 ">
                                                <select class="form-control" name="sexo" id="sexo"  >
                                                    <option value="" disabled selected>Seleccione Sexo</option>
                                                    <option value="Masculino">MASCULINO</option>
                                                    <option value="Femenino">FEMENINO</option>

                                                </select>
                                            </div>

                                            <div class="col-sm-6 ">
                                                <select class="form-control" name="edoCivil" id="edoCivil"  >
                                                    <option value="" disabled selected>Seleccione Estado Civil</option>
                                                    <option value="Soltero/a">Soltero/a</option>
                                                    <option value="Comprometido/a">Comprometido/a</option>
                                                    <option value="Casado/a">Casado/a</option>
                                                    <option value="Unión libre">Unión libre</option>
                                                    <option value="Separado/a">Separado/a</option>
                                                    <option value="Divorciado/a">Divorciado/a</option>
                                                    <option value="Viudo/a">Viudo/a</option>

                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control" id="direccion" name="direccion" placeholder="Ingresa la Dirección">
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6">
                                                <input type="email" class="form-control form-control" id="email" name="email" placeholder="Ingresa el Email">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control" id="ocupacion" name="ocupacion" placeholder="Ingresa la Ocupación">
                                            </div>




                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control" id="telefono" name="telefono" placeholder="Ingresa el Teléfono">
                                            </div>

                                        </div>
                                        


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Ingrese Fecha de Nacimiento
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="date" class="form-control form-control" id="fechanac" name="fechanac" placeholder="Ingresa la Fecha de Nacimiento">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-4 ">
                                                <span> Ingrese la Imagen</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class="btn btn-primary " type="file" value="Examinar" name="imagen" id="imagen">
                                            </div>
                                        </div>


                                        <hr class="sidebar-divider d-none d-md-block">
                                        <!-- <div class="form-group row">-->
                                        <a><input type="button"  name="siguiente" style="margin-left: 80%" value="Registrar Paciente" class="btn btn-primary " onclick="revisar_campos_principal()" ></a>


                                 
                           
                    </div>




 
                </form>
                </div>
              </div>
        </div>
      </div>
</div>
</div>

 <?php include '../clases/footer.php'; ?>
                 
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->



        <!-- Scroll to Top Button-->
          <?php include '../clases/logoutModal.php'; ?>


    <script>


        function revisar_campos_principal(){

            var tipo = document.getElementById("tipo").value;
            var pension = document.getElementById("pension").value;
            var nombre = document.getElementById("nombre").value;
            var sexo = document.getElementById("sexo").value;
            var dir = document.getElementById("direccion").value;
            var email = document.getElementById("email").value;
            var tel = document.getElementById("telefono").value;
            var fec = document.getElementById("fechanac").value;
            var ocu = document.getElementById("ocupacion").value;
            var ecivil = document.getElementById("edoCivil").value;


            if (tipo =='')  {

                alert('Falta el campo Tipo.. ');
                document.getElementById("tipo").focus();

            } else if (tipo==0 && pension =='')  {

                alert('Falta el campo Pension.. ');
                document.getElementById("pension").focus();

            } else if (nombre =='')  {

                alert('Falta el campo Nombre.. ');
                document.getElementById("nombre").focus();

            } else if (sexo =='')  {

                alert('Falta el campo Sexo.. ');
                document.getElementById("sexo").focus();

            } else if (dir=='')  {

                alert('Falta el campo Dirección.. ');
                document.getElementById("direccion").focus();

            } else if (email =='')  {

                alert('Falta el campo Email.. ');
                document.getElementById("email").focus();

            } else if (tel =='')  {

                alert('Falta el campo Telefono.. ');
                document.getElementById("telefono").focus();

            } else if (fec =='')  {

                alert('Falta el campo Fecha de Nacimiento.. ');
                document.getElementById("fechanac").focus();

            } else if (ocu == '') {

                alert('Falta el campo Ocupación.. ');
                document.getElementById("ocupacion").focus();

            } else if (ecivil =='') {

                alert('Falta el campo Estado Civil.. ');
                document.getElementById("edoCivil").focus();

            } else {
                SaveClient();
            }
        }

      


        function SaveClient() {
            //alert("si entra ");

            var file_data = $('#imagen').prop('files')[0];

            var tipo = $('#tipo').val();
            var pension = $('#pension').val();
            var nombre = $('#nombre').val();
            var direccion = $('#direccion').val();
            var email = $('#email').val();
            var telefono = $('#telefono').val();
            var fechanac = $('#fechanac').val();
            var sexo = $('#sexo').val();
            var ocupacion = $('#ocupacion').val();
            var edoCivil = $('#edoCivil').val();


           


            var form_data = new FormData();
            form_data.append('tipo', tipo);
            form_data.append('pension', pension);
            form_data.append('nombre', nombre);
            form_data.append('direccion', direccion);
            form_data.append('email', email);
            form_data.append('telefono', telefono);
            form_data.append('fechanac', fechanac);
            form_data.append('sexo', sexo);
            form_data.append('ocupacion', ocupacion);
            form_data.append('edoCivil', edoCivil);

            form_data.append('file', file_data);


          

            $.ajax({
                //alert('xzzcz');

                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                url: "../clases/guardar_cliente.php", 
                async: true,


                success: function(response) {
                    var str = response;
                    str = str.replace(/^\s*|\s*$/g, "");
                   //alert(str);
                    if (str == "1") {
                        alert("Registrado Ingresado con exito");
                      
                        window.location.href = '../contenidos/citas.php';
                        
                    }  else if (str == "4") {
                        var r = confirm("Desea Guardar sin Imagen?");
                        if (r == true) {
                            alert("Guardado Correctamente");
                        

                    window.location.href = '../contenidos/citas.php';



                        } else {

                        }
                    }

                },
                error: function(html, textStatus, errorThrown) {
                    alert("No se ha podido realizar la operación.");
                }
            });
        }




        $('#btn1').click(function(e){
    e.preventDefault();
    $('#mytabs a[href="#nav-profile"]').tab('show');
})
    </script>

</body>

</html>

<script>
    function pen(b) {
        //alert(b);
        if (b == 0) {
            document.getElementById('pension').style.display = "block";
        } else {
            document.getElementById('pension').style.display = "none";
        }

    }




</script> 


