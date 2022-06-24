<?php 
    require '../../conexion/conexion.php';

    //Datos Personales

   $id=$_POST['id1'];
   $pension = $_POST['pension'];
   $nombre = $_POST['nombre'];
   $direccion = $_POST['direccion'];
   $email = $_POST['email'];
   $telefono = $_POST['telefono'];
   $fechanac = $_POST['fechanac'];
   $sexo = $_POST['update_sexo'];
   $edoCivil = $_POST['update_edoCivil'];
   $ocupacion = $_POST['update_ocupacion'];

   // Antecedentes




if(isset($_POST['cancer'])){
$cancer =1;
}
else{
$cancer =0;
  }

  if(isset($_POST['hipertension'])){
$hipertension =1;
}
else{
$hipertension =0;
  }

  if(isset($_POST['diabetes'])){
$diabetes =1;
}
else{
$diabetes =0;
  }

  if(isset($_POST['rosacea'])){
$rosacea =1;
}
else{
$rosacea =0;
  }

    if(isset($_POST['acne'])){
$acne =1;
}
else{
$acne =0;
  }

    if(isset($_POST['cardio'])){
$cardio =1;
}
else{
$cardio =0;
  }



 if(isset($_POST['fuma'])){
$fuma =1;
}
else{
$fuma =0;
  }
   

if(isset($_POST['protesis'])){
$protesis =1;
}
else{
$protesis =0;
  }

if(isset($_POST['alcohol'])){
$alcohol =1;
}
else{
$alcohol =0;
  }

if(isset($_POST['alergias'])){
$alergias =1;
}
else{
$alergias =0;
  }

if(isset($_POST['aparatos'])){
$aparatos =1;
}
else{
$aparatos =0;
  }

if(isset($_POST['agua'])){
$agua =1;
}
else{
$agua =0;
  }

if(isset($_POST['drogas'])){
$drogas =1;
}
else{
$drogas =0;
  }

if(isset($_POST['cirugias'])){
$cirugias =1;
}
else{
$cirugias =0;
  }

if(isset($_POST['ejercicio'])){
$ejercicio =1;
}
else{
$ejercicio =0;
  }

if(isset($_POST['alimentacion'])){
$alimentacion =1;
}
else{
$alimentacion =0;
  }





 $sql = "UPDATE clientes SET pension = '$pension', nomcom = '$nombre', direccion = '$direccion', email = '$email', telefono = '$telefono', fechanac = '$fechanac', edoCivil='$edoCivil', ocupacion='$ocupacion', sexo='$sexo'
 WHERE id = '$id';";

	$stmt = $conn->prepare($sql);
$stmt->execute();



