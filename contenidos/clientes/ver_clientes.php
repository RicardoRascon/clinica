<?php session_start();
    require '../../conexion/conexion.php';

    $idu=$_POST['id'];

$username = $_SESSION['nombreSesion'];

$Permisos = $_SESSION['permisos'];

$sql = "SELECT * FROM clientes a

inner join exploracion b on (a.id=b.id_cliente)
inner join plantratamiento c on(a.id=c.id_cliente)
inner join antecedentes d on(a.id=d.id_cliente)

 WHERE  a.id = '$idu' "; 

        $stmt = $conn->prepare($sql);
    	$stmt->execute();
          $row = $stmt->fetch();




?>
<style type="text/css">
	img.alineado{
  vertical-align: middle;
}


</style>

  <div class="container-fluid">
<form action="#" name="forma_update_user" id="forma_update_user" class="horizontal-form">
    <input type="hidden" id="id1" name="id1" value="<?php print $idu ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 ">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <?php if ($Permisos=='1'){ ?>
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personales</a>

                                        <?php }else{

                                        ?>
                          
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" name="nav-home-tab">Personales</a>

                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" name="nav-profile-tab">Antecedentes</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" name="nav-contact-tab">Exploración</a>

                                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false" name="nav-about-tab">Plan de Tratamiento</a>

                                        <?php } ?>
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

                                       <div class="col-sm-3 mb-3 mb-sm-0">
      
                          <img class="alineado" src="<?php print $row["foto"];?>" alt="Foto" height="200" width="180"> 
                                           </div>


                                         <div class="col-xs-6 col-sm-8">



      <label for="exampleInput1"><b>Pension:</b></label>
      <input type="text" class="form-control" id="pension" name="pension" value="<?php print $row['pension'] ?>">
   

      <label for="exampleInput2"><b>Nombre Completo:</b></label>

      <input type="text" class="form-control"  id="nombre" name="nombre" value="<?php print $row['nomcom'] ?>" >

      <label for="exampleInput1"><b>Dirección:</b></label>

      <input type="text" class="form-control" id="direccion" name="direccion" value="<?php print $row['direccion'] ?>">
          </div>
   

      


    </div>
     <div class="form-group row">

                                            <div class="col-sm-3 ">
      <label for="exampleInput2"><b>Email:</b></label>
       <input type="text" class="form-control"  id="email" name="email" value="<?php print $row['email'] ?>" >
      </div>
     

     

                                            <div class="col-sm-3">

      <label for="exampleInput2"><b>Teléfono:</b></label>
        <input type="text" class="form-control"  id="telefono" name="telefono" value="<?php print $row['telefono'] ?>" >
    
      </div>
      
    

 

                                            <div class="col-sm-3 ">

      <label for="exampleInput2"><b>Fecha de Nacimiento:</b></label>


      <input type="date" class="form-control form-control-user" id="fechanac" name="fechanac" value="<?php print $row['fechanac'] ?>" >
      </div>

     
                                        
          <div class="col-md-3">
            <div class="form-group">

              <label><b>Sexo</b></label>
              <div class="input-group">
              

                <select class="form-control input-sm" name="update_sexo" id="update_sexo">
                  <OPTION VALUE="<?php print $row['sexo'] ?>">

                  <?php 
                  if ($row['sexo']=='Femenino') {
                   echo'Femenino'; }
                  if ($row['sexo']=='Masculino') {
                   echo'Masculino'; } 
                   ?>

                  </OPTION>
                  <OPTION VALUE="Femenino">Femenino</OPTION>
                  <OPTION VALUE="Masculino">Masculino</OPTION>

                </select>
              </div>
            </div>
          </div>



  <div class="col-md-3">
            <div class="form-group">

              <label><b>Estado Civil:</b></label>
              <div class="input-group">
              

                <select class="form-control input-sm" name="update_edoCivil" id="update_edoCivil">
                  <OPTION VALUE="<?php print $row['edoCivil'] ?>">

                  <?php 
                  if ($row['edoCivil']=='Soltero/a') {
                   echo'Soltero/a'; }
                  if ($row['edoCivil']=='Comprometido/a') {
                   echo'Comprometido/a'; } 
                   if ($row['edoCivil']=='Casado/a') {
                   echo'Casado/a'; } 
                   if ($row['edoCivil']=='Unión libre') {
                   echo'Unión libre'; } 
                   if ($row['edoCivil']=='Separado/a') {
                   echo'Separado/a'; } 
                   if ($row['edoCivil']=='Divorciado/a') {
                   echo'Divorciado/a'; } 
                   if ($row['edoCivil']=='Viudo/a') {
                   echo'Viudo/a'; } 
                   ?>

                  </OPTION>
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
          </div>
       
                                           
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                      <label><b>Ocupación:</b></label>
       <input type="text" class="form-control"  id="update_ocupacion" name="update_ocupacion" value="<?php print $row['ocupacion'] ?>" >
                                </div>


                                </div>     

                                    
                                        </div>
                               
                           
                    </div>




 <div class="tab-pane fade show " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div id="divex"><div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Antecedentes</h1>
                                        <?php if (!empty($message)) : ?>
                                        <p><?= $message ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" method="post" name="form_antecedentes" id="form_antecedentes" target="" enctype=multipart/form-data> 
                                  

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Antecedentes Hereditarios
                                            </div>
                                            <div class="col-sm-6 ">

                                            <?php if($row['cancer']==1){  ?>

   <input type="checkbox" name="update_cancer" id="update_cancer"  value="<?php print $row['cancer']; ?>" checked>Cancer
<?php    }   else{  ?>


<input type="checkbox" name="update_cancer" id="update_cancer"  value="<?php print $row['cancer']; ?>" >Cancer
<?php
}
    ?>

                                              <?php if($row['hipertension']==1){  ?>

   <input type="checkbox" name="update_hipertension" id="update_hipertension"  value="<?php print $row['hipertension']; ?>" checked>Hipertension <br>
<?php    }   else{  ?>


<input type="checkbox" name="update_hipertension" id="update_hipertension"  value="<?php print $row['hipertension']; ?>" >Hipertension <br>
<?php
}
    ?>


        <?php if($row['diabetes']==1){  ?>

   <input type="checkbox" name="update_diabetes" id="update_diabetes"  value="<?php print $row['diabetes']; ?>" checked>Diabetes 
<?php    }   else{  ?>


<input type="checkbox" name="update_diabetes" id="update_diabetes"  value="<?php print $row['diabetes']; ?>" >Diabetes 
<?php
}
    ?>



                                              <?php if($row['rosacea']==1){  ?>

   <input type="checkbox" name="update_rosacea" id="update_rosacea"  value="<?php print $row['rosacea']; ?>" checked>Rosacea <br>
<?php    }   else{  ?>


<input type="checkbox" name="update_rosacea" id="update_rosacea"  value="<?php print $row['rosacea']; ?>" >Rosacea <br>
<?php
}
    ?>


          <?php if($row['acne']==1){  ?>

   <input type="checkbox" name="update_acne" id="update_acne"  value="<?php print $row['acne']; ?>" checked>Acne 
<?php    }   else{  ?>


<input type="checkbox" name="update_acne" id="update_acne"  value="<?php print $row['acne']; ?>" >Acne 
<?php
}
    ?>


                                                 <?php if($row['cardiovasculares']==1){  ?>

   <input type="checkbox" name="update_cardiovasculares" id="update_cardiovasculares"  value="<?php print $row['cardiovasculares']; ?>" checked>Cardiovasculares <br>
<?php    }   else{  ?>


<input type="checkbox" name="update_cardiovasculares" id="update_cardiovasculares"  value="<?php print $row['cardiovasculares']; ?>" >Cardiovasculares <br>
<?php
}
    ?>



                                                Otro: <textarea class="form-control form-control" name="update_otroAntecedenteH" id="update_otroAntecedenteH" ><?php print $row['otroHered'] ?></textarea>
                                            </div>
                                        </div>
                                        <hr class="sidebar-divider d-none d-md-block">
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Antecedentes Personales
                                            </div>
                                            <div class="col-sm-6 ">

                                                Padecimiento Actual: <textarea class="form-control form-control" name="update_padecimientoActual" id="update_padecimientoActual" ><?php print $row['padecimiento'] ?></textarea>

                                                TX Médico: <textarea class="form-control form-control" name="update_txmedico" id="update_txmedico" ><?php print $row['txmedico'] ?></textarea>



          <?php if($row['fuma']==1){  ?>

   <input type="checkbox" name="update_fuma" id="update_fuma"  value="<?php print $row['fuma']; ?>" checked>Fuma  
<?php    }   else{  ?>


<input type="checkbox" name="update_fuma" id="update_fuma"  value="<?php print $row['fuma']; ?>" >Fuma  
<?php
}
    ?>


               <input type="text"  id="hrsueno" name="hrsueno" value="<?php print $row['hrsueno'] ?>" >Hrs de Sueño 



                                        <?php if($row['protesis']==1){  ?>

   <input type="checkbox" name="update_protesis" id="update_protesis"  value="<?php print $row['protesis']; ?>" checked>Prótesis <br>
<?php    }   else{  ?>


<input type="checkbox" name="update_protesis" id="update_protesis"  value="<?php print $row['protesis']; ?>" >Prótesis <br>
<?php
}
    ?>


           <?php if($row['alcohol']==1){  ?>

   <input type="checkbox" name="update_alcohol" id="update_alcohol"  value="<?php print $row['alcohol']; ?>" checked>Bebe Alcohol 
<?php    }   else{  ?>


<input type="checkbox" name="update_alcohol" id="update_alcohol"  value="<?php print $row['alcohol']; ?>" >Bebe Alcohol
<?php
}
    ?>


          <?php if($row['alergias']==1){  ?>

   <input type="checkbox" name="update_alergias" id="update_alergias"  value="<?php print $row['alergias']; ?>" checked>Alergias 
<?php    }   else{  ?>


<input type="checkbox" name="update_alergias" id="update_alergias"  value="<?php print $row['alergias']; ?>" >Alergias
<?php
}
    ?>


                                              <?php if($row['aparatos']==1){  ?>

   <input type="checkbox" name="update_aparatos" id="update_aparatos"  value="<?php print $row['aparatos']; ?>" checked>Aparatos <br>
<?php    }   else{  ?>


<input type="checkbox" name="update_aparatos" id="update_aparatos"  value="<?php print $row['aparatos']; ?>" >Aparatos <br>
<?php
}
    ?>


          <?php if($row['agua']==1){  ?>

   <input type="checkbox" name="update_agua" id="update_agua"  value="<?php print $row['agua']; ?>" checked>Toma Agua 
<?php    }   else{  ?>


<input type="checkbox" name="update_agua" id="update_agua"  value="<?php print $row['agua']; ?>" >Toma Agua
<?php
}
    ?>


            <?php if($row['drogas']==1){  ?>

   <input type="checkbox" name="update_drogas" id="update_drogas"  value="<?php print $row['drogas']; ?>" checked>Drogas
<?php    }   else{  ?>


<input type="checkbox" name="update_drogas" id="update_drogas"  value="<?php print $row['drogas']; ?>" >Drogas
<?php
}
    ?>




                                              <?php if($row['cirugias']==1){  ?>

   <input type="checkbox" name="update_cirugias" id="update_cirugias"  value="<?php print $row['cirugias']; ?>" checked>Cirugías <br>
<?php    }   else{  ?>


<input type="checkbox" name="update_cirugias" id="update_cirugias"  value="<?php print $row['cirugias']; ?>" >Cirugías <br>
<?php
}
    ?>

            <?php if($row['ejercicio']==1){  ?>

   <input type="checkbox" name="update_ejercicio" id="update_ejercicio"  value="<?php print $row['ejercicio']; ?>" checked>Hace Ejercicio
<?php    }   else{  ?>


<input type="checkbox" name="update_ejercicio" id="update_ejercicio"  value="<?php print $row['ejercicio']; ?>" >Hace Ejercicio
<?php
}
    ?>


                   <?php if($row['alimentacion']==1){  ?>

   <input type="checkbox" name="update_alimentacion" id="update_alimentacion"  value="<?php print $row['alimentacion']; ?>" checked>Alimentación <br>
<?php    }   else{  ?>


<input type="checkbox" name="update_alimentacion" id="update_alimentacion"  value="<?php print $row['alimentacion']; ?>" >Alimentación <br>
<?php
}
    ?>    
                                         
                                              

                                                Otro: <textarea class="form-control form-control" name="update_otroAntecedenteP" id="update_otroAntecedenteP" ><?php print $row['otroPersonales'] ?></textarea>

                                                Tx Estético: <textarea class="form-control form-control" name="update_txEstetico" id="update_txEstetico" placeholder="Describa"><?php print $row['txestetico'] ?></textarea>

                                                Cosméticos que usó o está usando actualmente: <textarea class="form-control form-control" name="update_cosmeticos" id="update_cosmeticos" ><?php print $row['cosmeticos'] ?></textarea>

                                                NOTA: <textarea class="form-control form-control" name="update_nota" id="update_nota" ><?php print $row['nota'] ?></textarea>
                                            </div>
                                        </div>
                                     
                                        </div>
                                 
                           
                    </div>


                    

                            <div class="tab-pane fade show " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div id="divex"><div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Exploración</h1>
                                        <?php if (!empty($message)) : ?>
                                        <p><?= $message ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" method="post" name="form_exploracion" id="form_exploracion" target="" enctype=multipart/form-data> 
                                        
                                        
                                        


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Color
                                            </div>
                                            <div class="col-sm-6 ">
                                               <input type="text" class="form-control"  id="update_color" name="update_color" value="<?php print $row['color'] ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Espesor
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_espesor" name="update_espesor" value="<?php print $row['espesor'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Poro
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_poro" name="update_poro" value="<?php print $row['poro'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Secreción Sebacea
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_secrecion" name="update_secrecion" value="<?php print $row['secrecion'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Fragilidad
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_fragilidad" name="update_fragilidad" value="<?php print $row['fragilidad'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Lesiones
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_lesiones" name="update_lesiones" value="<?php print $row['lesiones'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Menciones
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_menciones" name="update_menciones" value="<?php print $row['menciones'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Nivel de Hidratación
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_hidratacion" name="update_hidratacion" value="<?php print $row['nivelhidratacion'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Observaciones y diagnostico facial
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="update_diagFac" id="update_diagFac" ><?php print $row['diagfac'] ?></textarea>
                                            </div>
                                        </div>


<hr class="sidebar-divider d-none d-md-block">

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Exploración Corporal
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="update_expCorp" id="update_expCorp" placeholder="Describa"><?php print $row['expcorp'] ?></textarea>
                                            </div>
                                        </div>


                                        
                                 


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Grasa
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_grasa" name="update_grasa" value="<?php print $row['grasa'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Flacidez
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_flacidez" name="update_flacidez" value="<?php print $row['flacidez'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Celulitis
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_celulitis" name="update_celulitis" value="<?php print $row['celulitis'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Estrias
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_estrias" name="update_estrias" value="<?php print $row['estrias'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Varices
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_varices" name="update_varices" value="<?php print $row['varices'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Peso
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_peso" name="update_peso" value="<?php print $row['peso'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                IMC
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="update_imc" name="update_imc" value="<?php print $row['imc'] ?>">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Observaciones
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="update_obs" id="update_obs" ><?php print $row['obsexpcorp'] ?></textarea>
                                            </div>
                                        </div>
<hr class="sidebar-divider d-none d-md-block">


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Observaciones y Diágnostico Corporal
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="update_diagCor" id="update_diagCor" ><?php print $row['diagcorp'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Tx Cabina Recomendado
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="update_txCab" id="update_txCab" ><?php print $row['txcabina'] ?></textarea>
                                            </div>
                                        </div>




                                        </div>
                    </div>





<div class="tab-pane fade show " id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
    <div id="divex"><div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Plan de Tratamiento</h1>
                                        <?php if (!empty($message)) : ?>
                                        <p><?= $message ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" method="post" name="form_plan" id="form_plan" target="" enctype=multipart/form-data> 
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                               <b> Recomendaciones y Apoyo en Casa:</b>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="update_recomendacion" id="update_recomendacion" ><?php print $row['recomendaciones'] ?></textarea>
                                            </div>
                                        </div>








                                    
                                        <!-- <div class="form-group row">-->
                                       
                                        </div>
                                 
                           
                    </div>


                  </div>
                
                </div>
              </div>
        </div>
        </form>
      </div>