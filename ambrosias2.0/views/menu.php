<!--<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body> -->
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
          <a class="nav-link" href="./usuarioLogin.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./usuarioInserir.php">Log Up</a>
        </li>

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Inclusão
          </a>
          <ul class="dropdown-menu">
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
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
            <?php
                include("retorna_usuario_logado.php");
            ?>
            <!--
          </body>
</html>    -->
