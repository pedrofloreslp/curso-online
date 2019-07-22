<?php

require_once '../../persistence/CursoDao.php';

echo json_encode(obtenerLista());

function obtenerLista() {
    $cursoDao = new CursoDao();
    $cursos = $cursoDao->getAll();
    return $cursos;
}