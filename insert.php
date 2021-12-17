<?php 
require_once 'conection.php';
class insert{
    public function insertdata($peca,$marca,$veiculo,$ano,$modelo,$qtd){
        $con = new conection();
        $sql = 'INSERT INTO pecas (peca,marca,veiculo,ano,modelo,qtd) VALUES (?,?,?,?,?,?)';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(1,$peca);
        $stmt->bindValue(2,$marca);
        $stmt->bindValue(3,$veiculo);
        $stmt->bindValue(4,$ano);
        $stmt->bindValue(5,$modelo);
        $stmt->bindValue(6,$qtd);
        $stmt->execute();
    }
}