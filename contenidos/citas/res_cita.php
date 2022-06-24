<?php session_start();
    require '../../conexion/conexion.php';

    $id=$_POST['id'];  
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
date_default_timezone_set('America/Hermosillo'); 
setlocale(LC_TIME, 'spanish');
$fecha=strftime("%Y-%m-%d");
?>
<style type="text/css">
	img.alineado{
  vertical-align: middle;
}


</style>

  <link rel="stylesheet" type="text/css" href="../complete/jquery.autocomplete.css" />

    <script type="text/javascript" src="../complete/jquery.autocomplete.js"></script> 

<form action="#" name="forma_res_cita" id="forma_res_cita" class="horizontal-form">

 <input type="hidden" id="id1" name="id1" value="<?php print $id ?>">


  

 <div class="col-md-12">Resumen de Cita
            <div class="form-group">
             
              <div class="input-group">
                
                  <textarea class="form-control" id="resumen" rows="10" name="resumen"></textarea>
              </div>
            </div>
        
 </div>

 <div id='TextBoxesGroup'></div>  


         
		</form>

<br><br>
<input type='button' value='Agregar' id='addButton' class="btn btn-success"> 




     <script>


$(document).ready(function(){

 
   

  var counter = 1;

    
    $("#addButton").click(function () {

        
  if(counter>10){
            alert("Demaciados Campos!!!");
            return false;
  }   
    
  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);
      

     
                

       newTextBoxDiv.after().html('<div class="col-md-6">Nombre Producto'+
       
                '<input type="text" class="form-control input-sm" name="des[]" id="des'+counter+'">'+
                
          '</div> '+

          '<div class="col-md-2">Unidades'+
      
                '<input type="text" class="form-control input-sm" name="can[]" id="can'+counter+'" >'+
                
          '</div>'+
         '  <img src="../img/Delete.png" onclick="removebtn('+counter+')" id="removeButton"   width="30" height="30" style="margin-top:30px" >'+
         ' <br><br>' );

            
  newTextBoxDiv.appendTo("#TextBoxesGroup");

         var h1 = document.getElementById("TextBoxDiv" + counter);   
var att = document.createAttribute("class");     
att.value = "d-flex flex-row";                          
h1.setAttributeNode(att); 


  
$('#des'+counter).autocomplete("../complete/autocomplete.php", {
      selectFirst: true
      });
 
     counter++;


     });

     $("#getButtonValue").click(function () {
    
  var msg = '';
  for(i=1; i<counter; i++){
      msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
  }
        alert(msg);
     });




       });
    
 function removebtn(c) {
  $("#TextBoxDiv" + c ).remove();
      
     }


   </script>