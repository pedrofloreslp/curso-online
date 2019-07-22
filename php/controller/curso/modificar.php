<?php

require_once '../../persistence/CursoDao.php';
require_once '../../model/Curso.php';

if(isset($_GET['id']) && isset($_GET['nombre'])) {
    echo json_encode(modificar($_GET['id'], $_GET['nombre']));
}

function modificar($id, $nombre) {
    $cursoDao = new CursoDao();
    $curso = new Curso();
    $curso->setId($id);
    $curso->setNombre($nombre);
    $cursoDao->update($curso);
}