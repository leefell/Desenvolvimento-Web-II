<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destino Contador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1 class="mt-3">Contador</h1>
        <hr>
        <h2>Parâmetros informados</h2>
        <?php
        $inicio = filter_input(INPUT_POST, "inicio", FILTER_SANITIZE_NUMBER_INT);
        $final = filter_input(INPUT_POST, "final", FILTER_SANITIZE_NUMBER_INT);
        $incremento = filter_input(INPUT_POST, "incremento", FILTER_SANITIZE_NUMBER_INT);
        ?>
        <p>Início: <?php echo $inicio ?></p>
        <p>Final: <?php echo $final ?></p>
        <p>Incremento: <?php echo $incremento ?></p>
        <?php
        if ($inicio && $final && $incremento) {
            echo "<hr>";
            if ($inicio < $final) {
                for ($i = $inicio; $i <= $final; $i += $incremento) {
                    echo $i . " ";
                }
            } else {
                for ($i = $inicio; $i >= $final; $i -= $incremento) {
                    echo $i . " ";
                }
            }
        }
        ?>
        <br>
        <a class="" href="menu.php">Voltar ao menu</a>
    </div>
</body>

</html>