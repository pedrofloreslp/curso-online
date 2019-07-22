<?php

require_once '../../persistence/CursoDao.php';

if(isset($_GET['idUsuario'])) {
    echo json_encode(obtenerLista($_GET['idUsuario']));
}

function obtenerLista($idUsuario) {
    $cursoDao = new CursoDao();
    $cursos = $cursoDao->getAllByIdUsuario($idUsuario);
    return $cursos;
}