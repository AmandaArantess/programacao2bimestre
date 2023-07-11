<!--<!DOCTYPE html>
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
      
 <div class="dropdown" class="col">
 <span role="button" data-bs-toggle="dropdown"><a  href="index.php">Home</a></span>
</div>

<div class="dropdown" class="col" >
 <span role="button" data-bs-toggle="dropdown"><a  href="./funcionarioLogin.php">Entrar</a></span>
</div>

<div  class="dropdown" class="col">
 <span role="button" data-bs-toggle="dropdown"><a  href="./funcionarioInserir.php">Cadastrar</a></span>
</div>

<div class="dropdown" class="col">
  <span role="button" data-bs-toggle="dropdown">Inclusão</span>
   <div class="dropdown-menu">
  <ul><a href="receitaInserir.php" class="dropdown-item">De receitas</a></ul>
  <ul><a  href="produtoInserir.php" class="sropdown-item">De produtos</a></ul>
  </div>
</div>

<div class="dropdown" class="col">
  <span role="button" data-bs-toggle="dropdown">Consulta</span>
   <div class="dropdown-content">
  <ul><a href="receitaConsultar.php">De receitas</a></ul>
  <ul><a href="produtoConsultar.php">De produtos</a></ul>
  </div>
  </div>

  <div class="dropdown" class="col">
  <span role="button" data-bs-toggle="dropdown">Alteração</span>
   <div class="dropdown-content">
  <ul><a href="receitaAlterar.php">De receitas</a></ul>
  <ul><a  href="produtoAlterar.php">De produtos</a></ul>
  </div>
</div>

<div class="dropdown" class="col">
  <span role="button" data-bs-toggle="dropdown">Exclusão</span>
   <div class="dropdown-content">
  <ul><a href="receitaExcluir.php">De receitas</a></ul>
  <ul><a  href="produtoExcluir.php">De produtos</a></ul>
  </div>
</div>

<div class="dropdown" class="col">
  <span role="button" data-bs-toggle="dropdown">Relatório</span>
   <div class="dropdown-content">
  <ul><a href="receitaListar.php">De receitas</a></ul>
  <ul><a href="produtoListar.php">De produtos</a></ul>
  </div>
  </div>
 
  <div class="dropdown" class="col">
 <span role="button" data-bs-toggle="dropdown" id="sobre"><a href="quemSomos.php" id="nomes">Quem somos</a></span>
</div>
</div>
</div>
            <?php
                include("retorna_funcionario_logado.php");
            ?>
    </body>
</html> -->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="p-3 mb-2 bg-secondary text-white" >
<?php require_once('./cabecalho.php'); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./funcionarioLogin.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./funcionarioInserir.php">Log Up</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./receitaInserir.php">De receitas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./produtoInserir.php">De produtos</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Inclusão
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="./receitaInserir.php">De receitas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./produtoInserir.php">De produtos</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Consulta
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="receitaConsultar.php">De receitas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="produtoConsultar.php">De produtos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Alteração
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="receitaAlterar.php">De receitas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="produtoAlterar.php">De produtos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Exclusão
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="receitaExcluir.php">De receitas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="produtoExcluir.php">De produtos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Relatório
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="receitaListar.php">De receitas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="produtoListar.php">De produtos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quemSomos.php">Quem somos</a>
        </li>
      </ul>

      <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
<?php
                include("retorna_funcionario_logado.php");
            ?>
          </body>
</html>    
