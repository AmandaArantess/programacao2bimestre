<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
 *{
  color: #FFFF;
 }
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #FE9D7E;
}
#teste{
  background-color: blue;
}

</style>

</head>
<body>

<div id="teste">
 
  <ul>

    <li>  <a  class="active" href="index.php">HOME</a> </li>
    <li>  <a href="inclusaoReceita.php">Inclusão de Receitas</a> </li>
    <li>  <a href="inclusaoProduto.php">Inclusão de Produtos</a>  </li>
    <li>  <a href="consultaReceita.php">Consulta de Receitas (alteração e exclusão)</a> </li>
    <li>  <a href="consultaProduto.php">Consulta de Produtos (alteração e exclusão)</a>   </li>
    <li>  <a href="relatorioReceita.php">Relatório receitas</a>   </li>
    <li>  <a href="relatorioProduto.php">Relatório produtos</a>   </li>
    <li id="sobre"><a href="quemSomos.php" id="nomes">Quem Somos</a></li>

  </ul>

</div>




   
</body>
</html> 
