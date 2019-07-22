<?php

require_once 'ConexionManager.php';
require_once 'AbstractDao.php';
require_once 'EspecialidadDao.php';

class EspecialidadDao implements AbstractDao {
    
    private static $insertQuery = "INSERT INTO especialidad (id,nombre) VALUES(?, ?)";
    private static $updateQuery = "UPDATE especialidad SET nombre=? WHERE id=?";    
    private static $deleteQuery = "DELETE FROM especialidad WHERE id = ?";
    private static $selectAllQuery = "SELECT id, nombre FROM especialidad";
    private $conexion;
    
    function __construct(){
        $this->conexion = DBConexion::getInstance();
    }
    
    public function delete($idEspecialidad) {
        $preparedStmt = $this->conexion->prepared(static::$deleteQuery);
        $preparedStmt->bind_param("i",$idEspecialidad);
        $preparedStmt->execute();
        
        return ($this->conexion->affected_rows > 0);            
    }

    public function getAll() {
        $resultSet = $this->conexion->query(static::$selectAllQuery);
        $listado = array();
        
        while($registro = $resultSet->fetch(PDO::FETCH_ASSOC)) {
            $especialidad = new Especialidad($registro["id"],$registro["nombre"]);            
            array_push($listado, $especialidad);
        }
        
        return $listado;
    }

    public function getById($idEspecialidad) {
        
    }

    public function insert($especialidad) {
        
    }

    public function update($especialidad) {
        
    }

}