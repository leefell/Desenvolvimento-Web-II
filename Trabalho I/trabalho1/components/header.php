<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h4">Trabalho I</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a href="home.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="sobre.php" class="nav-link text-white">Sobre</a></li>
                <li class="nav-item"><a href="contato.php" class="nav-link text-white">Contato</a></li>
                <li class="nav-item"><a href="logs.php" class="nav-link text-danger">Logs de Acesso</a></li>
                <?php if (isset($_SESSION['authenticated'])): ?>
                    <li class="nav-item"><a href="sair.php" class="nav-link text-warning">Sair</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>