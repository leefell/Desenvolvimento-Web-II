<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Header muito daora</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Início</a></li>
        <li class="nav-item"><a href="sobre.php" class="nav-link">Sobre</a></li>
        <li class="nav-item"><a href="faqs.php" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
        <?php
        if (
            isset($_SESSION['user']) && $_SESSION['user'] == 'alexandre'
            && isset($_SESSION['pass']) && $_SESSION['pass'] == 'senha_da_nasa'
        ): ?>
            <li class="nav-item"><a href="perfil.php" class="nav-link">Perfil</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-danger">Sair</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="login.php" class="nav-link">Entrar</a></li>
        <?php endif; ?>
    </ul>
</header>