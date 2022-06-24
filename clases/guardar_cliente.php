<?php session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Favor de Iniciar Sesión'); 

    window.location='../index.php';



    </script>";
    }

require '../conexion/conexion.php';

$username = $_SESSION['nombreSesion'];
$idu= $_SESSION['user_id'] ;
$message = '';
$path_nombre  = '../adjuntos/';

if((isset($_FILES["file"]) && $_FILES["file"]["error"]== UPLOAD_ERR_OK)) {

    $UploadDirectory    = '../adjuntos';

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




if ($_POST['tipo'] == 0 and $path_nombre =='../adjuntos/') {
    
        $path_nombre='0';
           

        $sql_c1 = "INSERT INTO clientes (pension, nomcom, tipo,foto, fechanac, direccion, email, telefono, sexo, ocupacion, edoCivil) 
        VALUES (:pension, :nombre,:tipo,'$path_nombre', :fechanac, :direccion, :email, :telefono, :sexo, :ocupacion, :edoCivil)";

        $stmt = $conn->prepare($sql_c1);
        $stmt->bindParam(':pension',$_POST['pension']);
        $stmt->bindParam(':tipo',$_POST['tipo']);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':direccion',$_POST['direccion']);
        $stmt->bindParam(':email',$_POST['email']);
        $stmt->bindParam(':telefono',$_POST['telefono']);
        $stmt->bindParam(':fechanac',$_POST['fechanac']);
        $stmt->bindParam(':sexo',$_POST['sexo']);
        $stmt->bindParam(':ocupacion',$_POST['ocupacion']);
        $stmt->bindParam(':edoCivil',$_POST['edoCivil']);

       


        if ($stmt->execute()) {
            echo $message = '4';
        } 


    }else  if ($_POST['tipo'] == 0 and $path_nombre != '../adjuntos/') {
   

        $sql_c1 = "INSERT INTO clientes (pension, nomcom, tipo,foto, fechanac, direccion, email, telefono, sexo, ocupacion, edoCivil) 
        VALUES (:pension, :nombre,:tipo,'$path_nombre', :fechanac, :direccion, :email, :telefono, :sexo, :ocupacion, :edoCivil)";

        $stmt = $conn->prepare($sql_c1);
        $stmt->bindParam(':pension',$_POST['pension']);
        $stmt->bindParam(':tipo',$_POST['tipo']);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':direccion',$_POST['direccion']);
        $stmt->bindParam(':email',$_POST['email']);
        $stmt->bindParam(':telefono',$_POST['telefono']);
        $stmt->bindParam(':fechanac',$_POST['fechanac']);
        $stmt->bindParam(':sexo',$_POST['sexo']);
        $stmt->bindParam(':ocupacion',$_POST['ocupacion']);
        $stmt->bindParam(':edoCivil',$_POST['edoCivil']);



        if ($stmt->execute()) {

            echo $message = '1';
        }
    


} else  if ($_POST['tipo']  == 1 and $path_nombre =='../adjuntos/') {
   
        $path_nombre='0';
           

        $sql_c2 = "INSERT INTO clientes (pension, nomcom, tipo,foto, fechanac, direccion, email, telefono, sexo, ocupacion, edoCivil) 
        VALUES (0, :nombre,:tipo,'$path_nombre', :fechanac, :direccion, :email, :telefono, :sexo, :ocupacion, :edoCivil)";
        $stmt = $conn->prepare($sql_c2);

        //$stmt->bindParam(':pension','0');
        $stmt->bindParam(':tipo',$_POST['tipo']);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':direccion',$_POST['direccion']);
        $stmt->bindParam(':email',$_POST['email']);
        $stmt->bindParam(':telefono',$_POST['telefono']);
        $stmt->bindParam(':fechanac',$_POST['fechanac']);
        $stmt->bindParam(':sexo',$_POST['sexo']);
        $stmt->bindParam(':ocupacion',$_POST['ocupacion']);
        $stmt->bindParam(':edoCivil',$_POST['edoCivil']);





        if ($stmt->execute()) {
             
                         echo $message = '4';
                     

            
        } 

}else
if ($_POST['tipo']  == 1 and $path_nombre !='../adjuntos/') {
  
        $sql_c2 = "INSERT INTO clientes (pension, nomcom, tipo,foto, fechanac, direccion, email, telefono, sexo, ocupacion, edoCivil) 
        VALUES (0, :nombre,:tipo,'$path_nombre', :fechanac, :direccion, :email, :telefono, :sexo, :ocupacion, :edoCivil)";
        $stmt = $conn->prepare($sql_c2);

        //$stmt->bindParam(':pension','0');
        $stmt->bindParam(':tipo',$_POST['tipo']);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':direccion',$_POST['direccion']);
        $stmt->bindParam(':email',$_POST['email']);
        $stmt->bindParam(':telefono',$_POST['telefono']);
        $stmt->bindParam(':fechanac',$_POST['fechanac']);
        $stmt->bindParam(':sexo',$_POST['sexo']);
        $stmt->bindParam(':ocupacion',$_POST['ocupacion']);
        $stmt->bindParam(':edoCivil',$_POST['edoCivil']);



        if ($stmt->execute()) {

            echo $message = '1';
        }

} 
