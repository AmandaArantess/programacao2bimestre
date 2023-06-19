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
                require_once '../models/aluno.php';
                require_once '../daos/alunoDAO.php';

                $mensagensErro = false;

                if (!isset($_POST) || empty($_POST)) {
                    $mensagensErro = "Nada foi postado!";
                }
                else {

                    $diasContratados = $_POST["dias_contratados"];

                    if (!is_numeric($diasContratados)) {
                        $mensagensErro = "O campo 'Dias Contratados' precisa ser um valor numérico.";
                    }
                    else {
                        //Instancia uma nova receita
                        $obj = new Aluno();

                        $obj->id=$_POST["id"];
                        $obj->nome=$_POST["nome"];
                        $obj->whatsapp=$_POST["whatsapp"];
                        $obj->dias_contratados=$diasContratados;

                        $dao = new alunoDAO();

                        $dao->alterar($obj);

                        header('Location: ./alunoListar.php');
                    }

                    if ($mensagensErro) {
                        header('Location: ./erro.php?mensagem=' . $mensagensErro);
                    }
                }
            }
        ?>

        <h2>Alterando Aluno</h2>

        <form class="m-3" action="alunoAlterar.php" name="formulario_postado" method="post">            
            <?php
                require_once "../DAOs/alunoDAO.php";
                require_once "./controles.php";

                $id = $_GET["id"];

                $dao = new alunoDAO();

                $obj = $dao->retornarPorId($id);
                
                if ($obj) {
                    input('nome', 'Nome', $obj->nome, false, "text");
                    input('whatsapp', 'Whatsapp', $obj->whatsapp, false, "text");
                    input('dias_contratados', 'Dias contratados', $obj->dias_contratados, false, "number");
                }
                else {
                    echo "<p>Aluno não encontrado.</p>";
                }

                echo '<input type="hidden" name="id" value="' . $id . '">';
                
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./alunoListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
