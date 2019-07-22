<?php

require_once '../../persistence/CursoDao.php';
require_once '../../model/Curso.php';

if(isset($_GET['nombre']) && isset($_GET['idUsuario'])) {
    echo json_encode(insertar($_GET['nombre'], $_GET['idUsuario']));
}

function insertar($nombre, $idUsuario) {
    $cursoDao = new CursoDao();
    $curso = new Curso();
    $curso->setNombre($nombre);
    $curso->setIdUsuario($idUsuario);
    $cursoDao->insert($curso);
}