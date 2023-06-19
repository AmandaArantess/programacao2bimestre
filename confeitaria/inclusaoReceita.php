<?php
header("Content-Type: text/html; charset=utf-8", true);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ambrosia's Confeitaria</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="tudo">
<div id="conteudo">
	<?php require_once('funcoes/cabecalho.php'); ?>	
	<?php require_once ('funcoes/menu.php');?>
	<?php require_once ('funcoes/fundo.php');?>
<?php

$codigo = "";
$nome_receita = "";
$ingredientes = "";
$preparo = "";
$comentarios = "";
$destino = '';
$ComandoSQL = "";

if ( isset($_POST['form_operacao']) && $_POST['form_operacao'] == 'inclusaoReceitas') {
    try
    {
        require_once 'funcoes/conexao.php';
        $codigo = $_POST['codigo'];
        $nome_receita = $_POST['nome_receita'];
        $ingredientes = $_POST['ingredientes'];
        $preparo = $_POST['preparo'];
        $comentarios = $_POST['comentarios'];	
		$result = $conn->query("SELECT * FROM ambrosias_receitas where codigo = $codigo");
		$count = $result->rowCount();
		if ($count > 0) {
			$destino = "function () {window.location='inclusaoReceita.php';}";
			echo "<script>sendToastr('Código de receita já cadastrado!<br />Clique para continuar!','error',$destino)</script>";
		}
	
		$stmt = $conn->prepare('INSERT INTO ambrosias_receitas VALUES
		(:codigo,:nome_receita,:ingredientes,:preparo,:comentarios)');
        $stmt->bindValue(':codigo', $codigo);
        $stmt->bindValue(':nome_receita', $nome_receita);
        $stmt->bindValue(':ingredientes', $ingredientes);
        $stmt->bindValue(':preparo', $preparo);
        $stmt->bindValue(':comentarios', $comentarios);
        $stmt->execute();

	} catch (PDOException $e) {
     
		$destino = "function () {window.location='index.php';}";
		echo "<script>sendToastr($e-> getMessage(),'error',$destino)</script>";
        die();
    }
	$destino = "function () {window.location='inclusaoReceita.php';}";
	echo "<h2> Receita cadastrada com sucesso! </h2>";
 echo "<h3> Clique para voltar à <a href='index.php'>página inicial</a></h3>"; 

}
?>
	<h2>CADASTRO DE RECEITAS</h2>
	<p>Preencha todos os campos para cadastrar nova receita!</P> 

	  <form method="POST" action="inclusaoReceita.php" name="form_operacao">
		<table width="600">
		  <tr>
			<td class="td_r">Código:</td>
			<td>
			  <input name="codigo" type="text" id="codigo" size="10" maxlength="10" required="required">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Nome:</td>
			<td>
			  <input name="nome_receita" type="text" id="nome_receita" size="30" maxlength="30" required="required">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Ingredientes:</td>
			<td>
			  <textarea name="ingredientes" id="ingredientes"
			  rows="5" cols="60" required="required"></textarea>*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Preparo:</td>
			<td>
			  <textarea name="preparo" id="preparo"
			  rows="4" cols="80" required="required"></textarea>*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Comentários:</td>
			<td>
			  <textarea name="comentarios" id="comentarios"
			  rows="4" cols="80" required="required"></textarea>*
			</td>
		  </tr>
		  <tr>
			<td colspan='2' class="td_c">
				<br />
				<input type="hidden" name="form_operacao" value="inclusaoReceitas">
				<input type="submit" name="enviar" value="Inserir receitas">
			</td>
		  </tr>
		  </table>
	  </form>
	  </div>
	<div class="clear"></div>
</div> 
</body>
</html>