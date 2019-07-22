<?php

class Usuario {
    private $id;
    private $nombre;
    private $clave;
    private $email;
    private $idRol;
    
   
    function __construct() {

    }
    
    function getId() {
        return $this->id;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getClave() {
        return $this->clave;
    }

    function getEmail() {
        return $this->email;
    }

    function getIdRol() {
        return $this->idRol;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

}
