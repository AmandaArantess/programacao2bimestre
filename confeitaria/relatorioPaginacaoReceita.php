<?php
header("Content-Type: text/html; charset=utf-8", true);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Ambrosia's confeitaria</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="tudo">
<div id="conteudo">
    <?php require_once('funcoes/cabecalho.php'); ?>
    <?php require_once ('funcoes/fundo.php');?>
    <?php require_once 'funcoes/menu.php';?>

	  <h3>RELATÓRIO DE RECEITAS</h3>
<?php
$ComandoSQL = "";
$filtro = '';
$maximo = 0;
$receita = 0;
$inicio = 0;
try
{
    require_once 'funcoes/conexao.php';
    if (isset($_REQUEST['filtro'])) {
        $filtro = $_REQUEST['filtro'];
    }
    $maximo = 2; 


  /*  if( isset($_GET['receita']) )  { 
        $receita =  ($_GET["receita"]);
   }*/

    $receita = ($_GET['receita']);
    if ($receita == "") {
        $receita = "1";
    }
    $inicio = $receita - 1;
    $inicio = $maximo * $inicio;
    $ComandoSQL = "select * from ambrosias_receitas where nome_receita like '$filtro%'";
    $result = $conn->query($ComandoSQL);
    $rows = $result->fetchAll();
    $total = count($rows);

    $ComandoSQL = "select * from ambrosias_receitas where nome_receita like '$filtro%'
		LIMIT $inicio, $maximo";
    $result = $conn->query($ComandoSQL);

    echo "<table border='1' cellpadding='0' cellspacing='0' width='80%'
		bordercolor='#FE9D7E' align='center'>";
    if ($total == 0) {
        $destino = "function () {window.location='index.php';}";
        echo "<h3> Nenhuma receita foi encontrada! <br/> Clique para continuar!<a href='index.php'>Página Inicial</a></h3>";
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
        echo "<b>Ingredientes</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Preparo</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Comentários</b>\n";
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr class='tr_div'><td colspan='5'></td></tr>\n";
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>\n";
            echo "<td class='td_l'>\n";
            echo $row->codigo . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->nome_receita . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->ingredientes . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->preparo . "&nbsp;\n";
            echo "</td>\n";
            echo "<td class='td_l'>\n";
            echo $row->comentarios . "&nbsp;\n";
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
$menos = $receita - 1;
$mais = $receita + 1;
$pgs = ceil($total / $maximo);
if ($pgs > 1) {
    echo "<br clear='all'/><br /><br />";
    if ($menos > 0) {
        echo "<a href='relatorio_receitacao_filtro.php?receita=$menos&filtro=$filtro'>
		<button type='button' class='btn btn-outline-success'>Anterior</button></a> | ";
    }
    for ($i = 1; $i <= $pgs; $i++) {
        if ($i != $receita) {
            echo "<a href='relatorio_receitacao_filtro.php?receita=$i&filtro=$filtro'>
				<button type='button' class='btn btn-outline-success'>$i</button></a> | ";
        } else {
            echo "<strong><font color='#000'>$i</font></strong> | ";
        }
    }
    if ($mais <= $pgs) {
        echo "<a href='relatorio_receitacao_filtro.php?receita[=$mais&filtro=$filtro'>
			<button type='button' class='btn btn-outline-success'>Próxima</button></a>";
    }
}
$conn = null;
echo "<h3> Clique para voltar à <a href='index.php'>página inicial</a></h3>"; 

?>
</div> 
</div> 
</body>
</html>