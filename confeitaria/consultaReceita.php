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
    <?php require_once 'funcoes/fundo.php';?>


    <div id='principal'>
<?php
try
{
    require_once 'funcoes/conexao.php';
    $result = $conn->query("SELECT * FROM ambrosias_receitas");
    $count = $result->rowCount();
    echo "<h2>CONSULTA DE RECEITAS</h2>";
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
        echo "<b>Ingredientes</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Preparo</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Comentários</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Operação</b>\n";
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr class='tr_div'><td colspan='6'></td></tr>\n";
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
            echo "<a href='alteracaoExclusaoReceita.php?codigo=" . $row->codigo . "'>";
            echo "<img src='img/edit.png' border='0'><img src='img/delete.png' border='0'></a>&nbsp;\n";
            echo "</td>\n";
            echo "</tr>\n";
        }
    } else {
        $destino = "function () {window.location='index.php';}";
        echo "<script>sendToastr('Nenhuma receita foi encontrada! <br /> Clique para continuar!','error',$destino)</script>";
    }
    echo "</table>";
    $conn = null;
} catch (PDOException $e) {
    $destino = "function () {window.location='index.php';}";
    echo "<script>sendToastr($e-> getMessage(),'error',$destino)</script>";
    die(); 
}
echo "<h3> Clique para voltar à <a href='index.php'>página inicial</a></h3>"; 

?>
</div>
</div>
</body>
</html>