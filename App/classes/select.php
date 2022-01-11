<?php
require_once 'conexao.php';

class select
{
    public function pegardados()
    {
        $arr = array();
        $c = new conexao();
        $sql = 'SELECT * FROM veiculos';
        $stmt = $c->getcon()->prepare($sql);
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }
    public function busca()
    {
        $c = new conexao();
        $sql = 'SELECT * FROM `veiculos` WHERE `chassi` LIKE `%$busca%`';
        $stmt = $c->getcon()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
