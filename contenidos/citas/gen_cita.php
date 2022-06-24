<?php session_start();
  require '../../conexion/conexion.php';

  $idu=$_POST['id'];



  $sql = "SELECT * FROM clientes WHERE  id = '$idu' "; 
  

  $stmt = $conn->prepare($sql);
	$stmt->execute();
  $row = $stmt->fetch();
  $hoy= date("Y-m-d");




?>


<style type="text/css">
	img.alineado{
  vertical-align: middle;
  }


</style>


<!-- Optional theme -->


<!-- Optional theme -->


<form action="#" name="forma_generar_cita" id="forma_generar_cita" class="horizontal-form"  enctype=multipart/form-data>

 <input type="hidden" id="id1" name="id1" value="<?php print $idu ?>">

	<h3>Generar Cita</h3>
	<div class="form-row">
    <div align="right">    
      <img class="alineado" src="<?php print $row["foto"];?>" alt="Foto" height="200" width="180"> 
    </div>

    <div class="col-xs-12 col-sm-9">

      <div class="col-xs-12 col-sm-8">

        <label for="exampleInput1">Paciente</label>
        <h3 id="nomcom" name="nomcom" ><?php print $row['nomcom'] ?></h3>


        <label for="exampleInput1">Turno</label>
        <select name="turn1" id="turn1" class="form-control form-control-user" onchange="turnX1(this.value)">  
          <option disabled selected>Seleccione Turno</option> 
          <option value="1">Turno Matutino</option>
          <option value="2">Turno Vespertino</option>
          

        </select>


        
      <div id="div_turn" name="div_turn"></div>
       <div id="div_reset" name="div_reset">
         
          <a><input type="button" name="boton_cliente" value="Agregar Cliente"
           class="btn btn-primary btn-user btn-block" onClick="reset_form()"></a>
       </div>
      
      </div>

      <div class="col-xs-12 col-sm-5">
        <label for="exampleInput2">Fecha de Cita</label>
        <input type="date" class="form-control form-control-user" id="fecha" name="fecha"  min="<?php print $hoy ?>" lang="es" >
      </div>

      

      


      <div class="col-xs-12 col-sm-8">
        <label for="exampleInput1">Tipo de Consulta</label>
        <select name="tipo_consulta" id="tipo_consulta" class="form-control form-control-user" onchange="gethora();">  
          <option disabled selected style="color:#000">Seleccione Tipo de Consulta</option> 
          <?php $sqldoc = "SELECT * FROM tipo_consulta WHERE activo = 1"; 

            $stmt = $conn->prepare($sqldoc);
            $stmt->execute();
        
            while($row = $stmt->fetch() ) {
              if ($row['duracion']==1) {
                $duracion2='<h1>duración 30 minutos</h1>';
              }
               else if ($row['duracion']==2) {
                $duracion2='duración 1 Hora';
              }
             else  if ($row['duracion']==3) {
                $duracion2='duración 1.5 Horas';
              }
             else  if ($row['duracion']==4) {
                $duracion2='duración 2 Horas';
              }
              else if ($row['duracion']==5) {
                $duracion2='duración 2.5 Horas';
              }
              else if ($row['duracion']==6) {
                $duracion2='duración 3 Horas';
              }
          ?>
      
          <option value="<?php print $row['id']?>"> <?php print $row['nombre'].''.' / '.' '.$duracion2?> </option>
          <?php }?>

        </select>

      </div>

<div id="horario" name="horario"></div>





   

      



    <!--<div class="col-xs-12 col-sm-3">


      <label for="exampleInput2">Citas</label>


      <input type="text" class="form-control form-control-user" id="fechanac" name="fechanac"  >
     </div>-->
      
    </div>
   
</form>

<!-- Latest compiled and minified CSS -->




<script>

  $( document ).ready(function() {
   

  document.getElementById("div_reset").style.display = "none";
});

  $(document).keypress(function(event){
    
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
       mostrar_citas();    
    }

    
  });




function turnX1(sel1){

var turn1= sel1;


  $.ajax({
    type: "POST",
    url: "../clases/check_doc.php",
    data: "turn1="+ turn1  ,
    cache: false,
    async: true,
    success: function(response){
      var str = response;
      str = str.replace(/^\s*|\s*$/g,"");
      $('#div_turn').html(str);
       
    },
    error: function(html, textStatus, errorThrown){
        alert("No se ha podido realizar la operación.");
    }
  });





} 


function gethora(){

var fec= document.getElementById('fecha').value;
var doc= document.getElementById('doc').value;
var tc= document.getElementById('turn1').value;

  $.ajax({
    type: "POST",
    url: "citas/get_hora.php",
    data: "fec=" + fec + "&doc=" + doc + "&tc=" + tc ,
    cache: false,
    async: true,
    success: function(response){
      var str = response;
      str = str.replace(/^\s*|\s*$/g,"");
      document.getElementById("horario").style.display = "block";
      $('#horario').html(str);
       
    },
    error: function(html, textStatus, errorThrown){
        alert("No se ha podido realizar la operación.");
    }
  });





} 
function reset_form(){
  
document.getElementById("forma_generar_cita").reset(); 


}

function reseta(){
   var dropDown = document.getElementById("tipo_consulta");
        dropDown.selectedIndex = 0;
   document.getElementById("horario").style.display = "none";
 }
</script>