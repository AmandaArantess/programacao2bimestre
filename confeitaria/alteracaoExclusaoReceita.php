<?php
header("Content-Type: text/html; charset=utf-8", true);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Ambrosia's Confeitaria</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="tudo">
<div id="conteudo">
	<?php require_once('funcoes/cabecalho.php'); ?>
	<?php require_once 'funcoes/menu.php';?>
	<?php require_once ('funcoes/fundo.php');?>
<?php

$codigo = "";
$nome_receita = "";
$ingredientes = "";
$preparo = "";
$comentarios = "";
$destino = '';
$ComandoSQL = "";

require_once 'funcoes/conexao.php';

$codigo = $_GET['codigo'];
switch ( $_POST['form_operacao']) {
    case "alteracao":
        try
        {
            $codigo = $_POST['codigo'];
            $nome_receita = $_POST['nome_receita'];
            $ingredientes = $_POST['ingredientes'];
            $preparo = $_POST['preparo'];
            $comentarios = $_POST['comentarios'];

            $stmt = $conn->prepare('UPDATE ambrosias_receitas SET
			nome_receita =:nome_receita,
			ingredientes = :ingredientes,
			preparo = :preparo,
			comentarios= :comentarios WHERE codigo = :codigo');
			$stmt->bindValue(':codigo', $codigo);
            $stmt->bindValue(':nome_receita', $nome_receita);
            $stmt->bindValue(':ingredientes', $ingredientes);
            $stmt->bindValue(':preparo', $preparo);
            $stmt->bindValue(':comentarios', $comentarios);
            $stmt->execute();
		
			$destino = "function () {window.location='consulta_receitas.php';}";
            echo "<script>sendToastr('Receita alterada com sucesso! Clique para continuar!','success',$destino)</script>";
            break;
        } catch (PDOException $e) {
			$destino = "function () {window.location='index.php';}";
			echo "<script>sendToastr($e->getMessage(),'error',$destino)</script>";
		    die();
        }
    case "exclusao":
        try
        {
            $codigo = $_POST['codigo'];
            $stmt = $conn->prepare('DELETE from ambrosias_receitas WHERE codigo = :codigo');
            $stmt->bindValue(':codigo', $codigo);
            $stmt->execute();
			$destino = "function () {window.location='consulta_receitas.php';}";
            echo "<script>sendToastr('Receita excluída com sucesso! Clique para seguir!','success',$destino)</script>";
	            break;
        } catch (PDOException $e) {
			$destino = "function () {window.location='index.php';}";
			echo "<script>sendToastr($e->getMessage(),'error',$destino)</script>";
            die();
        }
}
$ComandoSQL = "select * from ambrosias_receitas where codigo = '" . $codigo . "'";
$result = $conn->query($ComandoSQL);
if (!$result) {
	$destino = "function () {window.location='index.php';}";
    echo "<script>sendToastr('Nenhuma receita foi encontrada! Clique para continuar!','error',$destino)</script>";
}
$row = $result->fetch(PDO::FETCH_OBJ)
?>

<script LANGUAGE="JavaScript">
	function define_operacao(operacao){
		if (operacao == "alt") {
		document.form_alteracaoExclusaoReceita.form_operacao.value = "alteracao";
		}
		if (operacao == "exc") {
		document.form_alteracaoExclusaoReceita.form_operacao.value = "exclusao";
		}
		document.form_alteracaoExclusaoReceita.submit();
	}
</script>

	<h2>ALTERAÇÃO E EXCLUSÃO DE RECEITAS</h2>
	<form method="POST" action="alteracaoExclusaoReceita.php" name="form_alteracaoExclusaoReceita">
		<table width="600">
			<tr>
				<td class="td_r">Código:</td>
				<td>
				<input type="text" name="codigo" readonly="readonly" value="<?php echo $row->codigo; ?>">
				</td>
			</tr>
			<tr>
				<td class="td_r">Nome:</td>
				<td>
				<input name="nome_receita" type="text" id="" size="30" maxlength="30" required="required" value="<?php echo $row->nome_receita; ?>">*
				</td>
			</tr>
			<tr>
				<td class="td_r">Ingredientes:</td>
				<td>
				<textarea name="ingredientes" id="ingredientes"
				rows="5" cols="60" required="required"><?php echo $row->ingredientes; ?></textarea>*
				</td>
			</tr>
			<tr>
				<td class="td_r">Preparo:</td>
				<td>
				<textarea name="preparo" id="preparo"
				rows="4" cols="80" required="required"><?php echo $row->preparo; ?></textarea>*
				</td>
			</tr>
			<tr>
				<td class="td_r">Comentários:</td>
				<td>
				<textarea name="comentarios" id="comentarios"
				rows="4" cols="80" required="required"><?php echo $row->comentarios; ?></textarea>*
				</td>
			</tr>
			<tr>
				<td colspan='2' class="td_c">  
				<input type="hidden" name="form_operacao" value="consulta">
				<input name="alterar" type="button" value="Alterar" onClick="define_operacao('alt');">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="excluir" type="button" value="Excluir" onClick="define_operacao('exc');">* dados obrigatórios
				</td>
			</tr>
		</table>
	</form>
	</div>
</div> 
</body>
</html>