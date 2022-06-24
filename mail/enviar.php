  <?php
/*$headers="hola hola";
$message="kiubole ya kedo";
mail("iquijada.jaab@gmail.com","probando",$message,$headers);

echo 'ok mensaje enviado';
*/
 include("mail/class.phpmailer.php");
    include("mail/class.smtp.php");
     
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    
    $mail->Username = "sutspes.sac@gmail.com"; 
    $mail->Password = "sacsutspes2016";
    $mail->From = "Sistema S.A.C.";
    $mail->FromName = "Sistema S.A.C.";
    $mail->Subject = "";
    $mail->AltBody = "Buen dia:";
    $mail->MsgHTML("<b>Este es un Mensaje de prueba del sistema SAC...!!</b>");

    //$mail->AddAttachment("files/files.zip");
   // $mail->AddAttachment("files/img03.jpg");
  //$mail->AddAddress($ingeniero[3], "Ingeniero Asignado");
  
  $mail->AddAddress("leamsi.quijada@gmail.com", "Ismael Quijada");
  
    $mail->IsHTML(true);
     
    if(!$mail->Send()) {
      echo "Error: " . $mail->ErrorInfo;
    } else {
     
   echo"<script language='JavaScript'>
      alert('Datos Guardados Correctamente...')
      

    </script>";
    
    }

        ?>