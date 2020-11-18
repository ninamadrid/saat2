<!DOCTYPE html>
<html>
<?php
include_once('funciones/sesiones.php');
$usuario = $_SESSION['usuario'];
$rol_id = $_SESSION['rol_id'];
//$registro = $_SESSION['ingreso'];
//$cargo = $_SESSION['rol'];
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAAT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="vista/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vista/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
   
  <link rel="stylesheet" href="vista/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="vista/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="vista/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="vista/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="./vista/dist/css/alertjs/css/themes/default.css">
  <link rel="stylesheet"  href="./vista/dist/css/datatables.min.css"/>
</head>
<!--sidebar-collapse, hace que la barra lateral isquierda aparezca no expandida-->
<body class="hold-transition skin-green sidebar-collapse sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>AT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistema </b>AMITIGRA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="vista/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Usuario: <?php echo $usuario;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="vista/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                <?php echo $usuario; ?> - cargo: <?php echo $rol_id;?><!--<?php //echo $cargo;?>--> <!--Aqui ira la variable que traiga el rol del usuario-->
                  <small>Miembro desde:<!--<?php //echo $registro;?>--> </small> <!--Aqui ira variable que muestre la fecha en la que se unio el usuario-->
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="perfil" class="btn btn-default btn-flat">Perfil</a> <!--Boton que redirige al perfil o configuracion de usuario-->
                </div>
                <div class="pull-right">
                  <a href="cerrarSesion" class="btn btn-default btn-flat">Cerrar sesion</a> <!--Salir del sistema-->
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="vista/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Usuario: <?php echo $usuario;?></p>
          <!--Aqui agregar variable de sesion para que muestre el cargo-->
          <!--<p><?php //echo $cargo;?></p>-->
          <!--Aqui ira el cargo del usuario-->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de Navegacion</li>
        <!--Pendiente-->

        <?php if ($_SESSION['rol_id'] != 3):?>
        <li class="treeview" name="admin">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Reservaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="camping"><i class="fa fa-circle-o"></i> Camping</a></li>
            <li><a href="hotel"><i class="fa fa-circle-o"></i> Hotel</a></li>
            <li><a href="senderos"><i class="fa fa-circle-o"></i> Senderos</a></li>
          </ul>
        </li>
        <!--Hasta aqui-->
        <li class="treeview">
          <a href="solicitudes">
            <i class="fa fa-files-o"></i>
            <span>Solicitudes</span>
          </a>
        </li>
        <!--Inicio inventario-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Inventario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="producto"><i class="fa fa-circle-o"></i> Producto</a></li>
            <li><a href="existencia"><i class="fa fa-circle-o"></i> Existencia</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Item Inventario</a></li>
          </ul>
        </li> <!--Final inventario-->
        <!--Inico administracion - Reportes-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> <!--Fin reportes-->
        <!--Panel de administracion-->
        <?php endif?>

        <?php if($_SESSION['rol_id'] != 1):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="mantenimiento"><i class="fa fa-circle-o"></i> Mantenimiento usuario</a></li>
            <li><a href="bitacora"><i class="fa fa-circle-o"></i> Bitacora</a></li>
            <li><a href="copiaSeguridad"><i class="fa fa-circle-o"></i> Copia de seguridad BD</a></li>
          </ul>
        </li> <!--Final administracion-->
        <?php endif?>
    </section>
    <!-- /.sidebar -->
  </aside>

  
  <!--INICIO - AQUI LAS PANTALLAS-->
  <?php
  
    if(isset($_GET["ruta"])){
      if($_GET["ruta"] == "inicio"||
        $_GET["ruta"] == "camping"||
        $_GET["ruta"] == "hotel" ||
        $_GET["ruta"] == "senderos" ||
        $_GET["ruta"] == "solicitudes" ||
        $_GET["ruta"] == "producto" ||
        $_GET["ruta"] == "existencia"||
        $_GET["ruta"] == "perfil" ||
        $_GET["ruta"] == "mantenimiento" ||
        $_GET["ruta"] == "bitacora" ||
        $_GET["ruta"] == "copiaSeguridad" ||
        $_GET["ruta"] == "cerrarSesion"){
        include("modulos/".$_GET["ruta"].".php");
      } else{
        include("modulos/error404.php");
      }
    } else {
      include('modulos/inicio.php');
    }

    //Mostrar las pantallas del ADMINISTRADOR
    /*if(isset($_SESSION['rol']) == 1){
      echo "Mostrame mantenimiento, mostrame reportes";
    }

    //Mostrar las pantallas del/la SECRETARIA/0
    if (isset($_SESSION['rol']) == 2){
      echo "mostrame reportes, mostrame solicitudes";
    }

    //Mostrar las pantallas del USUARIO_ESTANDAR
    if (isset($_SESSION['rol']) == 3){
      echo "mostrame reservaciones, inventario, boleteria";
    }*/

  ?>
  <!--INICIO - AQUI LAS PANTALLAS-->


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://mocaph.wordpress.com/amitigra/">AMITIGRA</a>.</strong> Derechos Reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="vista/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vista/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->

<script src="vista/bower_components/raphael/raphael.min.js"></script>
<!--<script src="vista/bower_components/morris.js/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="vista/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="vista/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="vista/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="vista/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vista/bower_components/moment/min/moment.min.js"></script>
<script src="vista/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="vista/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="vista/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="vista/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vista/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vista/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="vista/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<!--datatables-->
<script src="./vista/dist/js/jquery-3.3.1.min.js"></script>
<script src="./vista/dist/js/datatables.min.js"></script>
<script src="vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<!-- Sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>

<script src="./vista/dist/js/product.js"></script>




</body>
</html>
