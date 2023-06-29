<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <h1>produtos</h1>

        <a class="btn btn-primary" href="./produtoInserir.php">Inserir</a>
        
        <table class="table">
            <thead>
                <th>Codigo Produto</th>
                <th>Nome Produto</th>
                <th>Preço Produto</th>
                <th>Peso Produto</th>
                <th>Descrição Produto</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    require '../DAOs/produtoDAO.php';
                    require '../Models/produto.php';

                    $dao = new produtoDAO();

                    $objetos = $dao->retornarTodos();

                    foreach($objetos as $obj) {
                        echo '<tr>
                            <td>' . $obj->codProduto . '</td>
                            <td>' . $obj->nomeProduto . '</td>
                            <td>' . $obj->precoProduto . '</td>
                            <td>' . $obj->pesoProduto . '</td>
                            <td>' . $obj->descricaoProduto . '</td>


                            <td>
                                <a class="btn btn-secondary" href="./produtoConsultar.php?id=' . $obj->id . '">Consultar</a>
                                <a class="btn btn-warning" href="./produtoAlterar.php?id=' . $obj->id . '">Alterar</a>
                                <a class="btn btn-danger" href="./produtoExcluir.php?id=' . $obj->id . '">Excluir</a>
                            </td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
