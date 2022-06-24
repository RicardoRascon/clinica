<?php session_start();
  require 'conexion/conexion.php';

  /*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
*/
  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {


    $records = $conn->prepare('SELECT id, usuario, password, nombreCompleto,permisos FROM users WHERE usuario=:usuario and status=1' );
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $results['usuario'];
    $message = '';
    $_SESSION['nombreSesion'] = $results['nombreCompleto'];

  $password = password_verify($_POST['password'], $results['password']);

    if ($results > 0 && $password) {
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['permisos'] = $results['permisos'];
      
/*


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
    } else {
    
$sqlum = "UPDATE citas SET mail_send =1 where fecha_cita= '$originalDate' and id_cliente='$clientex'";
  $stmtum = $conn->prepare($sqlum);
  $stmtum->execute();

              }   }    */  

echo "<script> location.href=\"contenidos/citas.php\" </script>"; 
     // header('Location: http://localhost/clinica/contenidos/citas.php');
              



      

    } else {
      $message = 'Usuario Inactivo o Datos Incorrectos';
    }
    
}
  
?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iniciar Sesión</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/fonts1.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row2 justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9" >

        <div>
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-5 d-none d-lg-block">
              <img src ="img/clinica.png" width= "350" height="350">
              </div>
              <div class="col-lg-5">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-4">Bienvenido</h1>

                    <?php if (!empty($message)): ?>
                    <p><?= $message ?></p>
                    <?php endif;?>

                  </div>
                  <form action class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control " id="usuario" name="usuario" placeholder="Nombre de Usuario" >
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control " id="password" name="password" placeholder="Contraseña" >
                    </div>
                    <center>
                      <div class="form-group" id="div_login">
                        <img src="img/loader.gif" id="miloader" style="display: none;" width="80" height="80">
                        <a><input type="submit" name="Login" value="Iniciar" class="btn btn-primary" id="btn1x" onclick="send()"></a>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script>
  function send() {
  document.getElementById('btn1x').style.display = 'none';
    document.getElementById('miloader').style.display = 'block';
    
    } 



  </script>

</body>

</html>
