<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body style="background-image: url('../img/bakery.png')";>  
        <?php require_once './menu.php' ?>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //Alterei por estar incluindo anteriormente classe inexistente
                include_once '../daos/produtoDAO.php';

                //Alterei aqui para ficar em acordo com a alteração e consulta
                $codProduto=$_POST["codProduto"];
                
                //Alterei por estar instanciando anteriormente classe inexistente
                $dao = new produtoDAO();

                //Alterei aqui
                $dao->excluir($codProduto);

                header('Location: ./produtoListar.php');
            }
        ?>

        <h2 class="text-white">Excluindo Produto</h2>

        <form class="m-3" action="produtoExcluir.php" name="formulario_postado" method="post">            <?php
                require "../DAOs/produtoDAO.php";
                require "./controles.php";

                $codProduto = $_GET["codProduto"];

                $dao = new produtoDAO();

                $obj = $dao->retornarPorcodProduto($codProduto);
                
                if ($obj) {
                    //Alterei abaixo de $obj->nomeproduto para $obj->nomeProduto
                    input('nomeProduto', 'Nome Produto', $obj->nomeProduto, true, "text");
                    input('precoProduto', 'Preço produto', $obj->precoProduto, true, "number");
                    input('pesoProduto', 'Peso produto', $obj->pesoProduto, true, "number");
                    input('descricaoProduto', 'Descrição produto', $obj->descricaoProduto, true, "text");

                }
                else {
                    echo "<p>Produto não encontrado.</p>";
                }

                echo '<input type="hidden" name="codProduto" value="' . $codProduto . '">';
                
            ?>
            <button class="btn btn-danger">Excluir</button>
            <a class="btn btn-secondary" href="./produtoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
