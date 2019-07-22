<?php

require_once 'AbstractDao.php';
require_once 'ConexionManager.php';

/**
 * Description of UsuarioDao
 *
 * @author Pedro Flores
 */
class UsuarioDao implements AbstractDao {
    
    public $conexion;
    
    function __construct(){
        $this->conexion = ConexionManager::getInstance();
    }
    
    public function autenticate($email, $clave) {
        
        $preparedStmt = $this->conexion->prepare("SELECT id, email, nombre, id_rol FROM usuario WHERE email = ? AND clave = PASSWORD(?)");
        
        if($preparedStmt != false) {
            $preparedStmt->bindParam(1, $email);
            $preparedStmt->bindParam(2, $clave);
            $preparedStmt->bindColumn("id", $dbId);
            $preparedStmt->bindColumn("email", $dbEmail);
            $preparedStmt->bindColumn("nombre",$dbNombre);
            $preparedStmt->bindColumn("id_rol",$dbIdRol);
            $preparedStmt->execute();

            if($preparedStmt->fetch()) {
                $user = new Usuario();
                $user->setId($dbId);
                $user->setEmail($dbEmail);
                $user->setNombre($dbNombre);
                $user->setIdRol($dbIdRol);
            } else {
                $user = null;
            }
        } else {
            throw new Exception('no se pudo preparar la consulta a la base de datos: '.$this->conexion->error);
        }
        
        return $user;
    }

    public function deleteById($id) {
        
    }

    public function getAll() {
        
    }

    public function getById($id) {
        
    }

    public function insert($element) {
        
    }

    public function update($element) {
        
    }

}
