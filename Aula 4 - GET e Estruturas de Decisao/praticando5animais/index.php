<?php
$animal = filter_input(INPUT_GET, "animal", FILTER_SANITIZE_SPECIAL_CHARS);
$ultimo = filter_input(INPUT_GET, "ultimo", FILTER_SANITIZE_SPECIAL_CHARS);
$ultimo_clicado = filter_input(INPUT_GET, "ultimo_clicado", FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($ultimo) && $ultimo_clicado != null) {
    $ultimo = '<h3>Últimos clicados:</h3>';
    $ultimo .= ucfirst($ultimo_clicado) . '<br>';
    $ultimo_clicado = $animal;
} else if (!empty($ultimo)) {
    $ultimo .= ucfirst($ultimo_clicado) . '<br>';
    $ultimo_clicado = $animal;
} else {
    $ultimo_clicado = $animal;
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .imagens {
            display: flex;
            justify-content: space-between;
        }

        .imagens img {
            width: 230px;
            height: 200px;
            object-fit: inherit;
        }

        .destaque {
            border: 4px solid red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Praticando 3 - Animais</h1>
        <hr class="mb-4">

        <div class="imagens">
            <a href="?animal=gato&ultimo=<?= $ultimo ?>&ultimo_clicado=<?= $ultimo_clicado ?>">
                <img src="gato.jpg" alt="foto de gato" class="<?= $animal == 'gato' ? 'destaque' : ''; ?>">
            </a>
            <a href="?animal=cachorro&ultimo=<?= $ultimo ?>&ultimo_clicado=<?= $ultimo_clicado ?>">
                <img src="cachorro.jpg" alt="foto de cachorro" class="<?= $animal == 'cachorro' ? 'destaque' : ''; ?>">
            </a>
            <a href="?animal=hamster&ultimo=<?= $ultimo ?>&ultimo_clicado=<?= $ultimo_clicado ?>">
                <img src="hamster-dourado.jpg" alt="foto de hamster" class="<?= $animal == 'hamster' ? 'destaque' : ''; ?>">
            </a>
            <a href="?animal=lagartixa&ultimo=<?= $ultimo ?>&ultimo_clicado=<?= $ultimo_clicado ?>">
                <img src="largatixa.jpg" alt="foto de lagartixa" class="<?= $animal == 'lagartixa' ? 'destaque' : ''; ?>">
            </a>
        </div>

        <div class="informacoes mt-4">
            <?php switch ($animal) {
                case 'gato':
                    echo "<p>Você clicou no <b>Gato</b>.</p><p>O gato é um mamífero da família dos felídeos.</p>";
                    break;
                case 'cachorro':
                    echo "<p>Você clicou no <b>Cachorro</b>.</p><p>O cachorro é um mamífero domesticado da família dos canídeos.</p>";
                    break;
                case 'hamster':
                    echo "<p>Você clicou no <b>Hamster</b>.</p><p>O hamster é um pequeno roedor muito comum como animal de estimação.</p>";
                    break;
                case 'lagartixa':
                    echo "<p>Você clicou na <b>Lagartixa</b>.</p><p>A lagartixa é um pequeno réptil encontrado em diversas partes do mundo.</p>";
                    break;
            }
            ?>
        </div>

        <div class="ultimos-clicados mt-4">
            <?= !empty($ultimo) ? html_entity_decode($ultimo) : ''; ?>
        </div>
        <a href="?">Limpar tudo</a>
    </div>
</body>
</html>
