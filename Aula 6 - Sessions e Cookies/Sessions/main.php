<div class="inicio">
    <?php
    if (isset($_SESSION['erro']) && !empty($_SESSION["erro"])) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION["erro"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION["erro"]);
    }
    ?>
    <div class="bg-light p-4 mb-4 rounded">
        <h1 class="text-center">Página inicial</h1>

        <!-- <img class="img-lorem img-thumbnail m-4 rounded float-end" src="Lorem-Ipsum-alternatives-768x492-1-300x192.webp" alt="Lorem Ipsum"> -->
        <img class="img-lorem img-thumbnail m-4 rounded float-end" src="imgmacaco.png" alt="Lorem Ipsum">


        <p>
            BonziBuddy foi um assistente virtual lançado no final dos anos 90 e início dos anos 2000. Ele era
            representado
            por um macaco roxo animado que podia falar, cantar, contar piadas e ajudar os usuários com várias tarefas no
            computador.
        </p>
        <p>
            Embora inicialmente popular, BonziBuddy rapidamente ganhou uma reputação negativa devido ao seu
            comportamento
            intrusivo e à inclusão de adware e spyware. Eventualmente, o software foi descontinuado e a empresa
            responsável
            enfrentou várias ações legais. Hoje é domingo 16:13 09/03/25.
        </p>
    </div>
</div>