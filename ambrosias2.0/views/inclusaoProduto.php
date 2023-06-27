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
                include_once '../models/aluno.php';
                include_once '../daos/alunoDAO.php';

                //Instancia uma nova receita
                $obj = new Aluno();

                $obj->nome=$_POST["nome"];
                $obj->whatsapp=$_POST["whatsapp"];
                $obj->dias_contratados=$_POST["dias_contratados"];

                $dao = new alunoDAO();

                $dao->inserir($obj);

                header('Location: ./alunoListar.php');
            }
        ?>

        <h2>Inserindo Aluno</h2>

        <form class="m-3" action="alunoInserir.php" name="formulario_postado" method="post">            
            <?php
                require "../DAOs/alunoDAO.php";
                require "./controles.php";

                input('nome', 'Nome', '', false, "text");
                input('whatsapp', 'Whatsapp', '', false, "text");
                input('dias_contratados', 'Dias contratados', '', false, "number");
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./alunoListar.php">Voltar</a>
        </form>
    </body>
</html>
