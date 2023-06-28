<!doctype html>
<?php include("checarLogin.php") ?>
<html lang="pt-br">
    <body>
        <?php require_once './menu.php' ?>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once '../models/funcionario.php';
                include_once '../daos/produtoDAO.php';

                //Instancia um novo produto
                $obj = new Produto();

                $obj->nome=$_POST["nome"];
                $obj->whatsapp=$_POST["whatsapp"];
                $obj->dias_contratados=$_POST["dias_contratados"];

                $dao = new produtoDAO();

                $dao->inserir($obj);

                header('Location: ./produtoListar.php');
            }
        ?>

        <h2>Inserindo produto</h2>

        <form class="m-3" action="produtoInserir.php" name="formulario_postado" method="post">            
            <?php
                require "../DAOs/produtoDAO.php";
                require "./controles.php";

                input('nome', 'Nome', '', false, "text");
                input('whatsapp', 'Whatsapp', '', false, "text");
                input('dias_contratados', 'Dias contratados', '', false, "number");
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./produtoListar.php">Voltar</a>
        </form>
    </body>
</html>
