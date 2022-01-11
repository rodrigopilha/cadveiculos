<?php
require_once 'classes/conexao.php';

$conexao = new conexao();
$conexao->getcon();

if (!isset($_GET['busca'])) {
    header("Location:index.php");
}
$busca = "%" . trim($_GET['busca']) . "%";
$sql = 'SELECT * FROM `veiculos` WHERE `chassi` LIKE :busca';
$stmt = $conexao->getcon()->prepare($sql);
$stmt->bindValue(':busca',  $busca);
$stmt->execute();
$dado = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>busca</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Buscar Veiculos</h1>
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

            <?php
            echo "<tr>";
            if (count($dado)) {
                foreach ($dado as $d) {
                    echo "<td>" . $d['chassi'] . "</td>";
                    echo "<td>" . $d['marca'] . "</td>";
                    echo "<td>" . $d['modelo'] . "</td>";
                    echo "<td>" . $d['ano'] . "</td>";
                    echo "<td>" . $d['placa'] . "</td>";
                    echo "<td>" . $d['itens'] . "</td>";
            ?>

                <?php
                    echo "</tr>";
                }
            } else {
                ?>
                <script>
                    alert("Nao foram encontrados resultados para sua busca...");
                </script>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>