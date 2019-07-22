<?php

require_once '../../persistence/CursoDao.php';
require_once '../../model/Curso.php';

if(isset($_GET['id'])) {
    echo json_encode(eliminar($_GET['id']));
}

function eliminar($id) {
    $cursoDao = new CursoDao();
    $cursoDao->deleteById($id);
}