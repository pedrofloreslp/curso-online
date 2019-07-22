<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexionManager
 *
 * @author Pedro Flores
 */
class ConexionManager extends PDO {
    
    private static $DB_USR="pedro";
    private static $DB_PWD="pedro";    
    private static $DSN='mysql:host=localhost;dbname=curso_online;charset=utf8';
    
    private static $instancia;
    
    public function __construct(){
        parent::__construct(
                static::$DSN, 
                static::$DB_USR,
                static::$DB_PWD);
    }
    
    public static function getInstance()
    {
        if (!isset(static::$instancia)) {
            static::$instancia = new ConexionManager();
        } 
        return static::$instancia;
    }
    
}
