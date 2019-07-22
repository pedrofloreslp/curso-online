<?php
include_once './config.php';

if(!isset($_SESSION['loginNombre'])) {
    header("Location: index.php?sesion=login");
}
?>