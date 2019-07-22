<?php
session_start();
session_destroy();
unset($_SESSION['loginNombre']);
unset($_SESSION['loginId']);
unset($_SESSION['loginIdRol']);
header("location:index.php");