<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <body>
        <?php require_once './cabecalho.php' ?>
        <?php require_once './menu.php' ?>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once '../daos/produtoDAO.php';

                $id=$_POST["id"];
                
                $dao = new produtoDAO();

                $dao->excluir($id);

                header('Location: ./produtoListar.php');
            }
        ?>

        <h2>Excluindo produto</h2>

        <form class="m-3" action="produtoExcluir.php" name="formulario_postado" method="post">            <?php
                require "../DAOs/produtoDAO.php";
                require "./controles.php";

                $id = $_GET["id"];

                $dao = new produtoDAO();

                $obj = $dao->retornarPorId($id);
                
                if ($obj) {
                    
                    input('codProduto', 'Codigo Produto', '', false, "text");
                input('nomeProduto', 'Nome Produto', '', false, "text");
                input('precoProduto', 'Preço Produto', '', false, "text");
                input('pesoProduto', 'Peso Produto', '', false, "text");
                input('descricaoProduto', 'Descrição Produto', '', false, "text");
                }
                else {
                    echo "<p>produto não encontrado.</p>";
                }

                echo '<input type="hidden" name="id" value="' . $id . '">';
                
            ?>
            <button class="btn btn-danger">Excluir</button>
            <a class="btn btn-secondary" href="./produtoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
