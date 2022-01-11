<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      background-color: azure;

    }

    .btn {
      padding: 10px;
      text-decoration: none;
    }

    h1 {
      text-align: center;
    }

    #btn {
      display: block;
      width: 80px;
      margin-left: 10px;
    }
  </style>
  <title>Cadastro de Veiculos</title>
</head>

<body>
  <h1>Cadastrar Veiculo</h1>
  <form method="POST" class="row g-3 m-5 ">
    <div class="col-md-4 position-relative">

      <input type="text" class="form-control" placeholder="Chassi" maxlength="17" name="chassi" value="<?php if (isset($dado)) {
                                                                                                          echo $dado['chassi'];
                                                                                                        } ?>">

    </div>
    <div class="col-md-4 position-relative">

      <input type="text" class="form-control" placeholder=" Marca" name="marca" value="<?php if (isset($dado)) {
                                                                                          echo $dado['marca'];
                                                                                        } ?>">

    </div>
    <div class="col-md-6 position-relative">

      <input type="text" class="form-control" placeholder="Modelo" name="modelo" value="<?php if (isset($dado)) {
                                                                                          echo $dado['modelo'];
                                                                                        } ?>">

    </div>
    </div>
    <div class="col-md-4 position-relative">

      <input type="text" class="form-control" placeholder="Ano" name="ano" value="<?php if (isset($dado)) {
                                                                                    echo $dado['ano'];
                                                                                  } ?>">

    </div>

    <div class="col-md-3 position-relative">

      <input type="text" class="form-control" placeholder="Placa" maxlength="7" name="placa" value="<?php if (isset($dado)) {
                                                                                                      echo $dado['placa'];
                                                                                                    } ?>">

    </div>

    <div class="row">
      <h4>Escolha duas caracteristicas</h4>

      <div class="form-check">
        <input class=" form-check-input" name="caract[]" type="checkbox" value="esport" id="Check1">
        <label class="form-check-label" for="Check">
          Esporte
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="caract[]" type="checkbox" value="classico" id="Check2">
        <label class="form-check-label" for="Check">
          Classico
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" name="caract[]" type="checkbox" value="turbo" id="Check3">
        <label class="form-check-label" for="Check">
          Turbo
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="caract[]" type="checkbox" value="economico" id="Check4">
        <label class="form-check-label" for="Check">
          Economico
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" name="caract[]" type="checkbox" value="para cidade" id="Check5">
        <label class="form-check-label" for="Check">
          Para cidade
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="caract[]" type="checkbox" value="longas viagens" id="Check6">
        <label class="form-check-label" for="Check">
          Para longas viagens
        </label>
      </div>

    </div>
    <div class="col-12 ">
      <input class="btn btn-primary" id="botao" type="submit" value="Cadastrar">
    </div>
    <button class="btn btn-dark " id="btn" type="button"><a href="index.php" style="text-decoration: none;">Voltar</a></button>

  </form>

  <script>
    (function() {
      var marcados = 0;
      var verificaCheckeds = function($checks) {
        if (marcados >= 2) {
          loop($checks, function($element) {
            $element.disabled = $element.checked ? '' : 'disabled';
          });
        } else {
          loop($checks, function($element) {
            $element.disabled = '';
          });
        }
      };
      var loop = function($elements, cb) {
        var max = $elements.length;
        while (max--) {
          cb($elements[max]);
        }
      }
      var count = function($element) {
        return $element.checked ? marcados + 1 : marcados - 1;
      }
      window.onload = function() {
        var $checks = document.querySelectorAll('input[type="checkbox"]');
        loop($checks, function($element) {
          $element.onclick = function() {
            marcados = count(this);
            verificaCheckeds($checks);
          }
          if ($element.checked) marcados = marcados + 1;
        });
        verificaCheckeds($checks);
      }
    }());
  </script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
<?php
require_once '../App/classes/conexao.php';
require_once '../App/classes/dados.php';
//require_once '../App/classes/insert.php';

$data = new dados();
$data->getdados();

?>