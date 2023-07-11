<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <h1>receita</h1>

        <a class="btn btn-primary" href="./receitaInserir.php">Inserir</a>
        
        <table class="table">
            <thead>
                <th>Codigo Receita</th>
                <th>Nome receita</th>
                <th>Ingredientes</th>
                <th>Preparo</th>
                <th>Comentários</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    require '../DAOs/receitaDAO.php';
                    require '../Models/receita.php';

                    $dao = new receitaDAO();

                    $objetos = $dao->retornarTodos();

                    foreach($objetos as $obj) {
                        echo '<tr>
                            <td>' . $obj->codReceita . '</td>
                            <td>' . $obj->nomeReceita . '</td>
                            <td>' . $obj->ingredientes . '</td>
                            <td>' . $obj->preparo . '</td>
                            <td>' . $obj->comentarios . '</td>


                            <td>
                                <a class="btn btn-secondary" href="./receitaConsultar.php?id=' . $obj->id . '">Consultar</a>
                                <a class="btn btn-warning" href="./receitaAlterar.php?id=' . $obj->id . '">Alterar</a>
                                <a class="btn btn-danger" href="./receitaExcluir.php?id=' . $obj->id . '">Excluir</a>
                            </td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
