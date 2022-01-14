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
    public function upd($id)
    {
        if (!isset($_POST['chassi']) && !isset($_POST['caract'])) {
            return;
        }
        $chassi = addslashes($_POST['chassi']);
        $marca  = addslashes($_POST['marca']);
        $modelo = addslashes($_POST['modelo']);
        $ano    = addslashes($_POST['ano']);
        $placa  = addslashes($_POST['placa']);
        $itens  = implode('-', $_POST['caract']);

        if (
            empty($chassi) || empty($marca)  || empty($modelo)
            || empty($ano) || empty($placa) || empty($itens)
        ) {
            return;
        }
        $con = new conexao();
        $sql = 'UPDATE veiculos SET chassi = :chassi,marca = :marca,modelo = :modelo,
                             ano = :ano,placa = :placa,itens = :itens WHERE id = :id';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(':chassi', $chassi);
        $stmt->bindValue(':marca',  $marca);
        $stmt->bindValue(':modelo', $modelo);
        $stmt->bindValue(':ano',    $ano);
        $stmt->bindValue(':placa',  $placa);
        $stmt->bindValue(':itens',  $itens);
        $stmt->bindValue(':id',     $id);
        $stmt->execute();
    }
}
