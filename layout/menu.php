<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = htmlentities($_SERVER['PHP_SELF']);
$paginas = array(
    array("inicio", "Menú principal", "fa-home", ""),
    array("curso", "Administrar cursos", "fa-pencil", "2"),
    array("ver", "ver cursos", "fa-book", "3"));

$paginaActual = "inicio";
if(isset($_GET['menu'])) {
    $paginaActual = $_GET['menu'];
} 
?>

<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
<?php
$idRol = "";
if(isset($_SESSION['loginIdRol'])){
    $idRol = $_SESSION['loginIdRol'];
}

for ($i = 0; $i < 3; $i++) {
    
    $mostrar = false;
    if($paginas[$i][3]==""){
        $mostrar = true;
    }else if($idRol == "1"){
        $mostrar = true;
    }else{
        if($idRol==""){
            $mostrar = false;
        }else if($paginas[$i][3]==$idRol){
            $mostrar = true;
        }
    }
    
    if($mostrar){
        $seleccionado = '';
        if($paginaActual == $paginas[$i][0]){
            $seleccionado = 'selected';
        }
?>
    <li class="nav-item <?= $seleccionado?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="<?= $url?>?menu=<?= $paginas[$i][0]?>">
            <i class="fa fa-fw <?= $paginas[$i][2]?>"></i>
            <span class="nav-link-text"><?= ucfirst($paginas[$i][1])?></span>
        </a>
    </li>
<?php    
//    if($paginaActual == $p) {
//        echo '<li class="seleccionado">'.ucfirst($p).'</li>';
//    } else {
//        echo '<li><a href="'.$url.'?menu='.$p.'">'.ucfirst($p).'</a></li>';
//    }
    }
}
?>
</ul>