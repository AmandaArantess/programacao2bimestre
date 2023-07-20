<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body style="background-image: url('../img/padaria.png')";>             
       
        <?php require_once './menu.php' ?>
        <h1 class="text-white" >Produtos</h1>

        <a  type="button" class="btn btn-info" href="./produtoInserir.php">Inserir</a>
        
        <table class="table">
            <thead class="text-white">
                <th>Nome</th>
                <th>Preço</th>
                <th>Peso</th>
                <th>Descrição</th>

                <th></th>
            </thead>
            <tbody>
                <?php
                    require '../DAOs/produtoDAO.php';
                    require '../Models/produto.php';

                    $dao = new produtoDAO();

                    $objetos = $dao->retornarTodos();

                    foreach($objetos as $obj) {
                        echo '<tr class="text-white">
                            <td>' . $obj->nomeProduto . '</td>
                            <td>' . $obj->precoProduto . '</td>
                            <td>' . $obj->pesoProduto . '</td>
                            <td>' . $obj->descricaoProduto . '</td>


                            <td>
                                <a class="btn btn-secondary" href="./produtoConsultar.php?codProduto=' . $obj->codProduto . '">Consultar</a>
                                <a class="btn btn-dark" href="./produtoAlterar.php?codProduto=' . $obj->codProduto . '">Alterar</a>
                                <a class="btn btn-danger" href="./produtoExcluir.php?codProduto=' . $obj->codProduto . '">Excluir</a>
                            </td>
                        </tr>';
                        //Alterei os links acima trocando id por codProduto
                    }
                ?>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
