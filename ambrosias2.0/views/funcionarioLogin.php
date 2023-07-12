<!doctype html>
<html lang="pt-br">
    <header>
    </header>
    <body>
        <?php require_once './menu.php' ?>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once '../daos/funcionarioDAO.php';

                $email=$_POST["email"];
                $senha=$_POST["senha"];

                $dao = new funcionarioDAO();
                
                $login = $dao->login($email, $senha);

                if ($login) {
                    // header('Location: ./erro.php?mensagem=Login efetuado com sucesso!');
                    @session_start();

                    $_SESSION['login'] = $email;
                    $_SESSION['idfuncionario'] = $login->id;
                    header('Location: index.php'); 
                } else {
                    header('Location: ./erro.php?mensagem=Usuário ou senha inválidos!');
                }
            }
        ?>

        <h2>Login</h2>

        <form class="m-3" action="funcionarioLogin.php" name="formulario_postado" method="post">            
            <?php
                require "../DAOs/funcionarioDAO.php";
                require "./controles.php";

                input('email', 'E-mail', '', false, "text");
                input('senha', 'Senha', '', false, "password");
            ?>
          
            <button class="btn btn-success">Logar</button>
            <a class="btn btn-secondary" href="./index.php">Voltar para o menu</a>
        </form> 
    </body>
</html>