$sql_ant = "INSERT INTO antecedentes (id_cliente, cancer, hipertension, diabetes, rosacea, acne, cardiovasculares, otroHered, padecimiento, txmedico, fuma, hrsueno, protesis, alcohol, alergias, aparatos, agua, drogas, cirugias, ejercicio, alimentacion, otroPersonales, txestetico, cosmeticos, nota) VALUES (:id, :cancer, :hipertension, :diabetes, :rosacea, :acne, :cardio, :otroAntecedenteH, :padecimientoActual, :txmedico, :fuma, :hSueno, :protesis, :alcohol, :alergias, :aparatos, :agua, :drogas, :cirugias, :ejercicio, :alimentacion, :otroAntecedenteP, :txEstetico, :cosmeticos, :nota)";

        $stmt_ant = $conn->prepare($sql_ant);
        $stmt_ant->bindParam(':id',$id);
        $stmt_ant->bindParam(':cancer',$cancer);
        $stmt_ant->bindParam(':hipertension',$hipertension);
        $stmt_ant->bindParam(':diabetes',$diabetes);
        $stmt_ant->bindParam(':rosacea',$rosacea);
        $stmt_ant->bindParam(':acne',$acne);
        $stmt_ant->bindParam(':cardio',$cardio);
        $stmt_ant->bindParam(':otroAntecedenteH',$_POST['otroAntecedenteH']);
        $stmt_ant->bindParam(':padecimientoActual',$_POST['padecimientoActual']);
        $stmt_ant->bindParam(':txmedico',$_POST['txmedico']);
        $stmt_ant->bindParam(':fuma',$fuma);
        $stmt_ant->bindParam(':hSueno',$_POST['hSueno']);
        $stmt_ant->bindParam(':protesis',$protesis);
        $stmt_ant->bindParam(':alcohol',$alcohol);
        $stmt_ant->bindParam(':alergias',$alergias);
        $stmt_ant->bindParam(':aparatos',$aparatos);
        $stmt_ant->bindParam(':agua',$agua);
        $stmt_ant->bindParam(':drogas',$drogas);
        $stmt_ant->bindParam(':cirugias',$cirugias);
        $stmt_ant->bindParam(':ejercicio',$ejercicio);
        $stmt_ant->bindParam(':alimentacion',$alimentacion);
        $stmt_ant->bindParam(':otroAntecedenteP',$_POST['otroAntecedenteP']);
        $stmt_ant->bindParam(':txEstetico',$_POST['txEstetico']);
        $stmt_ant->bindParam(':cosmeticos',$_POST['cosmeticos']);
        $stmt_ant->bindParam(':nota',$_POST['nota']);









        $sql_exp = "INSERT INTO exploracion (id_cliente,color, espesor, poro, secrecion, fragilidad, lesiones, menciones, nivelhidratacion, diagfac, expcorp, grasa, flacidez, celulitis, estrias, varices, peso, imc, obsexpcorp, diagcorp, txcabina) VALUES (:id, :color, :espesor, :poro, :sebacea, :fragilidad, :lesiones, :menciones, :hidratacion, :diagFac, :expCorp, :grasa, :flacidez, :celulitis, :estrias, :varices, :peso, :imc, :obs, :diagCor, :txCab)";

        $stmt_exp = $conn->prepare($sql_exp);
        $stmt_exp->bindParam(':id',$id);
        $stmt_exp->bindParam(':color',$_POST['color']);
        $stmt_exp->bindParam(':espesor',$_POST['espesor']);
        $stmt_exp->bindParam(':poro',$_POST['poro']);
        $stmt_exp->bindParam(':sebacea',$_POST['sebacea']);
        $stmt_exp->bindParam(':fragilidad',$_POST['fragilidad']);
        $stmt_exp->bindParam(':lesiones',$_POST['lesiones']);
        $stmt_exp->bindParam(':menciones',$_POST['menciones']);
        $stmt_exp->bindParam(':hidratacion',$_POST['hidratacion']);
        $stmt_exp->bindParam(':diagFac',$_POST['diagFac']);
        $stmt_exp->bindParam(':expCorp',$_POST['expCorp']);
        $stmt_exp->bindParam(':grasa',$_POST['grasa']);
        $stmt_exp->bindParam(':flacidez',$_POST['flacidez']);
        $stmt_exp->bindParam(':celulitis',$_POST['celulitis']);
        $stmt_exp->bindParam(':estrias',$_POST['estrias']);
        $stmt_exp->bindParam(':varices',$_POST['varices']);
        $stmt_exp->bindParam(':peso',$_POST['peso']);
        $stmt_exp->bindParam(':imc',$_POST['imc']);
        $stmt_exp->bindParam(':obs',$_POST['obs']);
        $stmt_exp->bindParam(':diagCor',$_POST['diagCor']);
        $stmt_exp->bindParam(':txCab',$_POST['txCab']);




        $sql_plan = "INSERT INTO plantratamiento (id_cliente,recomendaciones) VALUES (:id, :recomendacion)";

        $stmt_plan = $conn->prepare($sql_plan);
        $stmt_plan->bindParam(':id',$id);
        $stmt_plan->bindParam(':recomendacion',$_POST['recomendacion']);




        if ($stmt_ant->execute() && $stmt_exp->execute() && $stmt_plan->execute()) {
            echo $message = '1';
        } 

        else {
           echo $message = '2';
        }


?>