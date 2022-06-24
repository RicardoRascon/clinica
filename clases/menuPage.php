<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clínica S.U.T.S.P.E.S.</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/fonts1.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<!--
  -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
          <img src ="../img/clinica.png" width= "200" height="200">
        </div>
        
      </a>


  <?php  /*if ( $_SESSION['permisos']  ==3 ) */{ ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="true" aria-controls="collapsePages">
        <i ><img src ="../img/registro.png" width= "50" height="50"></i>
          <span>CATÁLOGOS</span>
        </a>
        <div id="admin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-transparent py-2 collapse-inner rounded">

          
  
     <a class="collapse-item" href="../contenidos/registroClientes.php"><i class="fa fa-user"></i> &nbsp; &nbsp; REGISTRO CLIENTES</a>

       
      
            <a class="collapse-item" href="../contenidos/usuarios.php"><i class="fa  fa-user-circle"></i> &nbsp; &nbsp;REGISTRO USUARIOS</a>
            <a class="collapse-item" href="../contenidos/registroClientes.php"><i class="fa fa-user"></i> &nbsp; &nbsp; REGISTRO CLIENTES</a>
            <a class="collapse-item" href="../contenidos/doctores.php"><i class="fa fa-user-md"></i> &nbsp; &nbsp; REGISTRO DOCTORES</a>
            <a class="collapse-item" href="../contenidos/tabla_consulta.php"><i class="fas fa-medkit"></i> &nbsp; &nbsp; TIPOS DE CONSULTAS</a>
 
          
          </div>
        </div>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#citas" aria-expanded="true" aria-controls="collapsePages">
       <i ><img src ="../img/calendar.png" width= "50" height="50"></i>
          <span>CITAS</span>
        </a>
        <div id="citas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-transparent py-2 collapse-inner rounded">
            




            <a class="collapse-item" href="../contenidos/citas.php"><i class="fa fa-search-plus"></i> &nbsp; &nbsp; BUSCAR CLIENTES</a>
            <a class="collapse-item" href="../contenidos/citas_doctores.php"><i class="fa fa-calendar"></i> &nbsp; &nbsp; AGENDA DOCTORES</a>
            
          </div>
        </div>
      </li>





 <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invetario" aria-expanded="true" aria-controls="collapsePages">
        <i ><img src ="../img/inventario.png" width= "50" height="50"></i>
          <span>INVENTARIO</span>
        </a>
        <div id="invetario" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-transparent py-2 collapse-inner rounded">



            
            <a class="collapse-item" href="../contenidos/productos.php"><i class="fa fa-list-ol"></i> &nbsp; &nbsp; INV PRODUCTOS</a>
         
            
          </div>
        </div>
      </li>


       <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportes" aria-expanded="true" aria-controls="collapsePages">
        <i ><img src ="../img/reporte.png" width= "50" height="50"></i>
          <span>REPORTES</span>
        </a>
        <div id="reportes" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-transparent py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="../contenidos/rep_doctores.php"><i class="fa fa-indent"></i> &nbsp; &nbsp; REP DOCTORES</a>
            <a class="collapse-item" href="../contenidos/rep_pacientes.php"><i class="fa fa-indent"></i> &nbsp; &nbsp; REP PACIENTES</a>
            
          </div>
        </div>
      </li>
        
  
          
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) 
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>-->

    </ul>
    <!-- End of Sidebar -->


  <?php  } ?>









 <?php   if ( $_SESSION['permisos']  ==2 ) { ?>
   
      
      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#citas" aria-expanded="true" aria-controls="collapsePages">
       <i ><img src ="../img/calendar.png" width= "50" height="50"></i>
          <span>CITAS</span>
        </a>
        <div id="citas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-transparent py-2 collapse-inner rounded">
            




           
            <a class="collapse-item" href="../contenidos/citas_doctores.php"><i class="fa fa-calendar"></i> &nbsp; &nbsp; AGENDA DOCTORES</a>
            
          </div>
        </div>
      </li>





  
          
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) 
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>-->

    </ul>
    <!-- End of Sidebar -->


  <?php  } ?>



 <?php  if ( $_SESSION['permisos']  ==1 ) { ?>
      <!-- Divider -->
      
      
      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#citas" aria-expanded="true" aria-controls="collapsePages">
       <i ><img src ="../img/calendar.png" width= "50" height="50"></i>
          <span>CITAS</span>
        </a>
        <div id="citas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-transparent py-2 collapse-inner rounded">
            




            <a class="collapse-item" href="../contenidos/citas.php"><i class="fa fa-search-plus"></i> &nbsp; &nbsp; BUSCAR CLIENTES</a>
            <a class="collapse-item" href="../contenidos/citas_doctores.php"><i class="fa fa-calendar"></i> &nbsp; &nbsp; AGENDA DOCTORES</a>
            
          </div>
        </div>
      </li>




        
  
          
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) 
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>-->

    </ul>
    <!-- End of Sidebar -->


  <?php  } ?>




  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  

 
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
  <!-- Bootstrap core JavaScript-->
   

 

  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>


 
  




</body>

</html>