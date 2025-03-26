<?php
session_start();
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

    <div class="container border border-3 border-primary rounded-3 p-5 mt-5">
        <h2 class="text-start text-white">Sobre o criador dessa bomba</h2>
        <hr class="text-white">
        <figure class="d-flex align-items-center">
            <img src="images/eu.jpg" class="img-fluid" alt="foto dum gato" style="height: 200px; width: 200px;">
            <div class="ms-3">
                <p class="text-white mb-0">Eis uma foto extremamente nítida minha. Eu me chamo Alexandre,
                    sou um mestre em criar coisas usando código, mesmo que às vezes nem eu entenda o que fiz.</p> <br>
                <p class="text-white mb-0">Eu faço de tudo, treino, leio, estudo, cozinho, trabalho, limpo casa, quebro
                    coisas,
                    conserto coisas (o segredo pra fazer tantas coisas é que sou mediocre em tudo) e tenho medo de
                    mulher bonita.</p> <br>
                <p class="text-white mb-0">Atualmente o único jogo que to jogando é the witcher 3, que por assim dizer é
                    um jogasso.</p> <br>
                <p class="text-white mb-0">Eu dirijo bem também. E não faço idéia de como vou subir isso aqui na AWS e
                    fazer o contator
                    de acessos D:</p> <br>
            </div>
        </figure>

    </div>

    <?php require 'components/footer.php' ?>
</body>

</html>