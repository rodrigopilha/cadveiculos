<?php
require_once 'conection.php';

class select{
    public function pegardados(){
        $arr = array();
        $c = new conection();
        $sql = 'SELECT * FROM pecas';
        $stmt = $c->getcon()->prepare($sql);
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
        
    }
   
}


