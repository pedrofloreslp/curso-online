<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = '';
$nombre = '';
$url = '';
$mensaje = '';

if(isset($_SESSION['loginNombre'])) {
    $id = $_SESSION['loginId'];
    $nombre = 'Bienvenido '.$_SESSION['loginNombre'];
    $url = 'index.php?sesion=logout';
    $mensaje = 'Cerrar Sesión';
}else{
    $id = '';
    $nombre = '';
    $url = 'index.php?sesion=login';
    $mensaje = 'Iniciar Sesión';
}
?>
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link">
            <input id="sesion-id-usuario" type="hidden" value="<?= $id?>" />
            <?= $nombre?>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= $url?>" class="nav-link">
            <i class="fa fa-fw fa-sign-out"></i><?= $mensaje?>
        </a>
    </li>
</ul>
