<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }
    
require '../conexion/conexion.php';

  $username = $_SESSION['nombreSesion'];

  $idu=$_POST['id1'];

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

    $sql = "UPDATE citas SET archivo = '$path_nombre' WHERE id = $idu ";

     $stmt = $conn->prepare($sql);
     $stmt->execute();

     echo '1';
    }




  


}else{

   echo '2';
    
}



    


  ?>
