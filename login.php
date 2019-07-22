<?php

include_once './config.php';
require_once ROOT_DIR.'/php/persistence/UsuarioDao.php';
require_once ROOT_DIR.'/php/model/Usuario.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioDao = new UsuarioDao();
    $usuario = $usuarioDao->autenticate($_POST["email"], $_POST["clave"]);
    if($usuario!=null) {
        //session_register($usuario);
        $_SESSION['loginId'] = $usuario->getId();
        $_SESSION['loginNombre'] = $usuario->getNombre();
        $_SESSION['loginIdRol'] = $usuario->getIdRol();
        header("location: index.php?menu=inicio");
    }else {
        $loginError = "El email o contraseña es incorrecto.";
    }
}
    
if(isset($loginError)) {
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?= $loginError?>
</div>
<?php
}
?>

<div class="card card-login mx-auto mt-5">
    <div class="card-header">Bienvenido a <b>Curso Online</b></div>
    <div class="card-body">
    <form action="index.php?sesion=login" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" class="form-control" type="email" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input id="contraseña" name="clave" class="form-control" type="password" placeholder="Contraseña">
        </div>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar Sesión">
    </form>
    </div>
</div>