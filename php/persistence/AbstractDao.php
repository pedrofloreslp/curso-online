<?php

interface AbstractDao {
 
    public function getById($id);
    
    public function getAll();
    
    public function insert($element);
    
    public function update($element);
    
    public function deleteById($id);
}
