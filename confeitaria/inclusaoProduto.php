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
$codProduto = "";
$nomeProduto = "";
$precoProduto = "";
$pesoProduto = "";
$descricaoProduto = "";
$destino = '';
$ComandoSQL = "";

if ( isset($_POST['form_operacao']) && $_POST['form_operacao'] == "inclusaoProduto") {
    try
    {
        require_once 'funcoes/conexao.php';
        $codProduto = $_POST['codProduto'];
        $nomeProduto = $_POST['nomeProduto'];
        $precoProduto = $_POST['precoProduto'];
        $pesoProduto = $_POST['pesoProduto'];
        $descricaoProduto = $_POST['descricaoProduto'];
		$result = $conn->query("SELECT * FROM ambrosias_produtos where codProduto = $codProduto");
		$count = $result->rowCount();
		if ($count > 0) {
			$destino = "function () {window.location='inclusaoProduto.php';}";
			echo "<script>sendToastr('Código de receita já cadastrado!<br />Clique para continuar!','error',$destino)</script>";
		}
		$stmt = $conn->prepare('INSERT INTO ambrosias_produtos VALUES
		(:codProduto,:nomeProduto,:precoProduto,:pesoProduto,:descricaoProduto)');
        $stmt->bindValue(':codProduto', $codProduto);
        $stmt->bindValue(':nomeProduto', $nomeProduto);
        $stmt->bindValue(':precoProduto', $precoProduto);
        $stmt->bindValue(':pesoProduto', $pesoProduto);
        $stmt->bindValue(':descricaoProduto', $descricaoProduto);
        $stmt->execute();

	} catch (PDOException $e) {
		$destino = "function () {window.location='index.php';}";
		echo "<script>sendToastr($e-> getMessage(),'error',$destino)</script>";
        die();
    }
	$destino = "function () {window.location='inclusaoProduto.php';}";
	echo "<h2> Produto cadastrado com sucesso! </h2>";
	echo "<h3> Clique para voltar à <a href='index.php'>página inicial</a></h3>"; 

}

?>
	<h2>CADASTRO DE PRODUTOS</h2>
	<p>Preencha todos os campos para cadastrar nova receita!</P> 
	  <form method="POST" action="inclusaoProduto.php" name="form_inclusao">
		<table width="600">
		  <tr>
			<td class="td_r">Código:</td>
			<td>
			  <input name="codProduto" type="text" id="codProduto" size="10" maxlength="10" required="required">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Nome:</td>
			<td>
			  <input name="nomeProduto" type="text" id="nomeProduto" size="30" maxlength="30" required="required">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">precoProduto:</td>
			<td>
			  <textarea name="precoProduto" id="precoProduto"
			  rows="5" cols="60" required="required"></textarea>*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">pesoProduto:</td>
			<td>
			  <textarea name="pesoProduto" id="pesoProduto"
			  rows="4" cols="80" required="required"></textarea>*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Descrição:</td>
			<td>
			  <textarea name="descricaoProduto" id="descricaoProduto"
			  rows="4" cols="80" required="required"></textarea>*
			</td>
		  </tr>
		  <tr>
			<td colspan='2' class="td_c">
				<br />
				<input type="hidden" name="form_operacao" value="inclusaoProduto">
				<input type="submit" name="enviar" value="Inserir produtos">
			</td>
		  </tr>
		  </table>
	  </form>
	  </div>
	
	<div class="clear"></div>
</div> 
</body>
</html>