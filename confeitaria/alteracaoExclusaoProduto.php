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

require_once 'funcoes/conexao.php';
$codProduto = $_GET['codProduto'];
switch ($_POST['form_operacao']) {
    case "alteracao":
        try
        {
            $codProduto = $_POST['codProduto'];
            $nomeProduto = $_POST['nomeProduto'];
            $precoProduto = $_POST['precoProduto'];
            $pesoProduto = $_POST['pesoProduto'];
            $descricaoProduto = $_POST['descricaoProduto'];

            $stmt = $conn->prepare('UPDATE ambrosias_produtos SET
			nomeProduto =:nomeProduto,
			precoProduto = :precoProduto,
			pesoProduto = :pesoProduto,
			descricaoProduto= :descricaoProduto WHERE codProduto = :codProduto');
			$stmt->bindValue(':codProduto', $codProduto);
            $stmt->bindValue(':nomeProduto', $nomeProduto);
            $stmt->bindValue(':precoProduto', $precoProduto);
            $stmt->bindValue(':pesoProduto', $pesoProduto);
            $stmt->bindValue(':descricaoProduto', $descricaoProduto);
            $stmt->execute();
		
			$destino = "function () {window.location='consulta_receitas.php';}";
            echo "<script>sendToastr('Receita alterada com sucesso! Clique para continuar!','success',$destino)</script>";
            break;
        } catch (PDOException $e) {
			$destino = "function () {window.location='index.php';}";
			echo "<script>sendToastr($e-> getMessage(),'error',$destino)</script>";
		    die();
        }
    case "exclusao":
        try
        {
            $codProduto = $_POST['codProduto'];
            $stmt = $conn->prepare('DELETE from ambrosias_produtos WHERE codProduto = :codProduto');
            $stmt->bindValue(':codProduto', $codProduto);
            $stmt->execute();
			$destino = "function () {window.location='consulta_receitas.php';}";
            echo "<script>sendToastr('Receita excluída com sucesso! Clique para seguir!','success',$destino)</script>";
	            break;
        } catch (PDOException $e) {
			$destino = "function () {window.location='index.php';}";
			echo "<script>sendToastr($e-> getMessage(),'error',$destino)</script>";
            die();
        }
}
$ComandoSQL = "select * from ambrosias_produtos where codProduto = '" . $codProduto . "'";
$result = $conn->query($ComandoSQL);
if (!$result) {
	$destino = "function () {window.location='index.php';}";
    echo "<h3> Nenhum produto foi encontrado! <br/> Clique para continuar! <a href='index.php'>Página Inicial</a></h3>";
}
$row = $result->fetch(PDO::FETCH_OBJ)
?>
<script LANGUAGE="JavaScript">
	function define_operacao(operacao){
		if (operacao == "alt") {
		document.form_alteracaoExclusaoProduto.form_operacao.value = "alteracao";
		}
		if (operacao == "exc") {
		document.form_alteracaoExclusaoProduto.form_operacao.value = "exclusao";
		}
		document.form_alteracaoExclusaoProduto.submit();

		//document.write("<h1>Operação realizada com sucesso!</h1>");
		//window.location.href = "index.php";
	}
</script>
	<h2>ALTERAÇÃO E EXCLUSÃO DE PRODUTOS</h2>
	<form method="POST" action="alteracaoExclusaoProduto.php" name="form_alteracaoExclusaoProduto">
		<table width="600">
			<tr>
				<td class="td_r">Código:</td>
				<td>
				<input type="text" name="codProduto" readonly="readonly" value="<?php echo $row->codProduto; ?>">
				</td>
			</tr>
			<tr>
				<td class="td_r">Nome:</td>
				<td>
				<input name="nomeProduto" type="text" id="" size="30" maxlength="30" required="required" value="<?php echo $row->nomeProduto; ?>">*
				</td>
			</tr>
			<tr>
				<td class="td_r">precoProduto:</td>
				<td>
				<textarea name="precoProduto" id="precoProduto"
				rows="5" cols="60" required="required"><?php echo $row->precoProduto; ?></textarea>*
				</td>
			</tr>
			<tr>
				<td class="td_r">pesoProduto:</td>
				<td>
				<textarea name="pesoProduto" id="pesoProduto"
				rows="4" cols="80" required="required"><?php echo $row->pesoProduto; ?></textarea>*
				</td>
			</tr>
			<tr>
				<td class="td_r">Comentários:</td>
				<td>
				<textarea name="descricaoProduto" id="descricaoProduto"
				rows="4" cols="80" required="required"><?php echo $row->descricaoProduto; ?></textarea>*
				</td>
			</tr>
			<tr>
				<td colspan='2' class="td_c">
				<input type="hidden" name="form_operacao" value="consulta">
				<input name="alterar" type="button" value="Alterar" onClick="define_operacao('alt');">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="excluir" type="button" value="Excluir" onClick="define_operacao('exc');">
				</td>
			</tr>
		</table>
	</form>
	</div>
	
	<div class="clear"></div>
</div> 
</body>
</html>