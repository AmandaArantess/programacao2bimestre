<?php
#
// Iniciando a session
#
@session_start();
if(isset($_SESSION['email'])) {
	// se existe as sessões coloca os valores em uma varivel
	$email_usuario = $_SESSION['email'];
	echo "Usuario logado: " .  $email_usuario;
} else {
	echo '<a href="./funcionarioLogin.php">Login</a>';
}
?>
