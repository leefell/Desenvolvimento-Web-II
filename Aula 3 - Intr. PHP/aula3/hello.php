<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Minha primeira página com php</h1>

    <p>
        <?php
        echo "<p>Hello world!</p>";

        date_default_timezone_set('America/Sao_Paulo');

        $nome = "Alexandre";
        $data = date("d/m/Y");
        $hora = date("h:i");

        echo "<p>Olá, meu nome é <b>$nome</b>. <br> <br> Hoje é dia <b>$data</b> e agora são <b>$hora</b></p>";

        echo "<hr>";
        echo '<a href="./alexandre/alexandre.php">alexandre/</a>';

        ?>

        
    </p>
</body>

</html>