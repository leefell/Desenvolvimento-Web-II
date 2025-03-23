<?php
require 'backend/functions.php';
registrarAcesso(basename($_SERVER['PHP_SELF']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-dark">
    <?php require 'components/header.php' ?>

    <div class="container border border-3 border-success rounded-3 p-5 mt-5">
        <h2 class="text-start text-white">Quer falar comigo?</h2>
        <hr class="text-white">
        <figure class="d-flex align-items-center">
            <img src="images/contato.png" class="img-fluid" alt="foto dum gato" style="height: 200px; width: 200px;">
            <div class="ms-3">
                <p class="text-white mb-0">Se quiser entrar em contato comigo, é bem simples! Você pode me mandar um
                    e-mail para
                    <a href="#" class="text-success">alexandreaug21@gmail.com</a> e prometo
                    responder o mais rápido possível.
                </p> <br>
                <p class="text-white mb-0">Prefere algo mais instantâneo? Estou disponível no WhatsApp pelo número
                    <a href="#" class="text-success">+55 17 4002-8922</a>. Pode ligar a qualquer hora!
                </p> <br>
                <p class="text-white mb-0">Ah, e se você gosta de redes sociais, pode me encontrar no Instagram como
                    <a href="https://instagram.com/alexandreagsf" target="_blank" class="text-success">@alexandre</a>.
                    Lá eu
                    compartilho um pouco do meu dia a dia e projetos.
                </p> <br>
                <p class="text-white mb-0">Por último, se preferir algo mais formal, pode me enviar uma mensagem pelo
                    LinkedIn:
                    <a href="https://linkedin.com/in/alexandreagsf" target="_blank"
                        class="text-success">linkedin.com/in/alexandre</a>. Estou sempre aberto a novas conexões e
                    oportunidades!
                </p> <br>
            </div>
        </figure>

    </div>

    <?php require 'components/footer.php' ?>
</body>

</html>