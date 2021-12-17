<?php

class dados{
    
    public function getdados(){
      global  $peca, $marca, $veiculo, $ano, $modelo, $qtd;

        if(!isset($_POST['peca'])){
            return;
        }
        $peca = addslashes($_POST['peca']);
        $marca = addslashes($_POST['marca']);
        $veiculo = addslashes($_POST['veiculo']);
        $ano = addslashes($_POST['ano']);
        $modelo = addslashes($_POST['modelo']);
        $qtd = addslashes($_POST['qtd']);

                if(empty($peca) ||
                    empty($marca)  ||
                    empty($veiculo)||
                    empty($ano) ||
                    empty($modelo) ||
                    empty($qtd)){
                        echo "preencha todos os campos";
                 return;
                }
        }
        
    }
    