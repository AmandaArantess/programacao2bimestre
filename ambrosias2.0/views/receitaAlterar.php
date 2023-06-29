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
                require_once '../models/receita.php';
                require_once '../daos/receitaDAO.php';

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
                        $obj = new Receita();

                        $obj->codReceita=$_POST["codReceita"];
                        $obj->nomeReceita=$_POST["nomeReceita"];
                        $obj->ingredientes=$_POST["ingredientes"];
                        $obj->preparo=$_POST["preparo"];
                        $obj->comentarios=$_POST["comentarios"];
                        

                        $dao = new receitaDAO();

                        $dao->alterar($obj);

                        header('Location: ./receitaListar.php');
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
                require_once "../DAOs/receitaDAO.php";
                require_once "./controles.php";

                $id = $_GET["id"];

                $dao = new receitaDAO();

                $obj = $dao->retornarPorId($id);
                
                if ($obj) {
                    input('codReceita', 'Codigo Receita', $obj->codReceita, true, "text");
                    input('nomeReceita', 'Nome Receita', $obj->nomeReceita, true, "text");
                    input('ingredientes', 'Ingredientes', $obj->ingredientes, true, "text");
                    input('preparo', 'Preparo', $obj->preparo, true, "text");
                    input('comentarios', 'Comentarios', $obj->comentarios, true, "text");
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
