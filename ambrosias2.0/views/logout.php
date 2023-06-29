<?php
    @session_start();
    // limpa a sessão
    $_SESSION = array(); // colocando a session com um array vazio faz com ela
                    // fique vazia sem nenhuma variavel nela, liberando o espaço
                    
    // destroy a sessão
    session_destroy();

    // redireciona o link para a página de aviso de erro ao autenticar usuário
    header("Location: funcionarioLogin.php");
?>