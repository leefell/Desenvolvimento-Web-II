<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'setColor') {
        $color = $_GET['value'] ?? '';
        if ($color) {
            setcookie("corCookie", $color, time() + 3600);
        }
    } elseif ($action === 'setUser') {
        $name = $_GET['name'] ?? '';
        $email = $_GET['email'] ?? '';
        if ($name) {
            setcookie("nomeCookie", $name, time() + 3600);
        }
        if ($email) {
            setcookie("emailCookie", $email, time() + 3600);
        }
    } elseif ($action === 'clear') {
        setcookie("nomeCookie", "", time() - 3600);
        setcookie("emailCookie", "", time() - 3600);
        setcookie("corCookie", "", time() - 3600);
    }

    header("Location: destino.php");
    exit;
}

$nome = $_COOKIE['nomeCookie'] ?? '';
$email = $_COOKIE['emailCookie'] ?? '';
$cor = $_COOKIE['corCookie'] ?? 'white';
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praticando das Cores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color:
                <?php echo $cor; ?>
            ;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <h1>Destino Cookies</h1>
        <hr>
        <p>Nome: <?php echo $nome; ?></p>
        <p>Email: <?php echo $email; ?></p>

        <a href="destino.php?action=setUser&name=alexandre&email=alexandre@gmail.com">
            [nome = Alexandre | email = alexandreaug21@gmail.com]
        </a>
        <br><br>
        <a href="destino.php?action=setUser&name=seuluiz&email=luizvan@gmail.com">
            [nome = Seu Luiz | email = luizvan@gmail.com]
        </a>

        <br><br>
        <a href="destino.php?action=clear">Limpar tudo</a>

        <div class="d-flex justify-content-center mt-5">
            <a href="destino.php?action=setColor&value=red">
                <img src="red.png" alt="red" class="img-fluid mx-2" style="width: 350px; border: 3px solid black">
            </a>
            <a href="destino.php?action=setColor&value=green">
                <img src="green.png" alt="green" class="img-fluid mx-2" style="width: 350px; border: 3px solid black">
            </a>
            <a href="destino.php?action=setColor&value=blue">
                <img src="blue.png" alt="blue" class="img-fluid mx-2" style="width: 350px; border: 3px solid black">
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>