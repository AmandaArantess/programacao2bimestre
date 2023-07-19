<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <h1>Receitas</h1>

        <a class="btn btn-primary" href="./receitaInserir.php">Inserir</a>
        
        <table class="table">
            <thead>
                <th>Nome</th>
                <th>Ingredientes</th>
                <th>Preparo</th>
                <th>Comentario</th>

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
                            <td>' . $obj->nomeReceita . '</td>
                            <td>' . $obj->ingredienteReceita . '</td>
                            <td>' . $obj->preparoReceita . '</td>
                            <td>' . $obj->comentarioReceita . '</td>


                            <td>
                                <a class="btn btn-secondary" href="./receitaConsultar.php?codReceita=' . $obj->codReceita . '">Consultar</a>
                                <a class="btn btn-warning" href="./receitaAlterar.php?codReceita=' . $obj->codReceita . '">Alterar</a>
                                <a class="btn btn-danger" href="./receitaExcluir.php?codReceita=' . $obj->codReceita . '">Excluir</a>
                            </td>
                        </tr>';
                        //Alterei os links acima trocando id por codReceita
                    }
                ?>
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
