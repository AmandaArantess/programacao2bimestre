<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <h2>Consultando Produto</h2>

        <form class="m-3">
            <?php
                require "../DAOs/produtoDAO.php";
                require "./controles.php";

                $codProduto = $_GET["codProduto"];

                $dao = new produtoDAO();

                $obj = $dao->retornarPorcodProduto($codProduto);
                
                if ($obj) {

                    input('nomeProduto', 'Nome Produto', $obj->nomeProduto, true, "text");
                    input('precoProduto', 'Preço produto', $obj->precoProduto, true, "number");
                    input('pesoProduto', 'Peso produto', $obj->pesoProduto, true, "number");
                    input('descricaoProduto', 'Descrição', $obj->descricaoProduto, true, "text");

                }
                else {
                    echo "<p>produto não encontrado.</p>";
                }
                
            ?>
            <a class="btn btn-secondary" href="./produtoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
