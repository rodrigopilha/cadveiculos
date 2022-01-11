<?php
require_once 'conexao.php';
class update
{
    public function editar($id)
    {
        $con = new conexao();
        $sql = 'SELECT * FROM veiculos WHERE id = ?';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }



    public function atualizar($id, $chassi, $marca, $modelo, $ano, $placa)
    {

        $con = new conexao();
        $sql = 'UPDATE veiculos SET chassi = ?,marca = ?,modelo = ?,ano = ?,placa = ? WHERE id = ? ';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(1, $chassi);
        $stmt->bindValue(2, $marca);
        $stmt->bindValue(3, $modelo);
        $stmt->bindValue(4, $ano);
        $stmt->bindValue(5, $placa);
        $stmt->bindValue(6, $id);
        $stmt->execute();
    }
}
