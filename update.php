<?php
require_once 'conection.php';
class update{
    public function editar($id){
        $con = new conection();
        $sql = 'SELECT * FROM pecas WHERE id = ?';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
       }



       public function atualizar($peca,$marca,$veiculo,$ano,$modelo,$qtd){
            $sql = 'UPDATE pecas SET peca = ?,marca = ?,veiculo = ?,ano = ?,modelo = ?,qtd = ? WHERE id = ? ';
            $stmt = $this->con->getcon()->prepare($sql);
            $stmt->bindValue(1,$peca);
            $stmt->bindValue(2,$marca);
            $stmt->bindValue(3,$veiculo);
            $stmt->bindValue(4,$ano);
            $stmt->bindValue(5,$modelo);
            $stmt->bindValue(6,$qtd);
            $stmt->execute();
       }
}