<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
<div class="active" class="container text-center">
<div class="row">
      
 <div class="col">
 <span role="button" data-bs-toggle="dropdown"><a  href="index.php">Home</a></span>
</div>

<div  class="col" >
 <span role="button" data-bs-toggle="dropdown"><a  href="./funcionarioLogin.php">Entrar</a></span>
</div>

<div  class="col">
 <span role="button" data-bs-toggle="dropdown"><a  href="./funcionarioInserir.php">Cadastrar</a></span>
</div>

<div  class="col">
  <span role="button" data-bs-toggle="dropdown">Inclusão</span>
   <div class="dropdown-content">
  <ul><a href="receitaInserir.php">De receitas</a></ul>
  <ul><a  href="produtoInserir.php">De produtos</a></ul>
  </div>
</div>

<div  class="col">
  <span role="button" data-bs-toggle="dropdown">Consulta</span>
   <div class="dropdown-content">
  <ul><a href="receitaConsultar.php">De receitas</a></ul>
  <ul><a href="produtoConsultar.php">De produtos</a></ul>
  </div>
  </div>

  <div class="col">
  <span role="button" data-bs-toggle="dropdown">Alteração</span>
   <div class="dropdown-content">
  <ul><a href="receitaAlterar.php">De receitas</a></ul>
  <ul><a  href="produtoAlterar.php">De produtos</a></ul>
  </div>
</div>

<div class="col">
  <span role="button" data-bs-toggle="dropdown">Exclusão</span>
   <div class="dropdown-content">
  <ul><a href="receitaExcluir.php">De receitas</a></ul>
  <ul><a  href="produtoExcluir.php">De produtos</a></ul>
  </div>
</div>

<div class="col">
  <span role="button" data-bs-toggle="dropdown">Relatório</span>
   <div class="dropdown-content">
  <ul><a href="receitaListar.php">De receitas</a></ul>
  <ul><a href="produtoListar.php">De produtos</a></ul>
  </div>
  </div>
 
  <div class="col">
 <span role="button" data-bs-toggle="dropdown" id="sobre"><a href="quemSomos.php" id="nomes">Quem somos</a></span>
</div>
</div>
</div>
            <?php
                include("retorna_funcionario_logado.php");
            ?>
    </body>
</html> 

       