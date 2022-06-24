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
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Busqueda de Clientes</h1>
                                                   
                                                        <div class="form-group row">
                                                          
                                                                <h1 class="h4 text-gray-900 mb-4">Buscar</h1>
                                                            
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control form-control-user" id="cliente" name="cliente" placeholder="Dato de Busqueda">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a><input type="button" name="boton_buscar" value="Buscar" class="btn btn-success btn-user btn-md" onclick="Buscar()"></a>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a><input type="button" name="boton_cliente" value="Agregar Cliente" class="btn btn-primary btn-user btn-md" onClick="window.location = '../contenidos/registroClientes.php'"></a>
                                                            </div>
                                                          
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
var cliente= document.getElementById('cliente').value;
                //$("#div_tabla").html($("#waiting_Layer").html());
                $.ajax({
                    type: "POST",
                    url: "../clases/clientes_code.php",
                      data: "cliente="+ cliente,
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




             function deleteuser(id,nom){

                var id1=id;
                  var nomcom=nom;
                 
                var r = confirm("Desea Eliminar el usuario "+ nomcom +"?...");
                        if (r == true) {
                $.ajax({
                    type: "POST",
                    url: "clientes/delete_clientes.php",
                    data: "id1="+ id1 ,
                    cache: false,
                    async: true,
                    success: function(response){
                        var str = response;
                        str = str.replace(/^\s*|\s*$/g,"");
                        //alert(str);
                         if (str == "1") {
                        alert("Registro Eliminado con exito");
                       Buscar();
                        
                    } if (str == "2") {
                        alert("Error al Eliminar.... Favor de Comunicarse con el Administrador del Sistema..");
                       
                        
                    } 
                           

                        },
                    error: function(html, textStatus, errorThrown){
                        alert("No se ha podido realizar la operación.");
                    }
                });


                } else {

                        }
            }   






            function edituser(id){ 

          
   var str = "";
    $.ajax({
        type: "POST",
        url: "clientes/edit_clientes.php",
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
                    label: "Cancelar",
                    className: "btn btn-danger",
                    callback: function() {
                      //alert("Primary button");
                    }
                  },

                  success: {


                    label: "Guardar Datos",
                    className: "btn btn-primary",
                    callback: function() {



                var padecimientoActual = document.getElementById("padecimientoActual").value;

                if (padecimientoActual =='') {

                alert('Falta el campo Padecimiento Actual.. ');
            
               document.getElementById("padecimientoActual").focus();
                 $('#nav-profile-tab').tab('show');
                
                str.abort();
              
                 //$("#nav-profile-tab").focus();
                              }

                              else if (txmedico =='') {

                alert('Falta el campo Tx Médico.. ');
                document.getElementById("txmedico").focus();
                 $('#nav-profile-tab').tab('show');
                 str.abort();

            } else if (hSueno =='') {

                alert('Falta el campo Horas de Sueño.. ');
                document.getElementById("hSueno").focus();
                 $('#nav-profile-tab').tab('show');
                 str.abort();

            } else if (txEstetico =='') {

                alert('Falta el campo Tx Estético.. ');
                document.getElementById("txEstetico").focus();
                 $('#nav-profile-tab').tab('show');
                 str.abort();

            } else if (cosmeticos =='') {

                alert('Falta el campo Cosméticos.. ');
                document.getElementById("cosmeticos").focus();
                 $('#nav-profile-tab').tab('show');
                 str.abort();

            }




            var color = document.getElementById("color").value;
            var espesor = document.getElementById("espesor").value;
            var poro = document.getElementById("poro").value;
            var sebacea = document.getElementById("sebacea").value;
            var fragilidad = document.getElementById("fragilidad").value;
            var lesiones = document.getElementById("lesiones").value;
            var menciones = document.getElementById("menciones").value;
            var hidratacion = document.getElementById("hidratacion").value;
            var diagFac = document.getElementById("diagFac").value;
            var expCorp = document.getElementById("expCorp").value;
            var grasa = document.getElementById("grasa").value;
            var flacidez = document.getElementById("flacidez").value;
            var celulitis = document.getElementById("celulitis").value;
            var estrias = document.getElementById("estrias").value;
            var varices = document.getElementById("varices").value;
            var peso = document.getElementById("peso").value;
            var imc = document.getElementById("imc").value;
            var obs = document.getElementById("obs").value;
            var diagCor = document.getElementById("diagCor").value;
            var txCab = document.getElementById("txCab").value;

            if (color =='') {

                alert('Falta el campo Color.. ');
                document.getElementById("color").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();


            } else if (espesor =='') {

                alert('Falta el campo Espesor.. ');
                document.getElementById("espesor").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (poro =='') {

                alert('Falta el campo Poro.. ');
                document.getElementById("poro").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (sebacea =='') {

                alert('Falta el campo Secreción Sebacea.. ');
                document.getElementById("sebacea").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (fragilidad =='') {

                alert('Falta el campo Fragilidad.. ');
                document.getElementById("fragilidad").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (lesiones =='') {

                alert('Falta el campo Lesiones.. ');
                document.getElementById("lesiones").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (menciones =='') {

                alert('Falta el campo Menciones.. ');
                document.getElementById("menciones").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (hidratacion =='') {

                alert('Falta el campo Hidratación.. ');
                document.getElementById("hidratacion").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (diagFac =='') {

                alert('Falta el campo Diagnostico Facial.. ');
                document.getElementById("diagFac").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (expCorp =='') {

                alert('Falta el campo Exploración Corporal.. ');
                document.getElementById("expCorp").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (grasa =='') {

                alert('Falta el campo Grasa.. ');
                document.getElementById("grasa").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (flacidez =='') {

                alert('Falta el campo Flacidez.. ');
                document.getElementById("flacidez").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (celulitis =='') {

                alert('Falta el campo Celulitis.. ');
                document.getElementById("celulitis").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (estrias =='') {

                alert('Falta el campo Estrias.. ');
                document.getElementById("estrias").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (varices =='') {

                alert('Falta el campo Varices.. ');
                document.getElementById("varices").focus();
                $('#nav-contact-tab').tab('show');

                str.abort();

            } else if (peso =='') {

                alert('Falta el campo Peso.. ');
                document.getElementById("peso").focus();
                $('#nav-contact-tab').tab('show');


                 str.abort();

            }  else if (imc =='') {

                alert('Falta el campo IMC.. ');
                document.getElementById("imc").focus();
                $('#nav-contact-tab').tab('show');
                 str.abort();

            } else if (obs =='') {

                alert('Falta el campo Observaciones.. ');
                document.getElementById("obs").focus();
                $('#nav-contact-tab').tab('show');
                 str.abort();

            } else if (diagCor =='') {

                alert('Falta el campo Diagnostico Corporal.. ');
                document.getElementById("diagCor").focus();
                $('#nav-contact-tab').tab('show');
                 str.abort();

            

             
          }  else

           var recomendacion = document.getElementById("recomendacion").value;



           if (recomendacion =='') {

                alert('Falta el campo Recomendaciones.. ');
                document.getElementById("recomendacion").focus();
                 $('#nav-about-tab').tab('show');
                 str.abort();

            }


                      $.ajax({
                        type: "POST",
                        url: "clientes/forma_update_clientes.php",
                        data: $("#forma_update_user").serialize(),
                        cache: false,
                        async: true,
                        success: function(response){
                            var str = response;
                            str = str.replace(/^\s*|\s*$/g,"");
                         //  alert(str);

                            if(str==2){
                                alert('Error al Guardar');
                                Buscar();
                            }

                            if(str == 1){
                            
                                alert("Registro Guardado");
                                Buscar();
                            }
                                //document.getElementById("forma_registrar").reset();
                                //$("#myModal").modal('toggle');
                            
                        },
                        error: function(html, textStatus, errorThrown){
                            alert("No se ha podido realizar la operación.");
                        }
                    });
                    }
                  }
                }
            });
            
        },
        error: function(html, textStatus, errorThrown){
            alert("No se ha podido realizar la operación.");
        }
    });

    
}


 function veruser(id){ 
    //alert('ok');
   var str = "";
    $.ajax({
        type: "POST",
        url: "clientes/ver_clientes.php",
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
                    label: "Cancelar",
                    className: "btn btn-danger",
                    callback: function() {
                      //alert("Primary button");
                    }
                  },
                  success: {
                    label: "Actualizar Datos",
                    className: "btn btn-primary",
                    callback: function() {
                      $.ajax({
                        type: "POST",
                        url: "clientes/forma_update_clientes2.php",
                        data: $("#forma_update_user").serialize(),
                        cache: false,
                        async: true,
                        success: function(response){
                            var str = response;
                            str = str.replace(/^\s*|\s*$/g,"");
                         //  alert(str);

                            if(str==2){
                                alert('No se Actualizo Ningun Dato');
                                Buscar();
                            }

                            if(str == 1){
                            
                                alert("Registro Actualizado");
                                Buscar();
                            }
                                //document.getElementById("forma_registrar").reset();
                                //$("#myModal").modal('toggle');
                            
                        },
                        error: function(html, textStatus, errorThrown){
                            alert("No se ha podido realizar la operación.");
                        }
                    });
                    }
                  }
                }
            });
            
        },
        error: function(html, textStatus, errorThrown){
            alert("No se ha podido realizar la operación.");
        }
    });

    
}



function gencita(id){ 
    //alert('ok');
   var str = "";
    $.ajax({
        type: "POST",
        url: "citas/gen_cita.php",
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
                    label: "Cancelar",
                    className: "btn btn-danger",
                    callback: function() {
                      //alert("Primary button");
                    }
                  },
                  success: {
                    label: "Generar Cita",
                    className: "btn btn-primary",
                    
                    callback: function() {


      var file_data = $('#archivo').prop('files')[0];
      var id1 = $('#id1').val();
      var turn1 = $('#turn1').val();
    var doc = $('#doc').val();

var tipo_consulta = $('#tipo_consulta').val();
var hora_consulta = $('#hora_consulta').val();
var fecha = $('#fecha').val();
var coments = $('#coments').val();

    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('id1', id1);
    form_data.append('turn1', turn1);
    form_data.append(' doc',  doc);
    
    form_data.append('tipo_consulta', tipo_consulta);
      form_data.append('hora_consulta', hora_consulta);
    form_data.append('fecha', fecha);
    form_data.append('coments', coments);

 $.ajax({
           dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                        type: "POST",
                        url: "../clases/guardar_cita.php",
                        async: true,
                        success: function(response){
                            var str = response;
                            str = str.replace(/^\s*|\s*$/g,"");
                            //alert(str);

                            if(str==2){
                                alert('Error al Generar Cita');
                                
                            }

                            if(str == 1){
                            
                                alert("Cita Registrada");
                                Buscar();
                            }
                                //document.getElementById("forma_registrar").reset();
                                //$("#myModal").modal('toggle');
                            
                        },
                        error: function(html, textStatus, errorThrown){
                            alert("No se ha podido realizar la operación.");
                        }
                    });
                    }
                  }
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