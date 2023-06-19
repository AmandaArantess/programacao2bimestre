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
    <?php require_once 'funcoes/cabecalho.php';?>
    <?php require_once 'funcoes/menu.php';?>
    <?php require_once ('funcoes/fundo.php');?>
<?php
try
{
    require_once 'funcoes/conexao.php';
    $result = $conn->query("SELECT * FROM ambrosias_produtos");
    $count = $result->rowCount();
    echo "<h2>CONSULTA DE PRODUTOS</h2>";
    if ($count > 0) {
        echo "<table>";
        echo "<tr>\n";
        echo "<td>\n";
        echo "<b>Código</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Nome</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Preço</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Peso</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Descrição</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Operação</b>\n";
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr class='tr_div'><td colspan='6'></td></tr>\n";
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
            echo "<a href='alteracaoExclusaoProduto.php?codProduto=" . $row->codProduto . "'>";
            echo "<img src='img/edit.png' border='0'><img src='img/delete.png' border='0'></a>&nbsp;\n";
            echo "</td>\n";
            echo "</tr>\n";
        }
    } else {
        echo "<h3> Nenhum produto foi encontrada! <br/> Clique para continuar! <a href='index.php'>Página Inicial</a></h3>";
    }
    $conn = null;
} catch (PDOException $e) {
    $destino = "function () {window.location='index.php';}";
    echo "<h2> Produto alterado com sucesso! </h2>";
    die(); 
}
echo "<h3> Clique para voltar à <a href='index.php'>página inicial</a></h3>"; 
?>
</div>
</div>
</body>
</html>