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

    <div class="container border border-3 border-danger rounded-3 p-5 mt-5">
        <h2 class="text-start text-white">Ínicio</h2>
        <hr class="text-white">
        <figure class="d-flex align-items-center">
            <img src="images/dedo.png" class="img-fluid" alt="emoji daora">
            <div class="ms-3">
                <p class="text-white mb-0">Este emoji é uma representação icônica de uma expressão de descontentamento
                    ou rebeldia. Com um rosto bravo e o dedo do meio levantado, ele transmite uma mensagem clara de
                    insatisfação ou protesto. Embora seja considerado rude em muitos contextos, também pode ser usado de
                    forma humorística ou irônica em conversas informais. É uma forma visual de expressar emoções fortes,
                    seja para enfatizar um ponto ou simplesmente para descontrair em situações mais leves.</p> <br>
                <p class="text-white mb-0">Este emoji é amplamente reconhecido como um símbolo de atitude ousada e
                    provocativa. Com um gesto que desafia normas sociais, ele pode ser interpretado como uma forma de
                    expressar frustração, sarcasmo ou até mesmo um senso de humor irreverente. Apesar de sua natureza
                    controversa, é frequentemente usado em contextos descontraídos para transmitir uma mensagem de forma
                    direta e impactante.</p>
            </div>
        </figure>

    </div>

    <?php require 'components/footer.php' ?>
</body>

</html>