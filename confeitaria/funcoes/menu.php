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

.active {
  background-color: #FE9D7E;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>

</head>
<body>
<div class="active">
      
 <div class="dropdown">
 <span role="button" data-bs-toggle="dropdown"><a  href="index.php">Home</a></span>
</div>

<div class="dropdown">
 <span role="button" data-bs-toggle="dropdown"><a  href="./usuarioEntrar.php">Entrar</a></span>
</div>

<div class="dropdown">
 <span role="button" data-bs-toggle="dropdown"><a  href="./usuarioCadastrar.php">Cadastrar</a></span>
</div>

<div class="dropdown">
  <span role="button" data-bs-toggle="dropdown">Inclusão</span>
   <div class="dropdown-content">
  <ul><a href="inclusaoReceita.php">De receitas</a></ul>
  <ul><a  href="inclusaoProduto.php">De produtos</a></ul>
  </div>
</div>

<div class="dropdown">
  <span role="button" data-bs-toggle="dropdown">Consulta</span>
   <div class="dropdown-content">
  <ul><a href="consultaReceita.php">De receitas</a></ul>
  <ul><a href="consultaProduto.php">De produtos</a></ul>
  </div>
  </div>

<div class="dropdown">
  <span role="button" data-bs-toggle="dropdown">Relatório</span>
   <div class="dropdown-content">
  <ul><a href="relatorioReceita.php">De receitas</a></ul>
  <ul><a href="relatorioProduto.php">De produtos</a></ul>
  </div>
  </div>
 
  <div class="dropdown">
 <span role="button" data-bs-toggle="dropdown" id="sobre"><a href="quemSomos.php" id="nomes">Quem somos</a></span>
</div>
</div>
  <!--  <li ><a href="#" role="button" data-bs-toggle="dropdown">Inclusão</a>
           <ul class="dropdown-content">
                        <li><a  href="inclusaoReceita.php">Inclusão de produtos</a></li>
                        <li><a  href="inclusaoProduto.php">Inclusão de receitas</a></li>
           </ul>
    </li>
    <li ><a href="#" role="button" data-bs-toggle="dropdown">Consulta</a>
           <ul class="dropdown-content">
           <li>  <a href="consultaReceita.php">Consulta de Receitas (alteração e exclusão)</a> </li>
           <li>  <a href="consultaProduto.php">Consulta de Produtos (alteração e exclusão)</a>   </li>
           </ul>
    </li>
    <li ><a href="#" role="button" data-bs-toggle="dropdown">Relatório</a>
           <ul class="dropdown-content">
           <li>  <a href="relatorioReceita.php">Relatório receitas</a>   </li>
           <li>  <a href="relatorioProduto.php">Relatório produtos</a>   </li>
           </ul>
    </li>
    <li id="sobre"><a href="quemSomos.php" id="nomes">Quem Somos</a></li>
</ul>-->
</body>
</html> 
