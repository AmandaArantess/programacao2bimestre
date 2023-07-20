<nav class="navbar navbar-expand-lg " style="background-color: #FE9D7E">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">Ambrosia's Confeitaria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./produtoListar.php">Produto</a></li>
                        <li><a class="dropdown-item" href="./receitaListar.php">Receita</a></li>
                    </ul>
                 
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./usuarioInserir.php">Criar Conta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./quemSomos.php">Quem Somos</a>
                </li>
            </ul>

            <?php
                include("retorna_usuario_logado.php");
            ?>
        </div>
    </div>
</nav>
