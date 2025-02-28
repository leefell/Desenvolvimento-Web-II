<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Destino</title>
</head>

<body class="container">
    <?php
    $titulo = filter_input(INPUT_POST, "titulo");
    $corpo = filter_input(INPUT_POST, 'corpo');
    $corTexto = filter_input(INPUT_POST, 'corTexto');
    $urlImagem = filter_input(INPUT_POST, 'urlImagem');
    $urlLink = filter_input(INPUT_POST, 'urlLink');
    $bgColor = filter_input(INPUT_POST, 'bgColor');

    ?>
    <br>
    <h1> <?php echo $titulo ?> </h1>
    <hr>
    <p> <?php echo nl2br($corpo) ?> </p>
    <img src="<?php echo $urlImagem ?>" alt="Imagem" style="height:450px; width: 500px;">
    <br>
    <br>
    <a href="<?php echo $urlLink ?>"><?php echo $urlLink ?></a>
    <br><br>

    <style>
        body {
            background-color:
                <?php echo $bgColor; ?>
            ;
        }

        body,
        h1 {
            color:
                <?php echo $corTexto; ?>
            ;
        }
    </style>
</body>

</html>