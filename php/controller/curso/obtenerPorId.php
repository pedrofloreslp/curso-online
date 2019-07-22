<?php

require_once '../../persistence/CursoDao.php';

if(isset($_GET['id'])) {
    echo json_encode(obtenerPorId($_GET['id']));
}

function obtenerPorId($id) {
    $cursoDao = new CursoDao();
    $curso = $cursoDao->getById($id);
    return $curso;
}