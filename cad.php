<?php
require_once 'update.php';

$up = new update();
if(isset($_GET['edt']) && !empty($_GET['edt'])){
    $editar = addslashes($_GET['edt']);
    $dado = $up->editar($editar);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body{
      background-color: azure;
     
    }
   .btn{
       padding: 10px;
       text-decoration: none; 
      }
      h1{
          text-align: center;
      }
    </style>
    <title>Cadastro de Peças</title>    
  </head>
  <body>
      <h1>Cadastrar peça</h1>
  <form  method="POST"  class="row g-3 m-5 " >
        <div class="col-md-4 position-relative">
           
            <input type="text" class="form-control" placeholder="Peça" name="peca"
            value="<?php if(isset($dado)){echo $dado['peca'];} ?>"
            >
            
        </div>
        <div class="col-md-4 position-relative">
           
            <input type="text" class="form-control" placeholder=" Marca" name="marca"
            value="<?php if(isset($dado)){echo $dado['marca'];} ?>"
            >
            
        </div>
        <div class="col-md-4 position-relative">
                    
            <input type="text" class="form-control" placeholder="Veiculo" name="veiculo"
            value="<?php if(isset($dado)){echo $dado['veiculo'];} ?>"
            >
                       
            </div>
        </div>
        <div class="col-md-4 position-relative">
           
            <input type="text" class="form-control" placeholder="Ano" name="ano"
            value="<?php if(isset($dado)){echo $dado['ano'];} ?>"
            >
            
        </div>
        <div class="col-md-6 position-relative">

        <input type="text" class="form-control" placeholder="Modelo" name="modelo"
        value="<?php if(isset($dado)){echo $dado['modelo'];} ?>"
        >

        </div>
        <div class="col-md-3 position-relative">

        <input type="text" class="form-control" placeholder="Quantidade" name="qtd"
        value="<?php if(isset($dado)){echo $dado['qtd'];} ?>"
        >

        </div>
        <div class="col-12 ">
            <button class="btn btn-primary" type="submit" 
            value="<?php if(isset($dado)){echo "Atualizar";}else{echo "Cadastrar";} ?>"
            >Cadastrar</button>
        </div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
<?php
require_once 'conection.php';
require_once 'data.php';
require_once 'insert.php';

$data = new dados();
$data->getdados();

$insert = new insert();
$insert->insertdata($peca, $marca, $veiculo, $ano, $modelo, $qtd);
?>
