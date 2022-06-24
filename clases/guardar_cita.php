<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
require '../conexion/conexion.php';

  $username = $_SESSION['user_id'];

  $idu=$_POST['id1'];
  $tc= $_POST['turn1'];

  $path_nombre  = '../docCitas/';

if((isset($_FILES["file"]) && $_FILES["file"]["error"]== UPLOAD_ERR_OK)) {

    $UploadDirectory    = '../docCitas';

    ############ Edit settings ##############
    //specify upload directory ends with / (slash)
    ##########################################
    
    //check if this is an ajax request
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        die();
    }
    
    
    //Is file size is less than allowed size.
    if ($_FILES["file"]["size"] > 15242880) {
        die("El Archivo es demasiado Grande!");
    }

     
    
    //allowed file type Server side check
    switch(strtolower($_FILES['file']['type'])){
            //allowed file types
            case 'application/pdf': 
            case 'image/png': 
            case 'image/jpeg': 
            case 'image/pjpeg':

                break;
            default:
                die('Archivo no Soportado!'); //output error
    }


    $ruta = $UploadDirectory;
    if(!file_exists($ruta)){
        mkdir ($ruta);
    } else {
        //////////////////*
    }


    $File_Name          = strtolower($_FILES['file']['name']);
    $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); 
    $Random_Number      = rand(0, 999999); 
    $NewFileName        = $idu.'-'.$Random_Number.$File_Ext;

    $path_nombre       = $UploadDirectory.'/'.$NewFileName;

    
    if(isset($_FILES["file"])){

        move_uploaded_file($_FILES['file']['tmp_name'], $path_nombre);
    }



}


if ($tc==1) {
 $tablax='hora_consulta';
}else{
 $tablax='hora_consulta_ves';
}



  $sql = "SELECT * FROM clientes WHERE  id = '$idu' "; 
  

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();

  $message = '';



  if (!empty($_POST['id1']) && !empty($_POST['doc']) && !empty($_POST['fecha']) && 
      !empty($_POST['tipo_consulta']) && !empty($_POST['hora_consulta']) && $path_nombre =='../docCitas/') {

    $path_nombre='0';


$hora_consultax1=$_POST['hora_consulta'];

$sqlnh1= "SELECT * from $tablax where id='$hora_consultax1' "; 
  

  $stmtnh1 = $conn->prepare($sqlnh1);
  $stmtnh1->execute();
  $rownh1 = $stmtnh1->fetch();  

  $tipo = $_POST['tipo_consulta'];

$sqlTC = "SELECT * from tipo_consulta where id = '$tipo'  "; 

    $stmtTC = $conn->prepare($sqlTC);
     $stmtTC->execute();

       $rowTC = $stmtTC->fetch();

       $loopsx1= $rowTC['duracion'];

        $hora_consulta=$rownh1['hora'];

         $minutoAnadir=0;

for ($i=0; $i < $loopsx1; $i++) { 



  $segundos_horaInicial=strtotime($hora_consulta);

  $segundos_minutoAnadir=$minutoAnadir*60;

 

$nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);


 $sqlnh= "SELECT * from $tablax where hora='$nuevaHora' "; 
  

  $stmtnh = $conn->prepare($sqlnh);
  $stmtnh->execute();
  $rownh = $stmtnh->fetch();




     $sql = "INSERT INTO citas (id_doctor, id_cliente, id_tipo_consulta, fecha_cita, hora_cita, comentarios, id_usuario, archivo)  
    VALUES (:doc,:idcli, :tipo_consulta, :fecha, :hora_consulta, :coments, :id, '$path_nombre')";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':idcli',$_POST['id1']);
    $stmt->bindParam(':doc',$_POST['doc']);
     $stmt->bindParam(':tipo_consulta',$_POST['tipo_consulta']);
      $stmt->bindParam(':fecha',$_POST['fecha']);
       $stmt->bindParam(':hora_consulta',$rownh['id']);
       $stmt->bindParam(':coments',$_POST['coments']);
        $stmt->bindParam(':id',$username);
        

        $stmt->execute();


        $hora_consulta=$nuevaHora;

        $minutoAnadir=30;

     if ($i == ($loopsx1-1) ) {

        echo  $message = '1';

    } 

     
     }

   
  } else if (!empty($_POST['id1']) && !empty($_POST['doc']) && !empty($_POST['fecha']) && 
      !empty($_POST['tipo_consulta']) && !empty($_POST['hora_consulta']) && $path_nombre !='../docCitas/') {

    


$hora_consultax1=$_POST['hora_consulta'];

$sqlnh1= "SELECT * from $tablax where id='$hora_consultax1' "; 
  

  $stmtnh1 = $conn->prepare($sqlnh1);
  $stmtnh1->execute();
  $rownh1 = $stmtnh1->fetch();  

  $tipo = $_POST['tipo_consulta'];

$sqlTC = "SELECT * from tipo_consulta where id = '$tipo'  "; 

    $stmtTC = $conn->prepare($sqlTC);
     $stmtTC->execute();

       $rowTC = $stmtTC->fetch();

       $loopsx1= $rowTC['duracion'];

        $hora_consulta=$rownh1['hora'];

         $minutoAnadir=0;

for ($i=0; $i < $loopsx1; $i++) { 



  $segundos_horaInicial=strtotime($hora_consulta);

  $segundos_minutoAnadir=$minutoAnadir*60;

 

$nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);


 $sqlnh= "SELECT * from $tablax where hora='$nuevaHora' "; 
  

  $stmtnh = $conn->prepare($sqlnh);
  $stmtnh->execute();
  $rownh = $stmtnh->fetch();




     $sql = "INSERT INTO citas (id_doctor, id_cliente, id_tipo_consulta, fecha_cita, hora_cita, comentarios, id_usuario, archivo)  
    VALUES (:doc,:idcli, :tipo_consulta, :fecha, :hora_consulta, :coments, :id, '$path_nombre')";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':idcli',$_POST['id1']);
    $stmt->bindParam(':doc',$_POST['doc']);
     $stmt->bindParam(':tipo_consulta',$_POST['tipo_consulta']);
      $stmt->bindParam(':fecha',$_POST['fecha']);
       $stmt->bindParam(':hora_consulta',$rownh['id']);
       $stmt->bindParam(':coments',$_POST['coments']);
        $stmt->bindParam(':id',$username);
        

        $stmt->execute();


        $hora_consulta=$nuevaHora;

        $minutoAnadir=30;

     if ($i == ($loopsx1-1) ) {

        echo  $message = '1';

    } 

     
     }

   
  } else {
    echo $message = '3';
  }


?>