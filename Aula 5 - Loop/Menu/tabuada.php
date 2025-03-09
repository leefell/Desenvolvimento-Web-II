<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tabuada</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Tabuada</h1>
        <hr>
        <form action="tabuada.php" method="get" class="ml-5">
            <label for="numero">Número: </label>
            <input class="w-5" name="numero" type="number">
            <div class="button-group mt-3">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </div>
        </form>
        <?php
        $numero = filter_input(INPUT_GET, "numero", FILTER_SANITIZE_NUMBER_INT);
        if ($numero) {
            echo "<hr>";
            echo "<h2>Tabuada do $numero</h2>";
            for ($i = 1; $i <= 10; $i++) {
                echo "<p>$numero x $i = " . ($numero * $i) . "</p>";
            }
        }
        ?>
        <a class="ml-5 mt-3" href="menu.php">Voltar ao menu</a>
    </div>
</body>

</html>