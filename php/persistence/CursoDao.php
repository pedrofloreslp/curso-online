<?php

require_once 'AbstractDao.php';
require_once 'ConexionManager.php';
include_once '../../../config.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursoDao
 *
 * @author Pedro Flores
 */
class CursoDao implements AbstractDao{
    
    private static $insert = "INSERT INTO curso (nombre, id_usuario) VALUES(?, ?)";
    private static $update = "UPDATE curso SET nombre=?  WHERE id=?";    
    private static $deleteById = "DELETE FROM curso WHERE id = ?";
    private static $getById = "SELECT id, nombre FROM curso WHERE id=?";
    private static $getAll = "SELECT id, nombre FROM curso";
    private static $getAllByIdUsuario = "SELECT id, nombre FROM curso WHERE id_usuario=?";
    
    private $conexion;
    
    function __construct(){
        $this->conexion = ConexionManager::getInstance();
    }
    
    public function getAll() {
        $cursos = array();
        $consulta = $this->conexion->prepare(static::$getAll);
        $consulta->bindColumn("id", $dbId);
        $consulta->bindColumn("nombre", $dbNombre);
        $consulta->execute();
        while($consulta->fetch()) {
            array_push($cursos, Array(
                'id' => $dbId,
                'nombre' => $dbNombre
            ));
        }
        return $cursos;
    }

    public function deleteById($id) {
        $consulta = $this->conexion->prepare(static::$deleteById);
        $consulta->bindParam(1, $id);
        $consulta->execute();
    }

    public function getById($id) {
        $consulta = $this->conexion->prepare(static::$getById);
        $consulta->bindParam(1, $id);
        $consulta->bindColumn("id", $dbId);
        $consulta->bindColumn("nombre", $dbNombre);
        $consulta->execute();
        if($consulta->fetch()) {
            return Array(
                'id' => $dbId,
                'nombre' => $dbNombre
            );
        }
        return null;
    }

    public function insert($element) {
        $consulta = $this->conexion->prepare(static::$insert);
        $consulta->bindParam(1, $element->getNombre());
        $consulta->bindParam(2, $element->getIdUsuario());
        $consulta->execute();
    }

    public function update($element) {
        $consulta = $this->conexion->prepare(static::$update);
        $consulta->bindParam(1, $element->getNombre());
        $consulta->bindParam(2, $element->getId());
        $consulta->execute();
    }
    
    
    
    public function getAllByIdUsuario($idUsuario){
        $cursos = array();
        $consulta = $this->conexion->prepare(static::$getAllByIdUsuario);
        $consulta->bindParam(1, $idUsuario);
        $consulta->bindColumn("id", $dbId);
        $consulta->bindColumn("nombre", $dbNombre);
        $consulta->execute();
        while($consulta->fetch()) {
            array_push($cursos, Array(
                'id' => $dbId,
                'nombre' => $dbNombre
            ));
        }
        return $cursos;
    }
}
