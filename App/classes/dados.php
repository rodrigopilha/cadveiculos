<?php

class dados
{
    public function getdados()
    {
        global  $chassi, $modelo, $marca, $ano,  $placa;

        if (!isset($_POST['chassi']) && !isset($_POST['caract'])) {
            return;
        }
        $chassi = addslashes($_POST['chassi']);
        $marca = addslashes($_POST['marca']);
        $modelo = addslashes($_POST['modelo']);
        $ano = addslashes($_POST['ano']);
        $placa = addslashes($_POST['placa']);
        $itens = implode(', ', $_POST['caract']);

        if (
            empty($chassi) || empty($marca)  || empty($modelo) ||
            empty($ano) || empty($placa) || empty($itens)
        ) {
            return;
        }
        require_once 'conexao.php';
        $con = new conexao();
        $sql = 'INSERT INTO veiculos (chassi,marca,modelo,ano,placa,itens)
         VALUES (:chassi,:marca,:modelo,:ano,:placa,:itens)';
        $stmt = $con->getcon()->prepare($sql);
        $stmt->bindValue(':chassi', $chassi);
        $stmt->bindValue(':marca', $marca);
        $stmt->bindValue(':modelo', $modelo);
        $stmt->bindValue(':ano', $ano);
        $stmt->bindValue(':placa', $placa);
        $stmt->bindValue(':itens', $itens);
        $stmt->execute();
    }
}
