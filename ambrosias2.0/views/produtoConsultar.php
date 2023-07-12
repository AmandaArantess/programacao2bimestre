<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
    </header>
    <body> 
        <?php require_once './cabecalho.php' ?>
        <?php require_once './menu.php' ?>

        <h2>Consultando Aluno</h2>

        <form class="m-3">
            <?php
                require "../DAOs/alunoDAO.php";
                require "./controles.php";

                $id = $_GET["id"];

                $dao = new alunoDAO();

                $obj = $dao->retornarPorId($id);
                
                if ($obj) {
                    input('codProduto', 'Codigo Produto', '', false, "text");
                    input('nomeProduto', 'Nome Produto', '', false, "text");
                    input('precoProduto', 'Preço Produto', '', false, "text");
                    input('pesoProduto', 'Peso Produto', '', false, "text");
                    input('descricaoProduto', 'Descrição Produto', '', false, "text");
                }
                else {
                    echo "<p>Aluno não encontrado.</p>";
                }
                
            ?>
            <a class="btn btn-secondary" href="./alunoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
