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
                //Alterei por estar incluindo anteriormente classe inexistente
                include_once '../daos/receitaDAO.php';

                //Alterei aqui para ficar em acordo com a alteração e consulta
                $codReceita=$_POST["codReceita"];
                
                //Alterei por estar instanciando anteriormente classe inexistente
                $dao = new receitaDAO();

                //Alterei aqui
                $dao->excluir($codReceita);

                header('Location: ./receitaListar.php');
            }
        ?>

        <h2>Excluindo Receita</h2>

        <form class="m-3" action="receitaExcluir.php" name="formulario_postado" method="post">            <?php
                require "../DAOs/receitaDAO.php";
                require "./controles.php";

                $codReceita = $_GET["codReceita"];

                $dao = new receitaDAO();

                $obj = $dao->retornarPorcodReceita($codReceita);
                

                if ($obj) {
                     //Alterei abaixo de $obj->nomeReceita para $obj->nomeReceita
                    input('nomeReceita', 'Nome Receita', $obj->nomeReceita, true, "text");
                    input('ingredienteReceita', 'Ingrediente Receita', $obj->ingredienteReceita, true, "text");
                    input('preparoReceita', 'Preparo Receita', $obj->preparoReceita, true, "text"); 
                    input('comentarioReceita', 'Comentario Receita', $obj->comentarioReceita, true, "text");

                }

                else {
                    echo "<p>Receita não encontrada.</p>";
                }

                echo '<input type="hidden" name="codReceita" value="' . $codReceita . '">';
                
            ?>
            <button class="btn btn-danger">Excluir</button>
            <a class="btn btn-secondary" href="./receitaListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
