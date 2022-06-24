<?php session_start();
    require '../../conexion/conexion.php';

    $idu=$_POST['id'];

$username = $_SESSION['nombreSesion'];

$Permisos = $_SESSION['permisos'];

$sql = "SELECT * FROM clientes 


 WHERE  id = '$idu' "; 

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
                                                <input type="checkbox" id="cancer" name="cancer" value="1">Cancer

                                                <input type="checkbox" id="hipertension" name="hipertension" value="1">Hipertension <br>
                                                <input type="checkbox" id="diabetes" name="diabetes" value="1">Diabetes 
                                                <input type="checkbox" id="rosacea" name="rosacea" value="1">Rosacea <br>
                                                <input type="checkbox" id="acne" name="acne" value="1">Acne 
                                                <input type="checkbox" id="cardio" name="cardio" value="1">Cardiovasculares <br>

                                                Otro: <textarea class="form-control form-control" name="otroAntecedenteH" id="otroAntecedenteH" placeholder="Describa"></textarea>
                                            </div>
                                        </div>
                                        <hr class="sidebar-divider d-none d-md-block">
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Antecedentes Personales
                                            </div>
                                            <div class="col-sm-6 ">

                                                Padecimiento Actual: <textarea class="form-control form-control" name="padecimientoActual" id="padecimientoActual" placeholder="Describa"></textarea>

                                                TX Médico: <textarea class="form-control form-control" name="txmedico" id="txmedico" placeholder="Describa"></textarea>

                                                <input type="checkbox" id="fuma" name="fuma" value="1">Fuma 
                                                <input type="text" id="hSueno" name="hSueno">Hrs de Sueño 
                                                <input type="checkbox" id="protesis" name="protesis" value="1">Prótesis <br>
                                                <input type="checkbox" id="alcohol" name="alcohol" value="1">Bebe Alcohol
                                                <input type="checkbox" id="alergias" name="alergias" value="1">Alergias 
                                                <input type="checkbox" id="aparatos" name="aparatos" value="1">Aparatos <br>
                                                <input type="checkbox" id="agua" name="agua" value="1">Toma Agua
                                                <input type="checkbox" id="drogas" name="drogas" value="1">Drogas 
                                                <input type="checkbox" id="cirugias" name="cirugias" value="1">Cirugías <br>
                                                <input type="checkbox" id="ejercicio" name="ejercicio" value="1">Hace Ejercicio
                                                <input type="checkbox" id="alimentacion" name="alimentacion" value="1">Alimentación <br>

                                                Otro: <textarea class="form-control form-control" name="otroAntecedenteP" id="otroAntecedenteP" placeholder="Describa"></textarea>

                                                Tx Estético: <textarea class="form-control form-control" name="txEstetico" id="txEstetico" placeholder="Describa"></textarea>

                                                Cosméticos que usó o está usando actualmente: <textarea class="form-control form-control" name="cosmeticos" id="cosmeticos" placeholder="Describa"></textarea>

                                                NOTA: <textarea class="form-control form-control" name="nota" id="nota" placeholder="Describa"></textarea>
                                            </div>
                                        </div>
                                        <hr class="sidebar-divider d-none d-md-block">
                                 
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
                                                <input type="text" class="form-control form-control" id="color" name="color" placeholder="Ingresa el color">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Espesor
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="espesor" name="espesor" placeholder="Ingresa el espesor">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Poro
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="poro" name="poro" placeholder="Ingresa el tipo de poro">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Secreción Sebacea
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="sebacea" name="sebacea" placeholder="Ingresa la secreción sebacea">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Fragilidad
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="fragilidad" name="fragilidad" placeholder="Ingresa la fragilidad">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Lesiones
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="lesiones" name="lesiones" placeholder="Ingresa si tiene alguna lesión">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Menciones
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="menciones" name="menciones" placeholder="Ingresa las menciones">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Nivel de Hidratación
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="hidratacion" name="hidratacion" placeholder="Ingresa el nivel de hidratación">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Observaciones y diagnostico facial
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="diagFac" id="diagFac" placeholder="Describa"></textarea>
                                            </div>
                                        </div>


<hr class="sidebar-divider d-none d-md-block">

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Exploración Corporal
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="expCorp" id="expCorp" placeholder="Describa"></textarea>
                                            </div>
                                        </div>


                                        
                                 


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Grasa
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="grasa" name="grasa" placeholder="Ingresa el nivel de grasa">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Flacidez
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="flacidez" name="flacidez" placeholder="Ingresa el nivel de flacidez">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Celulitis
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="celulitis" name="celulitis" placeholder="Ingresa el nivel de celulitis">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Estrias
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="estrias" name="estrias" placeholder="Ingresa el nivel de estrias">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Varices
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="varices" name="varices" placeholder="Ingresa el nivel de varices">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Peso
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="peso" name="peso" placeholder="Ingresa el peso">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                IMC
                                            </div>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control form-control" id="imc" name="imc" placeholder="Ingresa el índice de masa corporal">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Observaciones
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="obs" id="obs" placeholder="Describa"></textarea>
                                            </div>
                                        </div>
<hr class="sidebar-divider d-none d-md-block">


                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Observaciones y Diágnostico Corporal
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="diagCor" id="diagCor" placeholder="Describa"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 ">
                                                Tx Cabina Recomendado
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="txCab" id="txCab" placeholder="Describa"></textarea>
                                            </div>
                                        </div>



<hr class="sidebar-divider d-none d-md-block">

                     
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
                                                Recomendaciones y Apoyo en Casa
                                            </div>
                                            <div class="col-sm-6 ">
                                                <textarea class="form-control form-control" name="recomendacion" id="recomendacion" placeholder="Describa"></textarea>
                                            </div>
                                        </div>


                                    
                                        <!-- <div class="form-group row">-->
                                       
                                        </div>
                                 
                           
                    </div>


                  </div>
                
                </div>
             
       
        </form>
      </div>