<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h4">Trabalho I</h1>
        <nav>
            <?php if (isset($_SESSION['authenticated'])): ?>
                <ul class="nav">
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="sobre.php" class="nav-link text-white">Sobre</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link text-white">Contato</a></li>
                    <li class="nav-item"><a href="logs.php" class="nav-link text-danger">Logs de Acesso</a></li>
                    <li class="nav-item"><a href="sair.php" class="nav-link text-warning">Sair</a></li>
                </ul>
            <?php else: ?>
                <ul class="nav">
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="sobre.php" class="nav-link text-white">Sobre</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link text-white">Contato</a></li>
                    <li class="nav-item"><a href="logs.php" class="nav-link text-danger">Logs de Acesso</a></li>
                <?php endif; ?>
        </nav>
    </div>
</header>