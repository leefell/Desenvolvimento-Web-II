<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destino</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Destino</h1>
        <hr>

        <h2>Dados da requisição:</h2>
        <div class="bg-light p-3 border rounded">
            <pre class="text-danger"><?php print_r($_POST); ?></pre>
        </div>

        <div class="interesses">
            <?php
            if (isset($_POST['gostos']) && is_array($_POST['gostos'])) {
                $gostos = $_POST['gostos'];
                sort($gostos);
                echo "<ul>";
                $count = 0;
                foreach ($gostos as $gosto) {
                    if ($count < 3) {
                        echo "<li>" . htmlspecialchars($gosto) . "</li>";
                    } elseif ($count == 3) {
                        echo "<li>...</li>";
                        break;
                    }
                    $count++;
                }
                echo "</ul>";
            } else {
                echo "<p>Não tem nada aqui!</p>";
            }

            ?>
        </div>

        <a href="index.html">Voltar para o formulário</a>
    </div>
</body>

</html>