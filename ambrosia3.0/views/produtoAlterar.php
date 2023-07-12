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
                require_once '../models/produto.php';
                require_once '../daos/produtoDAO.php';

                $mensagensErro = false;

                if (!isset($_POST) || empty($_POST)) {
                    $mensagensErro = "Nada foi postado!";
                }
                else {

                    $nomeProduto = $_POST["dias_contratados"];

                    if (!is_numeric($nomeProduto)) {
                        $mensagensErro = "O campo 'Nome do Produto' precisa ser preenchido.";
                    }
                    else {
                        //Instancia uma nova produto
                        $obj = new Produto();

                        $obj->cod=$_POST["codProduto"];
                        $obj->preco=$_POST["precoProduto"];
                        $obj->peso=$_POST["pesoProduto"];
                        $obj->descricao=$_POST["descricaoProduto"];
                        $obj->nomeProduto=$nomeProduto;

                        $dao = new produtoDAO();

                        $dao->alterar($obj);

                        header('Location: ./produtoListar.php');
                    }

                    if ($mensagensErro) {
                        header('Location: ./erro.php?mensagem=' . $mensagensErro);
                    }
                }
            }
        ?>

        <h2>Alterando Produto</h2>

        <form class="m-3" action="produtoAlterar.php" name="formulario_postado" method="post">            
            <?php
                require_once "../DAOs/produtoDAO.php";
                require_once "./controles.php";

                $id = $_GET["id"];

                $dao = new produtoDAO();

                $obj = $dao->retornarPorCod($cod);
                
                if ($obj) {
                    input('nome', 'Nome', $obj->nomeProduto, false, "text");
                    input('preco', 'Preço', $obj->preco, false, "text");
                    input('peso', 'Peso', $obj->peso, false, "text");
                    input('descricao', 'Descrição', $obj->descricao, false, "text");

                }
                else {
                    echo "<p>Produto não encontrado.</p>";
                }

                echo '<input type="hidden" name="id" value="' . $cod . '">';
                
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./Listar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
