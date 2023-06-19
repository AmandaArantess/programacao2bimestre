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
<title>Ambrosia's confeitaria</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="tudo">
<div id="conteudo">
    <?php require_once('funcoes/cabecalho.php'); ?> 
    <?php require_once('funcoes/menu.php'); ?>    
    <?php require_once ('funcoes/fundo.php');?>

	  <h3>RELATÓRIO DE PRODUTOS</h3>
<?php

$ComandoSQL = "";
$filtro = '';
$maximo = 0;
$pagina = 0;
$inicio = 0;
try
{
    require_once 'funcoes/conexao.php';

    if (isset($_REQUEST['filtro'])) {
        $filtro = $_REQUEST['filtro'];
    }
    $maximo = 4;
    $pagina = ($_GET["pagina"]);

    if ($pagina == "") {
        $pagina = "1";
    }
    $inicio = $pagina - 1;
    $inicio = $maximo * $inicio;
    $ComandoSQL = "select * from ambrosias_produtos where nomeProduto like '$filtro%'";
    $result = $conn->query($ComandoSQL);
    $rows = $result->fetchAll();
    $total = count($rows);

    $ComandoSQL = "select * from ambrosias_produtos where nomeProduto like '$filtro%'
		LIMIT $inicio, $maximo";
    $result = $conn->query($ComandoSQL);

    echo "<table border='1' cellpadding='0' cellspacing='0' width='80%'
		bordercolor='#003300' align='center'>";
    if ($total == 0) {
        $destino = "function () {window.location='index.php';}";
        echo "<script>sendToastr('Nenhuma receita foi encontrada! <br /> Clique para continuar!','error',$destino)</script>";
    } else {
        echo "<table>";
        echo "<tr>\n";
        echo "<td>\n";
        echo "<b>Código</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Nome</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>precoProduto</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>pesoProduto</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Comentários</b>\n";
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr class='tr_div'><td colspan='5'></td></tr>\n";
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>\n";
            echo "<td class='td_l'>\n";
            echo $row->codProduto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->nomeProduto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->precoProduto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->pesoProduto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->descricaoProduto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td>\n";
            echo "</tr>\n";
        }
    }
    echo "</table>";
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
$menos = $pagina - 1;
$mais = $pagina + 1;
$pgs = ceil($total / $maximo);
if ($pgs > 1) {
    echo "<br clear='all'/><br /><br />";
    if ($menos > 0) {
        echo "<a href='relatorioPaginacaoProduto.php?pagina=$menos&filtro=$filtro'>
		<button type='button' class='btn btn-outline-success'>Anterior</button></a> | ";
    }
    for ($i = 1; $i <= $pgs; $i++) {
        if ($i != $pagina) {
            echo "<a href='relatorioPaginacaoProduto.php?pagina=$i&filtro=$filtro'>
				<button type='button' class='btn btn-outline-success'>$i</button></a> | ";
        } else {
            echo "<strong><font color='#000'>$i</font></strong> | ";
        }
    }
    if ($mais <= $pgs) {
        echo "<a href='relatorioPaginacaoProduto.php?pagina=$mais&filtro=$filtro'>
			<button type='button' class='btn btn-outline-success'>Próxima</button></a>";
    }
}
$conn = null;
 echo "<h3> Clique para voltar à <a href='index.php'>página inicial</a></h3>"; 
?>
</div> 
<div class="clear"></div>
</div> 
</body>
</html>