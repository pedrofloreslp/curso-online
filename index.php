<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Curso Online</title>
    <!-- Bootstrap core CSS-->
    <link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="bootstrap/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="bootstrap/css/sb-admin.css" rel="stylesheet">
    <script src="js/jquery-2.1.3.min.js"></script>
    <link href="css/estilo.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">Curso Online</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php include_once 'layout/menu.php'; ?>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <?php include_once 'layout/sesion.php'; ?>
        </div>
    </nav>
  
    <div class="content-wrapper">
        <div class="container-fluid">
            <?php 
            $paginaActual = "inicio";

            if(isset($_GET['menu'])) {
                $paginaActual = $_GET['menu'];
            } else if(isset($_GET['sesion'])) {                    
                $paginaActual = $_GET['sesion'];
            }

            $pagina = $paginaActual.'.php';

            if(file_exists($pagina)) {
                include_once($pagina);
            } else {
                include_once('layout/error404.php');
            }
            ?> 
        </div>
        
        <?php include_once 'layout/footer.php'; ?>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
      
        <!-- Bootstrap core JavaScript-->
        <script src="bootstrap/vendor/jquery/jquery.min.js"></script>
        <script src="bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
<!--        <script src="bootstrap/vendor/chart.js/Chart.min.js"></script>-->
        <script src="bootstrap/vendor/datatables/jquery.dataTables.js"></script>
        <script src="bootstrap/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="bootstrap/js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="bootstrap/js/sb-admin-datatables.min.js"></script>
<!--        <script src="bootstrap/js/sb-admin-charts.min.js"></script>-->
    </div>
</body>

</html>
