<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body style="background-image: url('../img/bakery.png')";>  
        <?php require_once './menu.php' ?>

        <h2 class="text-white">Consultando Receita</h2>

        <form class="m-3">
            <?php
                require "../DAOs/receitaDAO.php";
                require "./controles.php";

                $codReceita = $_GET["codReceita"];

                $dao = new receitaDAO();

                $obj = $dao->retornarPorcodReceita($codReceita);

                if ($obj) {
                    input('nomeReceita', 'Nome Receita', $obj->nomeReceita, true, "text");
                    input('ingredienteReceita', 'Ingrediente Receita', $obj->ingredienteReceita, true, "text");
                    input('preparoReceita', 'Preparo Receita', $obj->preparoReceita, true, "text"); 
                    input('comentarioReceita', 'Comentario Receita', $obj->comentarioReceita, true, "text");

                }
                
                else {
                    echo "<p>Receita não encontrada.</p>";
                }
                
            ?>
            <a class="btn btn-secondary" href="./receitaListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
