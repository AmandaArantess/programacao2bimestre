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
                        //Instancia uma nova receita
                        $obj = new Receita();

                        $obj->codReceita=$_POST["codReceita"];
                        $obj->nomeReceita=$_POST["nomeReceita"];
                        $obj->ingredienteReceita=$_POST["ingredienteReceita"];
                        $obj->preparoReceita=$_POST["preparoReceita"];
                        $obj->comentarioReceita=$_POST["comentarioReceita"];


                        $dao = new receitaDAO();

                        $dao->alterar($obj);

                        header('Location: ./receitaListar.php');
                    }

                    if ($mensagensErro) {
                        header('Location: ./erro.php?mensagem=' . $mensagensErro);
                    }
                }
            
        ?>

        <h2>Alterando Receita</h2>

        <form class="m-3" action="receitaAlterar.php" name="formulario_postado" method="post">            
            <?php
                require_once "../DAOs/receitaDAO.php";
                require_once "./controles.php";

                //Alterei aqui
                $codReceita = $_GET["codReceita"];

                $dao = new receitaDAO();

                $obj = $dao->retornarPorcodReceita($codReceita);
                
                if ($obj) {
                    input('nomeReceita', 'Nome Receita', $obj->nomeReceita, false, "text");
                    input('ingredienteReceita', 'Ingrediente Receita', $obj->ingredienteReceita, false, "text");
                    input('preparoReceita', 'Preparo Receita', $obj->preparoReceita, false, "text"); 
                    input('comentarioReceita', 'Comentario Receita', $obj->comentarioReceita, false, "text");

                }
                else {
                    echo "<p>Receita não encontrada.</p>";
                }

                echo '<input type="hidden" name="codReceita" value="' . $codReceita . '">';
                
            ?>
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="./receitaListar.php">Voltar</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
