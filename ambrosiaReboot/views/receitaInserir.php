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
                include_once '../models/receita.php';
                include_once '../daos/receitaDAO.php';

                //Instancia uma nova receita
                $obj = new Receita();

                $obj->nomeReceita=$_POST["nomeReceita"];
                $obj->ingredienteReceita=$_POST["ingredienteReceita"];
                $obj->preparoReceita=$_POST["preparoReceita"];
                $obj->comentarioReceita=$_POST["comentarioReceita"];

                $dao = new receitaDAO();

                $dao->inserir($obj);

                header('Location: ./receitaListar.php');
            }
        ?>

        <h2>Inserindo Receita</h2>

        <form class="m-3" action="receitaInserir.php" name="formulario_postado" method="post">            
            <?php
                require "../DAOs/receitaDAO.php";
                require "./controles.php";

                input('nomeReceita', 'Nome Receita', '', false, "text");
                input('ingredienteReceita', 'Ingrediente Receita', '', false, "text");
                input('preparoReceita', 'Preparo Receita', '', false, "text");
                input('comentarioReceita', 'comentario Receita', '', false, "text");

            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./receitaListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
