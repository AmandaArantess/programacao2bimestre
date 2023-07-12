<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once '../models/produto.php';
                include_once '../daos/produtoDAO.php';

                //Instancia uma nova receita
                $obj = new Produto();

                $obj->codProduto=$_POST["codProduto"];
                $obj->nomeProduto=$_POST["nomeProduto"];
                $obj->precoProduto=$_POST["precoProduto"];
                $obj->pesoProduto=$_POST["pesoProduto"];
                $obj->descricaoProduto=$_POST["descricaoProduto"];

                $dao = new ProdutoDAO();


                $dao->inserir($obj);

                header('Location: ./produtoListar.php');
            }
        ?>

        <h2>Inserindo produto</h2>

        <form class="m-3" action="produtoInserir.php" name="formulario_postado" method="post">            
            <?php
                require "../DAOs/produtoDAO.php";
                require "./controles.php";

                input('codProduto', 'Codigo Produto', '', false, "text");
                input('nomeProduto', 'Nome Produto', '', false, "text");
                input('precoProduto', 'Preço Produto', '', false, "text");
                input('pesoProduto', 'Peso Produto', '', false, "text");
                input('descricaoProduto', 'Descrição Produto', '', false, "text");
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./produtoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
