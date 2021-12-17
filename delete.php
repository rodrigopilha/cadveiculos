<?php
require_once 'conection.php';
class delete{
    public function deletedado($id){
        $con = new conection();
        $sql = 'DELETE FROM pecas WHERE id = ?';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}