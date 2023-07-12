<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once '../models/produto.php';
                include_once '../daos/produtoDAO.php';

                //Instancia uma nova receita
                $obj = new Produto();

                $obj->nome=$_POST["nomeProduto"];
                $obj->preco=$_POST["precoProduto"];
                $obj->peso=$_POST["pesoProduto"];
                $obj->descricao=$_POST["descricaoProduto"];

                $dao = new produtoDAO();

                $dao->inserir($obj);

                header('Location: ./produtoListar.php');
            }
        ?>

        <h2>Inserindo Aluno</h2>

        <form class="m-3" action="produtoInserir.php" name="formulario_postado" method="post">            
            <?php
                require "../DAOs/produtoDAO.php";
                require "./controles.php";

                input('nome', 'Nome', $obj->nomeProduto, false, "text");
                input('preco', 'Preço', $obj->preco, false, "text");
                input('peso', 'Peso', $obj->peso, false, "text");
                input('descricao', 'Descrição', $obj->descricao, false, "text");
               
            
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./produtoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
