<?php 
require 'conexion/conexion.php';
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$sqlmail= "SELECT b.id,b.id_cliente,a.email,a.nomcom,b.fecha_cita,b.hora_cita,b.mail_send,c.nombre   from clientes a
 left join citas b on a.id=b.id_cliente 
 left join tipo_consulta c on b.id_tipo_consulta=c.id where mail_send=0
and b.fecha_cita IN ( CURDATE() + INTERVAL 1 DAY)
GROUP BY a.id ";

    $stmtm = $conn->prepare($sqlmail);
            $stmtm->execute();
                 while($rowm = $stmtm->fetch()) {

$id_hora=$rowm["hora_cita"];
$nomc=$rowm["nomcom"];

$sqlh1= "SELECT id,hora from hora_consulta where id='$id_hora' ";
    $stmth1 = $conn->prepare($sqlh1);
            $stmth1->execute();
                $rowh1= $stmth1->fetch();

                if ($rowh1['id']=='') {
                  $sqlh2= "SELECT id,hora from hora_consulta_ves where id='$id_hora' ";
                   $stmth2 = $conn->prepare($sqlh2);
                    $stmth2->execute();
                      $rowh2= $stmth2->fetch();
                       $hora=$rowh2['hora'];
                }else{
                   $hora=$rowh1['hora'];

                }

  $clientex =  $rowm['id_cliente'];
$originalDate =  $rowm['fecha_cita'];
$fechax1 = date("d/m/Y", strtotime($originalDate));


  require 'mail/mail2/vendor/autoload.php';

$mail = new PHPMailer(true); 
  
    //Server settings
   // $mail->SMTPDebug = 2; 
   try {                                
  $mail->isSMTP();                                      
   $mail->Host = 'tls://smtp.gmail.com:587'; 
    $mail->SMTPAuth = true;                               
    $mail->Username = 'sacsutspes@gmail.com';                
    $mail->Password = 'sacsutspes2016';                           
    $mail->SMTPSecure = 'tls';                           
    $mail->Port = 587; 
    $mail->setFrom('Clinica@sutspes.com', 'Clinica de Imagen y Salud');
    $mail->Subject = "Tiene una cita Pendiente";
    $mail->AltBody = "Buen dia:";
    $mail->AddAddress($rowm['email'],$nomc);
    
  
   $mail->isHTML(true);                                
    $mail->Subject = 'Cita Pendiente';
   $mail->Body    = ("<b>Buen dia:
    <br> Usted Tiene Una Consulta Pendiente el dia de Mañana</b> 
     <br><b>Tipo de Consulta:</b>".$rowm['nombre']." 
    <br> <b>Fecha:</b> ".$fechax1."
      <br><b> Hora:</b> ".$hora."
      <br> <b>le recomendamos estar 15 minutos antes . gracias!!</b> ");
    
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  
     
    if(!$mail->Send()) {
      echo "Error: " . $mail->ErrorInfo;
    } 
    } catch (phpmailerException $e) {
  //echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
 // echo $e->getMessage(); //Boring error messages from anything else!
}
     
 $sqlum = "UPDATE citas SET mail_send =1 where fecha_cita= '$originalDate' and id_cliente='$clientex'";
   $stmtum = $conn->prepare($sqlum);
   $stmtum->execute();

              } 

              


               

              ?>