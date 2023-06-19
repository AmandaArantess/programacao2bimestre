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
<title>Relatório</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="tudo">
<div id="conteudo">
<?php require_once('funcoes/cabecalho.php'); ?>
	<?php require_once 'funcoes/menu.php';?>
	<?php require_once ('funcoes/fundo.php');?>

		<h2>Encontre a receita desejada:</h2>
		<form name="form_acesso" method="post" action="relatorioPaginacaoReceita.php">
		  <table>
			<tr> 
			  <td>Nome da Receita: <input name="receita" type="text" id="filtro" size="30" maxlength="30"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Pesquisar"></td>
			</tr>
		  </table>
		</form>
	</div>
	<?php echo "<h3> Clique para voltar à <a href='index.php'>página inicial</a></h3>"; ?>
</div> 
</body>
</html>