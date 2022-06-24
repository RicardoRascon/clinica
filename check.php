

<script src="js/jquery.js"></script>
<script>
var interval = setInterval(function() {

gencita();

  }, 6000);

function gencita(){ 
 
    $.ajax({
        type: "POST",
        url: "send_mail.php",
        cache: false,
        async: true,
        success: function(str){
           
         //alert(str);
        },
        error: function(html, textStatus, errorThrown){
            alert("No se ha podido realizar la operación.");
        }
    });

    
}


</script>