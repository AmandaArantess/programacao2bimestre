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
                include_once '../daos/produtoDAO.php';

                $cod=$_POST["cod"];
                
                $dao = new produtoDAO();

                $dao->excluir($cod);

                header('Location: ./produtoListar.php');
            }
        ?>

        <h2>Excluindo Produto</h2>

        <form class="m-3" action="produtoExcluir.php" name="formulario_postado" method="post">            <?php
                require "../DAOs/produtoDAO.php";
                require "./controles.php";

                $cod = $_GET["cod"];

                $dao = new produtoDAO();

                $obj = $dao->retornarPorCod($cod);
                
                if ($obj) {
                    input('nome', 'Nome', $obj->nomeProduto, true, "text");
                    input('preco', 'Preço', $obj->preco, true, "text");
                    input('peso', 'Peso', $obj->peso, true, "text");
                    input('descricao', 'Descrição', $obj->descricao, true, "text");
                }
                else {
                    echo "<p>Produto não encontrado.</p>";
                }

                echo '<input type="hidden" name="cod" value="' . $cod . '">';
                
            ?>
            <button class="btn btn-danger">Excluir</button>
            <a class="btn btn-secondary" href="./produtoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
