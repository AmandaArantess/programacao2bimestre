<!doctype html>
<html lang="pt-br">
    <header>
    <title>Ambrosia's Confeitaria</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once '../models/produto.php';
                include_once '../models/receita.php';
                include_once '../daos/funcionarioDAO.php';

                $email=$_POST["email"];
                $senha=$_POST["senha"];

                $dao = new funcionarioDAO();

                $dao->inserir($email, $senha);

                header('Location: ./index.php');
            }
        ?>
        
        <h2>Criar Conta</h2>

        <form class="m-3" action="funcionarioInserir.php" name="formulario_postado" method="post">            
            <?php
                require "../DAOs/funcionarioDAO.php";
                require "./controles.php";

                input('email', 'E-mail', '', false, "text");
                input('senha', 'Senha', '', false, "password");
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./index.php">Voltar para a Página Inicial</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>

