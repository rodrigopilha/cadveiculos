<?php
require_once 'classes/select.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Lista de Veiculos</title>
  <style>
    body {
      background-color: azure;
    }

    .btn {
      display: inline;
      padding: 4px;
      text-decoration: none;
    }

    h1 {
      text-align: center;
    }

    th a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <h1>Lista de Veiculos</h1>
  <div class="m-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Chassi</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
          <th scope="col">Ano</th>
          <th scope="col">Placa</th>
          <th scope="col">caracteristicas</th>
        </tr>
      </thead>
      <button class="btn btn-dark " id="btn" type="button"><a href="index.php" style="text-decoration: none;">Voltar</a></button>
      <?php
      $select = new select();
      $dados = $select->pegardados();
      echo "<tr>";
      foreach ($dados as $dado) {
        foreach ($dado as $k => $value) {
          if ($k != "id") {
            echo "<td>" . $value . "</td>";
          }
        }
      ?>
        <th><a href="Atualizar.php?edt=<?php echo $dado['id']; ?>" class="btn-success btn">Editar</a>
          <a href="listar.php?id=<?php echo $dado['id']; ?>" class="btn-danger btn">Apagar</a>
        </th>
      <?php
        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
<?php
require_once 'classes/delete.php';
$del = new delete();
if (isset($_GET['id'])) {
  $id_veiculo = addslashes($_GET['id']);
  $del->deletedado($id_veiculo);
}

?>