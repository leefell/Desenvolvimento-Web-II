<?php
$nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_GET, "cor", FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praticando das Cores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-2">
        <h1>Destino GET</h1>
        <hr>
        <p>Nome: <?php echo $nome; ?></p>
        <p>Email: <?php echo $email; ?></p>

        <a
            href="<?php echo "http://localhost/dw2/praticando3cores/destino.php?cor=$cor&nome=alexandre&email=alexandre@gmail.com" ?>">
            [nome = Alexandre | email = alexandreaug21@gmail.com]
        </a>
        <br><br>
        <a
            href="<?php echo "http://localhost/dw2/praticando3cores/destino.php?cor=$cor&nome=seuluiz&email=luizvan@gmail.com" ?>">
            [nome = Seu Luiz | email = luizvan@gmail.com]
        </a>
        <br><br>
        <a href="http://localhost/dw2/praticando3cores/destino.php">Limpar tudo</a>

        <div class="d-flex justify-content-center mt-5">
            <a href="<?php echo "http://localhost/dw2/praticando3cores/destino.php?cor=red&email=$email&nome=$nome" ?>">
                <img src="red.png" alt="red" class="img-fluid mx-2" style="width: 350px; border: 3px solid black">
            </a>
            <a
                href="<?php echo "http://localhost/dw2/praticando3cores/destino.php?cor=green&email=$email&nome=$nome" ?>">
                <img src="green.png" alt="green" class="img-fluid mx-2" style="width: 350px; border: 3px solid black">
            </a>
            <a
                href="<?php echo "http://localhost/dw2/praticando3cores/destino.php?cor=blue&email=$email&nome=$nome" ?>">
                <img src="blue.png" alt="blue" class="img-fluid mx-2" style="width: 350px; border: 3px solid black">
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    <style>
        body {
            background-color:
                <?php echo $cor; ?>
            ;
        }
    </style>
</body>

</html>