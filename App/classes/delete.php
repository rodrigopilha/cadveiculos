<?php
require_once 'conexao.php';
class delete
{
    public function deletedado($id)
    {
        $con = new conexao();
        $sql = 'DELETE FROM veiculos WHERE id = ?';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
